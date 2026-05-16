<?php

function schema_organization(): array
{
    return [
        '@type' => 'Organization',
        '@id' => rtrim(SITE_URL, '/') . '/#organization',
        'name' => SITE_NAME,
        'url' => rtrim(SITE_URL, '/') . '/',
        'logo' => default_og_image_url(),
        'description' => SITE_ORG_DESCRIPTION,
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => SITE_ADDRESS_LOCALITY,
            'addressRegion' => SITE_ADDRESS_REGION,
            'addressCountry' => SITE_ADDRESS_COUNTRY,
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => SITE_PHONE,
            'contactType' => 'Customer Service',
            'email' => SITE_EMAIL,
            'areaServed' => SITE_ADDRESS_COUNTRY,
            'availableLanguage' => ['en'],
        ],
        'sameAs' => [
            'https://www.facebook.com/accure.cfo/',
            'https://www.instagram.com/accure.cfo/',
            'https://www.linkedin.com/company/accurecfo/',
            'https://x.com/AccureCFO',
        ],
    ];
}

function schema_website(): array
{
    return [
        '@type' => 'WebSite',
        '@id' => rtrim(SITE_URL, '/') . '/#website',
        'name' => SITE_NAME,
        'url' => rtrim(SITE_URL, '/') . '/',
        'description' => SITE_ORG_DESCRIPTION,
        'publisher' => ['@id' => rtrim(SITE_URL, '/') . '/#organization'],
        'inLanguage' => 'en-US',
    ];
}

function schema_blog_posting(array $blog): array
{
    $schema = [
        '@type' => 'BlogPosting',
        'headline' => $blog['title'] ?? '',
        'description' => $blog['description'] ?? '',
        'url' => page_canonical_url('blogs/' . ($blog['slug'] ?? '')),
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => page_canonical_url('blogs/' . ($blog['slug'] ?? '')),
        ],
        'author' => [
            '@type' => 'Organization',
            'name' => SITE_NAME,
            'url' => rtrim(SITE_URL, '/') . '/',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => SITE_NAME,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => default_og_image_url(),
            ],
        ],
    ];

    if (!empty($blog['image'])) {
        $schema['image'] = resolve_og_image_url($blog['image']);
    }

    if (!empty($blog['publish_date'])) {
        $published = date('c', strtotime($blog['publish_date']));
        if ($published) {
            $schema['datePublished'] = $published;
            $schema['dateModified'] = $published;
        }
    }

    return $schema;
}

function schema_service(array $service): array
{
    $slug = $service['slug'] ?? '';
    $description = trim(strip_tags($service['longDescription'] ?? $service['description'] ?? ''));

    return [
        '@type' => 'Service',
        'name' => $service['title'] ?? '',
        'description' => meta_truncate($description !== '' ? $description : ($service['title'] ?? ''), 320, '...'),
        'url' => page_canonical_url('offer-detail/' . $slug),
        'image' => resolve_og_image_url('assets/img/' . ($service['img'] ?? '')),
        'provider' => ['@id' => rtrim(SITE_URL, '/') . '/#organization'],
        'areaServed' => SITE_ADDRESS_COUNTRY,
    ];
}

function get_page_json_ld_schemas(): array
{
    global $pageCanonicalPath, $pageJsonLdBlog, $pageJsonLdService;

    $schemas = [schema_organization()];

    if (($pageCanonicalPath ?? '') === '') {
        $schemas[] = schema_website();
    }

    if (!empty($pageJsonLdBlog) && is_array($pageJsonLdBlog)) {
        $schemas[] = schema_blog_posting($pageJsonLdBlog);
    }

    if (!empty($pageJsonLdService) && is_array($pageJsonLdService)) {
        $schemas[] = schema_service($pageJsonLdService);
    }

    return $schemas;
}

function render_json_ld_scripts(): void
{
    $schemas = get_page_json_ld_schemas();
    if ($schemas === []) {
        return;
    }

    if (count($schemas) === 1) {
        $payload = array_merge(['@context' => 'https://schema.org'], $schemas[0]);
    } else {
        $payload = [
            '@context' => 'https://schema.org',
            '@graph' => $schemas,
        ];
    }

    $json = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    if ($json === false) {
        return;
    }

    echo '<script type="application/ld+json">' . $json . '</script>' . "\n";
}

function set_page_schema_blog(array $blog): void
{
    global $pageJsonLdBlog;
    $pageJsonLdBlog = $blog;
}

function set_page_schema_service(array $service): void
{
    global $pageJsonLdService;
    $pageJsonLdService = $service;
}
