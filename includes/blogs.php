<?php

function blogs_slugify(string $title): string
{
    $s = strtolower($title);
    $s = preg_replace('/[^a-z0-9]+/', '-', $s);
    $s = trim($s, '-');
    return $s !== '' ? $s : 'blog';
}

function blogs_format_date(?string $publishDate): string
{
    if (!$publishDate) {
        return '';
    }
    $ts = strtotime($publishDate);
    return $ts ? date('M j, Y', $ts) : '';
}

function blogs_map_row(array $row, string $slug): array
{
    return [
        'id' => $row['id'] ?? null,
        'slug' => $slug,
        'title' => $row['title'] ?? '',
        'description' => $row['short_description'] ?? '',
        'longDescription' => $row['long_description'] ?? '',
        'image' => $row['image_url'] ?? '',
        'date' => blogs_format_date($row['publish_date'] ?? null),
        'publish_date' => $row['publish_date'] ?? null,
    ];
}

function blogs_api_get(string $endpoint): ?array
{
    $ctx = stream_context_create([
        'http' => [
            'timeout' => 15,
            'header' => "Accept: application/json\r\n",
        ],
    ]);

    $json = @file_get_contents($endpoint, false, $ctx);
    if ($json === false) {
        return null;
    }

    $data = json_decode($json, true);
    return is_array($data) ? $data : null;
}

function get_blog_by_id($id): ?array
{
    $numericId = filter_var($id, FILTER_VALIDATE_INT);
    if ($numericId === false || $numericId < 1) {
        return null;
    }

    $json = blogs_api_get(BLOGS_API . '/' . $numericId);
    if (!$json) {
        return null;
    }

    $row = $json['data'] ?? $json;
    if (!is_array($row) || !isset($row['id'])) {
        return null;
    }

    $slug = blogs_slugify($row['title'] ?? '') . '-' . $row['id'];
    return blogs_map_row($row, $slug);
}

function get_blogs(): array
{
    $json = blogs_api_get(BLOGS_API . '?per_page=9');
    if (!$json) {
        return [];
    }

    $rows = $json['data'] ?? [];
    if (!is_array($rows)) {
        return [];
    }

    $taken = [];
    $blogs = [];

    foreach ($rows as $row) {
        if (!is_array($row)) {
            continue;
        }
        $slug = blogs_slugify($row['title'] ?? '');
        if (isset($taken[$slug])) {
            $slug = $slug . '-' . ($row['id'] ?? '');
        }
        $taken[$slug] = true;
        $blogs[] = blogs_map_row($row, $slug);
    }

    return $blogs;
}
