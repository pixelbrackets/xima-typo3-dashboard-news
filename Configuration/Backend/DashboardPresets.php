<?php

// Assign this preset to users with TSconfig:
// options.dashboard.dashboardPresetsForNewUsers = tx_ximatypo3dashboardnews_dashboard

return [
    'tx_ximatypo3dashboardnews_dashboard' => [
        'title' => 'LLL:EXT:xima_typo3_dashboard_news/Resources/Private/Language/locallang.xlf:dashboard.title',
        'description' => 'LLL:EXT:xima_typo3_dashboard_news/Resources/Private/Language/locallang.xlf:dashboard.description',
        'iconIdentifier' => 'content-dashboard',
        'defaultWidgets' => ['tx_ximatypo3dashboardnews_welcome', 'tx_ximatypo3dashboardnews_news', 'tx_ximatypo3dashboardnews_feed'],
        'showInWizard' => true,
    ],
];
