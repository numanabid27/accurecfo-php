<?php

require_once dirname(__DIR__) . '/includes/init.php';

$slug = $_GET['id'] ?? '';
$blog = get_blog_by_id($slug);

if (!$blog) {
    http_response_code(404);
    $pageTitle = 'Article Not Found | ' . SITE_NAME;
    $pageStyles = array_merge($pageStyles, ['banner.css', 'blog-detail.css']);

    render_page(function () {
        ?>
        <p style="text-align:center;padding:3rem;color:#6b7280;">
          This article could not be found.
          <a href="<?= url('blogs') ?>" style="color:#2563eb;">Back to blogs</a>
        </p>
        <?php
    });
    exit;
}

$pageTitle = $blog['title'] . ' | ' . SITE_NAME;
$pageDescription = $blog['description'];
$pageStyles = array_merge($pageStyles, ['banner.css', 'blog-detail.css']);
$pageScripts = ['main.js'];

render_page(function () use ($blog) {
    $bannerTitle = $blog['title'];
    $bannerDesc = $blog['description'];
    require INCLUDES_PATH . '/banner.php';
    ?>
    <section class="blogDetailSection">
      <div class="parse_html">
        <?= $blog['longDescription'] ?>
      </div>
    </section>
    <?php
});
