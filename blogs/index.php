<?php

require_once dirname(__DIR__) . '/includes/init.php';

set_page_meta(
    'AccureCFO Blog | Bookkeeping & Finance Tips',
    'Read the latest AccureCFO articles on bookkeeping, financial management, cash flow, and business finance. Expert insights to help you make smarter decisions and grow your business with confidence.',
    'blogs'
);
$pageStyles = array_merge($pageStyles, ['banner.css', 'blogs.css']);

$posts = get_blogs();

render_page(function () use ($posts) {
    $bannerTitle = 'Blogs';
    ob_start();
    ?>
    At <span style="font-weight:600;">AccureCFO</span>, we offer a wide
    range of financial services tailored to meet the diverse needs of our
    clients. Our team of experts is committed to delivering exceptional
    service and strategic solutions. Explore our services below:
    <?php
    $bannerDesc = ob_get_clean();
    require INCLUDES_PATH . '/banner.php';
    ?>
    <section class="blogsSection">
      <?php if (count($posts) === 0): ?>
      <p style="text-align:center;color:#6b7280;">No blog posts yet.</p>
      <?php else: ?>
      <div class="blogsGrid">
        <?php foreach ($posts as $blog): ?>
        <div class="blogCard">
          <img src="<?= e($blog['image']) ?>" <?= img_alt_title($blog['title']) ?> class="blogImage" width="300" height="300">
          <div class="blogContent">
            <p class="blogDate"><?= e($blog['date']) ?></p>
            <h3 class="blogTitle" title="<?= e($blog['title']) ?>"><?= e($blog['title']) ?></h3>
            <p class="blogDescription"><?= e($blog['description']) ?></p>
            <a href="<?= blog_url($blog) ?>" class="readMoreLink"<?= title_attr('Read more: ' . $blog['title']) ?>>Read More →</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </section>
    <?php
});
