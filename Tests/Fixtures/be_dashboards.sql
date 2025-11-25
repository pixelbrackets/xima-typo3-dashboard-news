-- Dashboard for News widgets
INSERT INTO `be_dashboards` (`identifier`, `title`, `widgets`, `crdate`, `tstamp`, `cruser_id`)
VALUES
    ('dashboard-news-demo-admin',
    'Dashboard News',
    '{
        "tx_ximatypo3dashboardnews_welcome": {"identifier": "tx_ximatypo3dashboardnews_welcome"},
        "tx_ximatypo3dashboardnews_news": {"identifier": "tx_ximatypo3dashboardnews_news"},
        "tx_ximatypo3dashboardnews_feed": {"identifier": "tx_ximatypo3dashboardnews_feed"}
    }',
    UNIX_TIMESTAMP(),
    UNIX_TIMESTAMP(),
    1),
    ('dashboard-news-demo-editor',
    'Dashboard News',
    '{
        "tx_ximatypo3dashboardnews_welcome": {"identifier": "tx_ximatypo3dashboardnews_welcome"},
        "tx_ximatypo3dashboardnews_news": {"identifier": "tx_ximatypo3dashboardnews_news"},
        "tx_ximatypo3dashboardnews_feed": {"identifier": "tx_ximatypo3dashboardnews_feed"}
    }',
    UNIX_TIMESTAMP(),
    UNIX_TIMESTAMP(),
    3);
