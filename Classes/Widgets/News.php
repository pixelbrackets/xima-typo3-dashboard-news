<?php

declare(strict_types=1);

namespace Xima\XimaTypo3DashboardNews\Widgets;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ButtonProviderInterface;
use TYPO3\CMS\Dashboard\Widgets\ListDataProviderInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetConfigurationInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

class News implements WidgetInterface
{
    protected ServerRequestInterface $request;

    public function __construct(
        protected readonly WidgetConfigurationInterface $configuration,
        protected readonly ListDataProviderInterface $dataProvider,
        protected readonly ?ButtonProviderInterface $buttonProvider = null,
        protected array $options = []
    ) {
    }

    public function renderWidgetContent(): string
    {
        $template = GeneralUtility::getFileAbsFileName('EXT:xima_typo3_dashboard_news/Resources/Private/Templates/News.html');

        // preparing view
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $view->setFormat('html');
        $view->setTemplateRootPaths(['EXT:xima_typo3_dashboard_news/Resources/Private/Templates/']);
        $view->setPartialRootPaths(['EXT:xima_typo3_dashboard_news/Resources/Private/Partials/']);
        $view->setTemplatePathAndFilename($template);

        if (method_exists($this->dataProvider, 'setAllowedPageUids')) {
            $this->dataProvider->setAllowedPageUids($this->options['allowedPageUids'] ?? [0]);
        }

        $view->assignMultiple([
            'configuration' => $this->configuration,
            'items' => $this->dataProvider->getItems(),
            'button' => $this->buttonProvider,
            'options' => $this->options,
            'maxCharacters' => $this->options['maxCharacters'] ?? '400',
            'version' => GeneralUtility::makeInstance(Typo3Version::class)->getMajorVersion(),
        ]);
        return $view->render();
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
