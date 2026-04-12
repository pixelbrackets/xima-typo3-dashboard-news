<?php

declare(strict_types=1);

namespace Xima\XimaTypo3DashboardNews\Widgets;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\View\BackendViewFactory;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ButtonProviderInterface;
use TYPO3\CMS\Dashboard\Widgets\ListDataProviderInterface;
use TYPO3\CMS\Dashboard\Widgets\RequestAwareWidgetInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetConfigurationInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetInterface;

class Feed implements WidgetInterface, RequestAwareWidgetInterface
{
    protected ServerRequestInterface $request;

    public function __construct(
        protected readonly WidgetConfigurationInterface $configuration,
        protected readonly ListDataProviderInterface $dataProvider,
        protected readonly BackendViewFactory $backendViewFactory,
        protected readonly ?ButtonProviderInterface $buttonProvider = null,
        protected array $options = []
    ) {
    }

    public function setRequest(ServerRequestInterface $request): void
    {
        $this->request = $request;
    }

    public function renderWidgetContent(): string
    {
        if (method_exists($this->dataProvider, 'setFeedUrl')) {
            $this->dataProvider->setFeedUrl($this->options['feedUrl'] ?? '');
        }

        // @todo Remove StandaloneView fallback once v12 support is dropped
        if (class_exists(\TYPO3\CMS\Fluid\View\StandaloneView::class)) {
            $view = GeneralUtility::makeInstance(\TYPO3\CMS\Fluid\View\StandaloneView::class);
            $view->setFormat('html');
            $view->setTemplateRootPaths(['EXT:xima_typo3_dashboard_news/Resources/Private/Templates/']);
            $view->setPartialRootPaths(['EXT:xima_typo3_dashboard_news/Resources/Private/Partials/']);
        } else {
            $view = $this->backendViewFactory->create($this->request, ['xima/xima-typo3-dashboard-news']);
        }

        $view->assignMultiple([
            'configuration' => $this->configuration,
            'items' => $this->dataProvider->getItems(),
            'button' => $this->buttonProvider,
            'options' => $this->options,
            'maxCharacters' => $this->options['maxCharacters'] ?? '200',
            'version' => GeneralUtility::makeInstance(Typo3Version::class)->getMajorVersion(),
        ]);
        return $view->render('Feed');
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
