<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/blogs.php';
require_once __DIR__ . '/layout.php';

$defaultTitle = SITE_NAME . ' - Professional Bookkeeping & Financial Services';
$defaultDescription = 'Maintain financial records and handle bookkeeping professionally with AccureCFO. We manage business finances that welcome success.';

$pageTitle = $defaultTitle;
$pageDescription = $defaultDescription;
$pageStyles = ['globals.css', 'header.css', 'footer.css'];
$pageScripts = ['main.js'];

function render_head(): void
{
    global $pageTitle, $pageDescription, $pageStyles;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php foreach ($pageStyles as $style): ?>
    <link rel="stylesheet" href="<?= e(asset('css/' . $style)) ?>">
    <?php endforeach; ?>
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
