-- Demo news data for Dashboard News widgets
INSERT INTO `tx_ximatypo3dashboardnews_domain_model_news`
    (`uid`, `pid`, `tstamp`, `crdate`, `cruser_id`, `deleted`, `hidden`, `title`, `description`, `link`, `pub_date`)
VALUES
    (1, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 1, 0, 0,
    'New Dashboard News Widget Installed!',
    '<p>Great news! We have installed a cool new dashboard widget to keep you informed about important updates and tasks. Check out the project on GitHub for more details and features.</p>',
    'https://github.com/xima-media/xima-typo3-dashboard-news',
    UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 HOUR))),

    (2, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 1, 0, 0,
    'System Update - Please Report Issues',
    '<p>Hey team! We have installed a new TYPO3 version last night. Everything should work as before, but please tell the admin if you notice something wrong or unusual.</p>',
    '',
    UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 DAY))),

    (3, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 1, 0, 0,
    'Reminder: Check Alt Texts on Images',
    '<p>Please review all images in your content and make sure they have proper alternative texts for accessibility. This is especially important for images in news articles and product pages.</p>',
    '',
    UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 3 DAY))),

    (4, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 1, 0, 0,
    'Content Review: Outdated News Articles',
    '<p>Please review news articles older than 6 months and either archive them or update with current information. Check the "News Archive" section for items needing attention.</p>',
    '',
    UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 8 DAY))),

    (5, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 1, 0, 0,
    'Upcoming Maintenance Window',
    '<p>Scheduled maintenance next Sunday from 2 AM to 6 AM. The system will be unavailable during this time. Please plan your content updates accordingly.</p>',
    '',
    UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 15 DAY))),

    (6, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 1, 0, 0,
    'Translation Reminder: Multilingual Content',
    '<p>Several pages are missing translations. Please check your assigned language versions and complete the translations by the end of the month.</p>',
    '',
    UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 18 DAY)));
