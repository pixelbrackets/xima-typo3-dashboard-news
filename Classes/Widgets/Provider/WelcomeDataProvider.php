<?php

declare(strict_types=1);

namespace Xima\XimaTypo3DashboardNews\Widgets\Provider;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ListDataProviderInterface;

class WelcomeDataProvider implements ListDataProviderInterface
{
    public function __construct(private \TYPO3\CMS\Core\Database\ConnectionPool $connectionPool)
    {
    }
    /**
    * @throws \Doctrine\DBAL\Exception
    */
    public function getItems(): array
    {
        $user = $GLOBALS['BE_USER']->user;

        $currentUserGroupIds = GeneralUtility::intExplode(',', (string)$user['usergroup'], true);

        $queryBuilder = $this->connectionPool
            ->getQueryBuilderForTable('be_groups');

        $groups = $queryBuilder
            ->select('uid', 'title')
            ->from('be_groups')
            ->where(
                $queryBuilder->expr()->in(
                    'uid',
                    $queryBuilder->createNamedParameter($currentUserGroupIds, Connection::PARAM_INT_ARRAY)
                )
            )
            ->executeQuery()
            ->fetchAllAssociative();

        return [
            'username' => $user['username'],
            'realName' => $user['realName'],
            'lastLogin' => $user['lastlogin'],
            'roles' => array_column($groups, 'title'),
            'isAdmin' => $GLOBALS['BE_USER']->isAdmin(),
            'siteName' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'],
            'content' => '<h2>Welcome to TYPO3 CMS!</h2>',
        ];
    }
}
