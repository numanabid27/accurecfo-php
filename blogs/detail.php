<?php

require_once dirname(__DIR__) . '/includes/init.php';

$slug = $_GET['slug'] ?? $_GET['id'] ?? '';
$blog = get_blog_by_slug($slug);
if (!$blog && ctype_digit($slug)) {
    $blog = get_blog_by_id((int) $slug);
}

if (!$blog) {
    http_response_code(404);
    set_page_meta(
        'Article Not Found | AccureCFO Blog',
        'The article you are looking for could not be found. Browse AccureCFO blog posts for bookkeeping, financial management, and business finance tips from our expert team.',
        null,
        null,
        'website',
        'noindex, nofollow'
    );
    $pageStyles = array_merge($pageStyles, ['banner.css', 'blog-detail.css']);

    render_page(function () {
        ?>
        <p style="text-align:center;padding:3rem;color:#6b7280;">
          This article could not be found.
          <a href="<?= url('blogs') ?>" style="color:#2563eb;"<?= title_attr('Back to blogs') ?>>Back to blogs</a>
        </p>
        <?php
    });
    exit;
}

set_page_meta(
    $blog['title'] . ' | AccureCFO Blog',
    $blog['description'] ?: $blog['title'],
    'blogs/' . $blog['slug'],
    $blog['image'] ?? null,
    'article'
);
set_page_schema_blog($blog);
$pageStyles = array_merge($pageStyles, ['banner.css', 'blog-detail.css']);
$pageScripts = ['main.js'];

render_page(function () use ($blog) {
    $bannerTitle = $blog['title'];
    $bannerDesc = $blog['description'];
    require INCLUDES_PATH . '/banner.php';
    ?>
    <section class="blogDetailSection">
      <div class="parse_html">
        <?= enhance_html_accessibility($blog['longDescription'], $blog['title']) ?>
      </div>
    </section>
    <?php
});
