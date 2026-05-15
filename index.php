<?php

require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/icons.php';

$pageStyles = array_merge($pageStyles, ['banner.css', 'home.css', 'faqs.css', 'success.css']);
$pageScripts[] = 'success-stories.js';

$benefits = [
    'Simple and accurate management ',
    'Skilled and passionate experts ',
    'Financial Reporting ',
    'Budgeting and Forecasting ',
];

$stepColors = ['green700', 'green600', 'green500', 'green400', 'green300'];

render_page(function () use ($benefits, $stepColors) {
    global $SERVICES, $PLANS, $STEPS, $FAQS;
    ?>
    <section class="bannerSection">
      <div class="container">
        <div class="heroGrid">
          <div>
            <h1 class="heroTitle">BUILD PROFESSIONAL FINANCIAL RECORD</h1>
            <p class="heroDescription">
              Maintain financial records and handle bookkeeping professionally is not complicated with AccureCFO. We manage business finances that welcomes success.
            </p>
            <div class="benefitsList">
              <?php foreach ($benefits as $benefit): ?>
              <div class="benefitItem">
                <span style="display:inline-flex;margin-right:0.75rem;color:#10b981;"><?= icon('check-circle', 20, '#10b981') ?></span>
                <span class="benefitText"><?= e($benefit) ?></span>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="dashboardPreview">
            <div class="dashboardCard">
              <div class="overviewSection">
                <div class="overviewHeader">
                  <h3 class="overviewTitle">Financial Overview</h3>
                  <span class="overviewDate">This Month</span>
                </div>
                <div class="statsGrid">
                  <div class="statCard">
                    <p class="statLabel">Revenue</p>
                    <p class="statValue greenText">$45,230</p>
                    <p class="statChange greenText">+12.5%</p>
                  </div>
                  <div class="statCard">
                    <p class="statLabel">Expenses</p>
                    <p class="statValue redText">$18,940</p>
                    <p class="statChange redText">+3.2%</p>
                  </div>
                </div>
              </div>
              <div class="transactionsList">
                <?php
                $transactions = [
                    ['name' => 'Client Payment', 'amount' => '+$2,500', 'color' => 'greenText'],
                    ['name' => 'Office Rent', 'amount' => '-$1,200', 'color' => 'redText'],
                    ['name' => 'Software License', 'amount' => '-$299', 'color' => 'redText'],
                ];
                foreach ($transactions as $tx):
                ?>
                <div class="transactionItem">
                  <span class="transactionName"><?= e($tx['name']) ?></span>
                  <span class="transactionAmount <?= e($tx['color']) ?>"><?= e($tx['amount']) ?></span>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="servicesSection">
      <div class="container">
        <div class="sectionTitle">
          <h2 class="mainTitle">Top Business Financial Services</h2>
        </div>
        <div class="servicesGrid">
          <?php foreach ($SERVICES as $service): ?>
          <div class="serviceCard">
            <div class="serviceIcon">
              <img src="<?= e(asset('img/' . $service['icon'])) ?>" alt="<?= e($service['title']) ?>" style="width:4rem;height:4rem;">
            </div>
            <h3 class="serviceTitle"><?= e($service['title']) ?></h3>
            <p class="serviceDescription"><?= e($service['description']) ?></p>
            <a href="<?= url('offer-detail/' . $service['slug']) ?>" class="learnMoreBtn">Learn More →</a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="whyChooseSection">
      <h2 class="whyChooseTitle">Why Choose Us?</h2>
      <div class="stepsGrid">
        <?php foreach ($STEPS as $index => $step): ?>
        <div class="stepCard <?= e($stepColors[$index] ?? '') ?>">
          <span class="stepNumber"><?= e($step['number']) ?></span>
          <h3 class="stepTitle"><?= e($step['title']) ?></h3>
          <p class="stepDescription"><?= e($step['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="storySec">
      <?php require INCLUDES_PATH . '/success-stories.php'; ?>
    </section>

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

    <section class="aboutSection">
      <div class="container" style="padding-top:0;">
        <h2 class="mainTitle" style="text-align:center;margin-bottom:50px;">Our Presence</h2>
        <div>
          <img src="<?= e(asset('img/map.png')) ?>" alt="AccureCFO global presence and service locations map" style="width:100%;height:auto;object-fit:contain;">
        </div>
      </div>
    </section>

    <section class="faqsSection">
      <?php $faqs = $FAQS; require INCLUDES_PATH . '/faqs.php'; ?>
    </section>
    <?php
});
