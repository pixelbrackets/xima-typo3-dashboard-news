<?php

declare(strict_types=1);

namespace Xima\XimaTypo3DashboardNews\Widgets\Provider;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ListDataProviderInterface;

class DashboardNewsDataProvider implements ListDataProviderInterface
{
    /**
    * @var array<int>
    */
    protected array $allowedPageUids = [0];

    /**
    * @param array<int> $allowedPageUids
    */
    public function setAllowedPageUids(array $allowedPageUids): void
    {
        $this->allowedPageUids = $allowedPageUids;
    }

    /**
    * @throws \Doctrine\DBAL\Exception
    */
    public function getItems(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_ximatypo3dashboardnews_domain_model_news');

        $queryBuilder = $queryBuilder
            ->select('*', 'pub_date as pubDate')
            ->addSelectLiteral('IF(pub_date > 0, pub_date, crdate) AS sort_date') // sort alias
            ->from('tx_ximatypo3dashboardnews_domain_model_news')
            ->orderBy('sort_date', 'DESC');

        if (!empty($this->allowedPageUids)) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->in(
                    'pid',
                    $queryBuilder->createNamedParameter(
                        $this->allowedPageUids,
                        Connection::PARAM_INT_ARRAY
                    )
                )
            );
        }

        $items = $queryBuilder
            ->executeQuery()
            ->fetchAllAssociative();

        return $items;
    }
}
