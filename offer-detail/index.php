<?php

require_once dirname(__DIR__) . '/includes/init.php';

$slug = $_GET['slug'] ?? '';
$service = get_service_by_slug($slug);

if (!$service) {
    http_response_code(404);
    $pageTitle = 'Service Not Found | ' . SITE_NAME;
    $pageStyles = array_merge($pageStyles, ['offer.css']);

    render_page(function () {
        ?>
        <p style="text-align:center;padding:3rem;color:#6b7280;">
          Service not found.
          <a href="<?= url('/') ?>" style="color:#2563eb;">Back to home</a>
        </p>
        <?php
    });
    exit;
}

$pageTitle = $service['title'] . ' | ' . SITE_NAME;
$pageDescription = $service['description'];
$pageStyles = array_merge($pageStyles, ['offer.css']);
render_page(function () use ($service) {
    ?>
    <section class="offerBanner">
      <div class="bannerContainer">
        <h1 class="offerTitle"><?= e($service['title']) ?></h1>
      </div>
    </section>
    <div class="contentContainer">
      <div class="contentWrapper">
        <div class="contentGrid">
          <div>
            <p class="offerDescription"><?= e($service['longDescription']) ?></p>
          </div>
          <div>
            <img src="<?= e(asset('img/' . $service['img'])) ?>" alt="<?= e($service['title']) ?>" class="offerImage">
          </div>
        </div>
      </div>
    </div>
    <?php
});
