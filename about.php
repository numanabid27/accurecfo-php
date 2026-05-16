<?php

require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/icons.php';

set_page_meta(
    'About AccureCFO | Expert Bookkeeping Team',
    'Learn about AccureCFO professional financial management and bookkeeping services. Meet our certified team delivering accurate reporting, compliance, and growth-focused finance solutions for businesses.',
    'about'
);
$pageStyles = array_merge($pageStyles, ['banner.css', 'about.css']);

render_page(function () {
    global $STATS, $TEAM;
    $bannerTitle = 'About';
    $bannerDesc = 'We turn complex business challenges into opportunities through personalized finance and bookkeeping services. Whether you\'re at the initial stage of starting your own business or you already have a stable company, we manage accounts and finance with excellence';
    ?>
    <section id="about" class="aboutSection">
      <?php require INCLUDES_PATH . '/banner.php'; ?>
      <div class="container">
        <div class="aboutGrid">
          <div>
            <h2 class="aboutTitle">Professional Financial Management and Bookkeeping</h2>
            <p class="aboutText">
              Lack of professional accounts and Finance management hinders your business achievement. AccureCFO's accounting services include everything that streamlines your business processes. Our experts help you achieve your business vision without incurring any risks to your accounts. We bring profitable solutions with accurate financial reporting.
            </p>
            <p class="aboutText">
              We professionally handle your financial data and reports, which helps you maintain the trust of your stakeholders confidently. With AccureCFO, businesses can focus on improvement, while we handle their bookkeeping requirements.
            </p>
          </div>
          <div class="aboutImage">
            <img src="<?= e(asset('img/about1.jpg')) ?>" <?= img_alt_title('Professional team working') ?> class="aboutImageContent">
          </div>
        </div>
      </div>

      <div class="statsSection">
        <?php foreach ($STATS as $stat): ?>
        <div class="statItem">
          <div class="statIcon"><?= icon($stat['icon'], 32, '#00A63E') ?></div>
          <div class="statNumber"><?= e($stat['number']) ?></div>
          <div class="statLabel"><?= e($stat['label']) ?></div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="container">
        <div class="whyChooseSection">
          <div class="whyChooseLeft">
            <h2 class="whyChooseTitle">Why Choose AccureCFO</h2>
            <p class="whyChooseSubtitle">
              AccureCFO brings innovation to businesses through talented minds. The possibility of delivering top-notch accounts solutions comes from a dedicated team of experts.
            </p>
          </div>
          <div class="whyChooseRight">
            <p class="whyChooseText">
              We effectively set up accounting objectives, ensuring compliance with regulatory requirements. AccureCFO offers accuracy that sets your accounting objectives up for success. Moreover, AccureCFO identifies the pathway for growth and allocates resources effectively to help you maximize savings.
            </p>
            <p>
              <span class="quoteText">People and the quality of their lives.</span>
              <span class="quoteText">That, at its core, is what Bench is about.</span>
            </p>
          </div>
        </div>
        <img src="<?= e(asset('img/about.png')) ?>" <?= img_alt_title('AccureCFO professional financial management team') ?> class="bannerImage">
      </div>

      <div class="teamSection">
        <h3 class="teamTitle">Meet Our Talented Team</h3>
        <p class="teamDescription">
          AccureCFO's certified team knows how to bring transitions to a business through expertise, the latest tools, and cloud-based software.
        </p>
        <div class="teamGrid">
          <?php foreach ($TEAM as $member): ?>
          <div class="teamMember">
            <div class="memberImageContainer">
              <img src="<?= e(asset('img/' . $member['image'])) ?>" <?= img_alt_title($member['name'] . ' - ' . $member['role']) ?> width="100" height="100" class="memberImage">
            </div>
            <h4 class="memberName"><?= e($member['name']) ?></h4>
            <p class="memberRole"><?= e($member['role']) ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php
});
