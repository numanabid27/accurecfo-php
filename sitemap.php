<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/blogs.php';

header('Content-Type: application/xml; charset=utf-8');

function sitemap_escape(string $value): string
{
    return htmlspecialchars($value, ENT_XML1 | ENT_QUOTES, 'UTF-8');
}

function sitemap_lastmod(?string $date): ?string
{
    if (!$date) {
        return null;
    }

    $ts = strtotime($date);

    return $ts ? date('Y-m-d', $ts) : null;
}

function sitemap_url(array $entry): string
{
    $xml = '  <url>' . "\n";
    $xml .= '    <loc>' . sitemap_escape($entry['loc']) . '</loc>' . "\n";

    if (!empty($entry['lastmod'])) {
        $xml .= '    <lastmod>' . sitemap_escape($entry['lastmod']) . '</lastmod>' . "\n";
    }
    if (!empty($entry['changefreq'])) {
        $xml .= '    <changefreq>' . sitemap_escape($entry['changefreq']) . '</changefreq>' . "\n";
    }
    if (!empty($entry['priority'])) {
        $xml .= '    <priority>' . sitemap_escape($entry['priority']) . '</priority>' . "\n";
    }

    $xml .= '  </url>' . "\n";

    return $xml;
}

$entries = [
    ['loc' => absolute_url('/'), 'changefreq' => 'weekly', 'priority' => '1.0'],
    ['loc' => absolute_url('about'), 'changefreq' => 'monthly', 'priority' => '0.8'],
    ['loc' => absolute_url('contact'), 'changefreq' => 'monthly', 'priority' => '0.8'],
    ['loc' => absolute_url('pricing'), 'changefreq' => 'monthly', 'priority' => '0.8'],
    ['loc' => absolute_url('privacy-policy'), 'changefreq' => 'yearly', 'priority' => '0.5'],
    ['loc' => absolute_url('blogs'), 'changefreq' => 'weekly', 'priority' => '0.9'],
];

foreach ($SERVICES as $service) {
    $entries[] = [
        'loc' => absolute_url('offer-detail/' . $service['slug']),
        'changefreq' => 'monthly',
        'priority' => '0.7',
    ];
}

foreach (get_all_blogs() as $blog) {
    $entry = [
        'loc' => absolute_url('blogs/' . $blog['slug']),
        'changefreq' => 'monthly',
        'priority' => '0.7',
    ];

    $lastmod = sitemap_lastmod($blog['publish_date'] ?? null);
    if ($lastmod) {
        $entry['lastmod'] = $lastmod;
    }

    $entries[] = $entry;
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($entries as $entry) {
    echo sitemap_url($entry);
}

echo '</urlset>';
