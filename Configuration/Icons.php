<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'dashboard-news-widgets-news' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:xima_typo3_dashboard_news/Resources/Public/Icons/WidgetsNews.svg',
    ],
    'dashboard-news-widgets-feed' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:xima_typo3_dashboard_news/Resources/Public/Icons/WidgetsFeed.svg',
    ],
    'dashboard-news-widgets-welcome' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:xima_typo3_dashboard_news/Resources/Public/Icons/WidgetsWelcome.svg',
    ],
];
