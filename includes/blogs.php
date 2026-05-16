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

function blogs_assign_slugs(array $rows): array
{
    $taken = [];
    $slugs = [];

    foreach ($rows as $row) {
        if (!is_array($row)) {
            continue;
        }

        $id = $row['id'] ?? null;
        if ($id === null) {
            continue;
        }

        $slug = blogs_slugify($row['title'] ?? '');
        if (isset($taken[$slug])) {
            $slug = $slug . '-' . $id;
        }
        $taken[$slug] = true;
        $slugs[$id] = $slug;
    }

    return $slugs;
}

function blog_url(array $blog): string
{
    $slug = $blog['slug'] ?? blogs_slugify($blog['title'] ?? '');

    return url('blogs/' . $slug);
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

    $rows = blogs_fetch_rows(100);
    $slugMap = blogs_assign_slugs($rows);
    $slug = $slugMap[$numericId] ?? blogs_slugify($row['title'] ?? '');

    return blogs_map_row($row, $slug);
}

function blogs_fetch_rows(int $perPage = 9): array
{
    $json = blogs_api_get(BLOGS_API . '?per_page=' . max(1, $perPage));
    if (!$json) {
        return [];
    }

    $rows = $json['data'] ?? [];

    return is_array($rows) ? $rows : [];
}

function blogs_fetch_all_rows(): array
{
    $perPage = 100;
    $page = 1;
    $all = [];

    while (true) {
        $json = blogs_api_get(BLOGS_API . '?per_page=' . $perPage . '&page=' . $page);
        if (!$json) {
            break;
        }

        $rows = $json['data'] ?? [];
        if (!is_array($rows) || $rows === []) {
            break;
        }

        $all = array_merge($all, $rows);

        $lastPage = $json['meta']['last_page'] ?? $json['last_page'] ?? null;
        if ($lastPage !== null) {
            if ($page >= (int) $lastPage) {
                break;
            }
        } elseif (count($rows) < $perPage) {
            break;
        }

        $page++;
        if ($page > 100) {
            break;
        }
    }

    return $all;
}

function get_all_blogs(): array
{
    $rows = blogs_fetch_all_rows();
    $slugMap = blogs_assign_slugs($rows);
    $blogs = [];

    foreach ($rows as $row) {
        if (!is_array($row)) {
            continue;
        }

        $id = $row['id'] ?? null;
        $slug = $slugMap[$id] ?? blogs_slugify($row['title'] ?? '');
        $blogs[] = blogs_map_row($row, $slug);
    }

    return $blogs;
}

function get_blog_by_slug(string $slug): ?array
{
    $slug = trim($slug);
    if ($slug === '') {
        return null;
    }

    $rows = blogs_fetch_rows(100);
    $slugMap = blogs_assign_slugs($rows);

    foreach ($slugMap as $id => $mappedSlug) {
        if ($mappedSlug === $slug) {
            $blog = get_blog_by_id($id);

            if ($blog) {
                $blog['slug'] = $slug;
            }

            return $blog;
        }
    }

    return null;
}

function get_blogs(): array
{
    $rows = blogs_fetch_rows(9);
    $slugMap = blogs_assign_slugs($rows);
    $blogs = [];

    foreach ($rows as $row) {
        if (!is_array($row)) {
            continue;
        }

        $id = $row['id'] ?? null;
        $slug = $slugMap[$id] ?? blogs_slugify($row['title'] ?? '');
        $blogs[] = blogs_map_row($row, $slug);
    }

    return $blogs;
}
