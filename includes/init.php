<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/html.php';
require_once __DIR__ . '/meta.php';
require_once __DIR__ . '/schema.php';
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/blogs.php';
require_once __DIR__ . '/layout.php';

set_page_meta(
    SITE_NAME . ' | Professional Bookkeeping Services',
    'Maintain financial records and handle bookkeeping professionally with AccureCFO. We manage business finances with expert reporting, reconciliation, and strategic insights for growing businesses.',
    ''
);

$pageStyles = ['globals.css', 'header.css', 'footer.css'];
$pageScripts = ['main.js'];

function render_head(): void
{
    global $pageTitle, $pageDescription, $pageCanonicalPath, $pageOgImage, $pageOgType, $pageRobots, $pageStyles;

    $canonicalUrl = page_canonical_url($pageCanonicalPath ?? null);
    $ogImage = ($pageOgImage ?? '') !== '' ? $pageOgImage : default_og_image_url();
    $ogType = ($pageOgType ?? '') !== '' ? $pageOgType : 'website';
    $robots = ($pageRobots ?? '') !== '' ? $pageRobots : META_ROBOTS;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="author" content="<?= e(SITE_AUTHOR) ?>">
    <meta name="robots" content="<?= e($robots) ?>">
    <meta name="language" content="<?= e(SITE_LANGUAGE) ?>">
    <meta name="revisit-after" content="<?= e(META_REVISIT_AFTER) ?>">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
    <meta property="og:type" content="<?= e($ogType) ?>">
    <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="<?= e($ogImage) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php foreach ($pageStyles as $style): ?>
    <link rel="stylesheet" href="<?= e(asset('css/' . $style)) ?>">
    <?php endforeach; ?>
    <?php render_json_ld_scripts(); ?>
</head>
<body>
    <?php
}

function render_foot(): void
{
    global $pageScripts;
    foreach ($pageScripts as $script): ?>
    <script src="<?= e(asset('js/' . $script)) ?>"></script>
    <?php endforeach; ?>
</body>
</html>
    <?php
}
