<?php

require_once dirname(__DIR__) . '/includes/init.php';

$slug = $_GET['slug'] ?? '';
$service = get_service_by_slug($slug);

if (!$service) {
    http_response_code(404);
    set_page_meta(
        'Service Not Found | AccureCFO Services',
        'The service you are looking for could not be found. Explore AccureCFO bookkeeping, financial reporting, cash flow management, and accounting software implementation services for your business.',
        null,
        null,
        'website',
        'noindex, nofollow'
    );
    $pageStyles = array_merge($pageStyles, ['offer.css']);

    render_page(function () {
        ?>
        <p style="text-align:center;padding:3rem;color:#6b7280;">
          Service not found.
          <a href="<?= url('/') ?>" style="color:#2563eb;"<?= title_attr('Back to home') ?>>Back to home</a>
        </p>
        <?php
    });
    exit;
}

set_page_meta(
    $service['title'] . ' | AccureCFO Services',
    $service['longDescription'] ?: $service['description'],
    'offer-detail/' . $service['slug'],
    'assets/img/' . $service['img']
);
set_page_schema_service($service);
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
            <img src="<?= e(asset('img/' . $service['img'])) ?>" <?= img_alt_title($service['title']) ?> class="offerImage">
          </div>
        </div>
      </div>
    </div>
    <?php
});
