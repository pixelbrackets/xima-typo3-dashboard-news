<?php

declare(strict_types=1);

namespace Xima\XimaTypo3DashboardNews\Widgets\Provider;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ListDataProviderInterface;

class RssFeedDataProvider implements ListDataProviderInterface
{
    protected string $feedUrl = '';

    protected int $limit = 5;

    public function setFeedUrl(string $feedUrl): void
    {
        $this->feedUrl = $feedUrl;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
    * Fetches and parses an RSS feed into dashboard list items
    *
    * @throws \RuntimeException
    */
    public function getItems(): array
    {
        if (empty($this->feedUrl)) {
            return [];
        }

        $rssContent = GeneralUtility::getUrl($this->feedUrl);
        if ($rssContent === false) {
            throw new \RuntimeException('RSS URL could not be fetched: ' . $this->feedUrl, 1728310401);
        }

        $rssFeed = simplexml_load_string($rssContent);
        if ($rssFeed === false || empty($rssFeed->channel->item)) {
            throw new \RuntimeException('RSS feed could not be parsed.', 1728310402);
        }

        $items = [];
        foreach ($rssFeed->channel->item as $item) {
            $items[] = [
                'title' => trim((string)$item->title),
                'description' => trim(strip_tags((string)$item->description)),
                'pubDate' => strtotime((string)$item->pubDate) ?: 0,
                'link' => trim((string)$item->link),
            ];
        }

        // Sort parsed feed items by publication date (feed may have a random order)
        usort($items, static function ($a, $b) {
            return $b['pubDate'] <=> $a['pubDate'];
        });

        return array_slice($items, 0, $this->limit);
    }
}
