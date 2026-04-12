<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:xima_typo3_dashboard_news/Resources/Private/Language/locallang.xlf:tx_ximatypo3dashboardnews_domain_model_news',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,description',
        'typeicon_classes' => [
            'default' => 'content-news',
        ],
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent',
        'rootLevel' => -1,
    ],
    'types' => [
        0 => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title,hidden,sys_language_uid,description,link,pub_date',
        ],
    ],

    'columns' => [
        'sys_language_uid' => [
            'label' => 'Language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],

        'title' => [
            'label' => 'LLL:EXT:xima_typo3_dashboard_news/Resources/Private/Language/locallang.xlf:tx_ximatypo3dashboardnews_domain_model_news.title',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => 255,
                'required' => true,
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:xima_typo3_dashboard_news/Resources/Private/Language/locallang.xlf:tx_ximatypo3dashboardnews_domain_model_news.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'rows' => 5,
            ],
        ],
        'link' => [
            'label' => 'LLL:EXT:xima_typo3_dashboard_news/Resources/Private/Language/locallang.xlf:tx_ximatypo3dashboardnews_domain_model_news.link',
            'config' => [
                'type' => 'link',
                'size' => 50,
            ],
        ],
        'pub_date' => [
            'label' => 'LLL:EXT:xima_typo3_dashboard_news/Resources/Private/Language/locallang.xlf:tx_ximatypo3dashboardnews_domain_model_news.pub_date',
            'config' => [
                'type' => 'datetime',
            ],
        ],
    ],
];
