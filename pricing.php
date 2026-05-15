<?php

require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/icons.php';

$pageTitle = 'Pricing | ' . SITE_NAME;
$pageDescription = 'Choose the plan that fits your business needs. Simple, transparent pricing with no hidden fees.';
$pageStyles = array_merge($pageStyles, ['banner.css', 'pricing.css']);

render_page(function () {
    global $PLANS;
    $bannerTitle = 'Pricing';
    $bannerDesc = 'Choose the plan that fits your business needs. All plans include our core bookkeeping services with no hidden fees or long-term contracts.';
    ?>
    <section>
      <div class="contactSection">
        <?php require INCLUDES_PATH . '/banner.php'; ?>
        <div class="container">
          <section class="pricingSection">
            <div class="container">
              <div class="sectionTitle">
                <h2 class="mainTitle">Simple, Transparent Pricing</h2>
                <p class="aboutText">
                  Choose the plan that fits your business needs. All plans include our core bookkeeping
                  services with no hidden fees or long-term contracts.
                </p>
              </div>
              <div class="pricingGrid">
                <?php foreach ($PLANS as $plan): ?>
                <div class="pricingCard<?= $plan['popular'] ? ' popularCard' : '' ?>">
                  <?php if ($plan['popular']): ?>
                  <div class="popularBadge">
                    <div class="popularBadgeContent">
                      <?= icon('star', 16, '#fff') ?>
                      Most Popular
                    </div>
                  </div>
                  <?php endif; ?>
                  <div class="planHeader">
                    <h3 class="planName"><?= e($plan['name']) ?></h3>
                    <p class="planDescription"><?= e($plan['description']) ?></p>
                    <div class="priceContainer">
                      <span class="price"><?= e($plan['price']) ?></span>
                      <span class="period"><?= e($plan['period']) ?></span>
                    </div>
                  </div>
                  <ul class="featuresList">
                    <?php foreach ($plan['features'] as $feature): ?>
                    <li class="featureItem">
                      <span style="display:inline-flex;margin-right:0.75rem;flex-shrink:0;color:#10b981;"><?= icon('check', 20, '#10b981') ?></span>
                      <span class="featureText"><?= e($feature) ?></span>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                  <a href="<?= url('contact') ?>" class="planButton <?= $plan['popular'] ? 'primaryPlanBtn' : 'secondaryPlanBtn' ?>">Get Started</a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
    <?php
});
