<?php

/** @var string $_EXTKEY */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Dashboard News',
    'description' => 'Display important messages and announcements in the TYPO3 dashboard to keep editorial teams in the loop',
    'category' => 'module',
    'state' => 'stable',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'php' => '8.1.0-8.5.99',
            'typo3' => '12.4.0-14.3.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
