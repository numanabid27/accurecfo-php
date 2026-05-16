<?php

const META_TITLE_MIN = 30;
const META_TITLE_MAX = 65;
const META_DESC_MIN = 120;
const META_DESC_MAX = 320;

function meta_truncate(string $text, int $max, string $ellipsis = '…'): string
{
    if (mb_strlen($text) <= $max) {
        return $text;
    }

    $limit = $max - mb_strlen($ellipsis);
    $truncated = mb_substr($text, 0, $limit);
    $lastSpace = mb_strrpos($truncated, ' ');

    if ($lastSpace !== false && $lastSpace > (int) ($limit * 0.6)) {
        $truncated = mb_substr($truncated, 0, $lastSpace);
    }

    return rtrim($truncated, " \t\n\r\0\x0B.,;:-") . $ellipsis;
}

function normalize_meta_title(string $title): string
{
    $title = trim(preg_replace('/\s+/u', ' ', strip_tags($title)));

    if ($title === '') {
        $title = SITE_NAME . ' | Professional Bookkeeping Services';
    }

    if (mb_strlen($title) < META_TITLE_MIN && !str_contains($title, SITE_NAME)) {
        $title .= ' | ' . SITE_NAME;
    }

    if (mb_strlen($title) < META_TITLE_MIN) {
        $title .= ' - Bookkeeping & Finance';
    }

    if (mb_strlen($title) > META_TITLE_MAX) {
        $title = meta_truncate($title, META_TITLE_MAX);
    }

    return $title;
}

function normalize_meta_description(string $description): string
{
    $description = trim(preg_replace('/\s+/u', ' ', strip_tags($description)));

    if ($description === '') {
        $description = 'Professional bookkeeping and financial services from AccureCFO.';
    }

    $suffix = ' AccureCFO delivers expert bookkeeping, financial reporting, and cash flow management tailored for growing businesses.';

    if (mb_strlen($description) < META_DESC_MIN) {
        $description = trim($description . $suffix);
    }

    if (mb_strlen($description) < META_DESC_MIN) {
        $description .= ' Contact our team for accurate records, compliance support, and strategic financial insights.';
    }

    if (mb_strlen($description) > META_DESC_MAX) {
        $description = meta_truncate($description, META_DESC_MAX);
    }

    return $description;
}

function current_request_path(): string
{
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $uri = rtrim($uri, '/') ?: '/';

    $base = BASE_URL;
    if ($base !== '' && str_starts_with($uri, $base)) {
        $uri = substr($uri, strlen($base)) ?: '/';
        $uri = rtrim($uri, '/') ?: '/';
    }

    if ($uri === '/') {
        return '';
    }

    return ltrim($uri, '/');
}

function page_canonical_url(?string $path = null): string
{
    if ($path === null) {
        $path = current_request_path();
    }

    $path = trim($path, '/');

    return $path === '' ? absolute_url('/') : absolute_url($path);
}

function default_og_image_url(): string
{
    return absolute_url('assets/img/logo.png');
}

function resolve_og_image_url(?string $image): string
{
    $image = trim((string) $image);
    if ($image === '') {
        return default_og_image_url();
    }

    if (preg_match('#^https?://#i', $image)) {
        return $image;
    }

    if (str_starts_with($image, '/')) {
        return rtrim(SITE_URL, '/') . $image;
    }

    return absolute_url($image);
}

function set_page_meta(
    string $title,
    string $description,
    ?string $canonicalPath = null,
    ?string $ogImage = null,
    string $ogType = 'website',
    ?string $robots = null
): void {
    global $pageTitle, $pageDescription, $pageCanonicalPath, $pageOgImage, $pageOgType, $pageRobots;

    $pageTitle = normalize_meta_title($title);
    $pageDescription = normalize_meta_description($description);
    $pageCanonicalPath = $canonicalPath;
    $pageOgImage = resolve_og_image_url($ogImage);
    $pageOgType = $ogType;
    $pageRobots = $robots;
}
