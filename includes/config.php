<?php

define('SITE_NAME', 'AccureCFO');
define('SITE_AUTHOR', 'AccureCFO');
define('SITE_LANGUAGE', 'English');
define('META_ROBOTS', 'index, follow');
define('META_REVISIT_AFTER', '7 days');
define('GOOGLE_SITE_VERIFICATION', '6XHStb5sIuIY54NCND-IMkkwhx0WRRKlVR9goeC0i18');
define('SITE_URL', 'https://accurecfo.com');
define('SITE_EMAIL', 'info@accurecfo.com');
define('SITE_PHONE', '+16149607335');
define('SITE_ADDRESS_LOCALITY', 'Columbus');
define('SITE_ADDRESS_REGION', 'OH');
define('SITE_ADDRESS_COUNTRY', 'US');
define('SITE_ORG_DESCRIPTION', 'AccureCFO provides professional bookkeeping, financial reporting, payables and receivables management, cash flow management, and accounting software implementation for growing businesses. Columbus, Ohio-based experts supporting QuickBooks, Xero, and cloud accounting solutions for clients nationwide.');
define('BLOGS_API', 'https://dashboard.accurecfo.com/api/blogs');
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . '/includes');

function detect_base_url(): string
{
    $docRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: '';
    $projectRoot = realpath(BASE_PATH) ?: '';

    if ($docRoot !== '' && $projectRoot !== '' && str_starts_with($projectRoot, $docRoot)) {
        $base = substr($projectRoot, strlen($docRoot));
        $base = str_replace('\\', '/', $base);
        return rtrim($base, '/');
    }

    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');

    if (preg_match('#^(.+)/(index|about|contact|pricing|privacy-policy)\.php$#', $script, $m)) {
        return $m[1] === '' ? '' : $m[1];
    }
    if (preg_match('#^(.+)/(blogs|offer-detail)/#', $script, $m)) {
        return $m[1];
    }

    return '';
}

define('BASE_URL', detect_base_url());
define('ASSETS_URL', (BASE_URL !== '' ? BASE_URL : '') . '/assets');

function asset(string $path): string
{
    return ASSETS_URL . '/' . ltrim($path, '/');
}

function url(string $path = ''): string
{
    $base = BASE_URL;

    if ($path === '' || $path === '/') {
        return $base !== '' ? $base . '/' : '/';
    }

    return ($base !== '' ? $base : '') . '/' . ltrim($path, '/');
}

function absolute_url(string $path = ''): string
{
    if ($path === '' || $path === '/') {
        return rtrim(SITE_URL, '/') . '/';
    }

    return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function is_active(string $href): bool
{
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $uri = rtrim($uri, '/') ?: '/';

    $base = BASE_URL;
    if ($base !== '' && str_starts_with($uri, $base)) {
        $uri = substr($uri, strlen($base)) ?: '/';
        $uri = rtrim($uri, '/') ?: '/';
    }

    if ($href === '/') {
        return $uri === '/';
    }

    $href = rtrim($href, '/');
    return $uri === $href || str_starts_with($uri, $href . '/');
}
