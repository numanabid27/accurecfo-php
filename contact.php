<?php

require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/icons.php';

$pageTitle = 'Contact Us | ' . SITE_NAME;
$pageDescription = 'Contact AccureCFO for professional bookkeeping and financial services.';
$pageStyles = array_merge($pageStyles, ['banner.css', 'contact.css']);
$pageScripts[] = 'contact.js';

render_page(function () {
    $bannerTitle = 'Contact Us';
    $bannerDesc = 'From today, ensure well-informed decisions that bring change to the life of your business. AccureCFO helps you unlock finance mastery with enhanced efficiency!';
    ?>
    <section class="contactSection">
      <?php require INCLUDES_PATH . '/banner.php'; ?>
      <div class="container">
        <div class="sectionTitle">
          <h2 class="mainTitle">Ready to Step Up for Success?</h2>
          <p class="description">
            Experience financial transparency to maximize your business's profit. Our professionals are ready to uplift accounting standards
          </p>
        </div>

        <div class="contentGrid">
          <div class="formCard">
            <h3 class="formTitle">Send us a message</h3>
            <form class="form" id="contactForm" novalidate>
              <div class="formRow">
                <div class="formGroup">
                  <label class="label" for="firstName">First Name <span class="required">*</span></label>
                  <input name="firstName" id="firstName" type="text" class="input" placeholder="Enter First Name" required>
                  <span class="errorMessage" id="error-firstName" hidden></span>
                </div>
                <div class="formGroup">
                  <label class="label" for="lastName">Last Name <span class="required">*</span></label>
                  <input name="lastName" id="lastName" type="text" class="input" placeholder="Enter Last Name" required>
                  <span class="errorMessage" id="error-lastName" hidden></span>
                </div>
              </div>
              <div class="formGroup">
                <label class="label" for="email">Email Address <span class="required">*</span></label>
                <input name="email" id="email" type="email" class="input" placeholder="Enter Email" required>
                <span class="errorMessage" id="error-email" hidden></span>
              </div>
              <div class="formGroup">
                <label class="label" for="message">Message <span class="required">*</span></label>
                <textarea name="message" id="message" rows="6" class="textarea" placeholder="Tell us about your bookkeeping needs..." required></textarea>
                <span class="errorMessage" id="error-message" hidden></span>
              </div>
              <div class="statusMessage" id="formStatus" hidden></div>
              <button type="submit" class="submitBtn">Send Message</button>
            </form>
          </div>

          <div class="contactInfo">
            <div class="infoCard">
              <h3 class="infoTitle">Get in touch</h3>
              <div class="infoList">
                <div class="infoItem">
                  <div class="iconContainer"><?= icon('phone', 24, '#00A63E') ?></div>
                  <div class="infoContent">
                    <h4>Phone</h4>
                    <a href="tel:+16149607335">+1 (614) 960-7335</a>
                    <p class="small">Mon-Fri 9am-6pm EST</p>
                  </div>
                </div>
                <div class="infoItem">
                  <div class="iconContainer"><?= icon('mail', 24, '#00A63E') ?></div>
                  <div class="infoContent">
                    <h4>Email</h4>
                    <a href="mailto:info@accurecfo.com">info@accurecfo.com</a>
                    <p class="small">We'll respond within 24 hours</p>
                  </div>
                </div>
                <div class="infoItem">
                  <div class="iconContainer"><?= icon('map-pin', 24, '#00A63E') ?></div>
                  <div class="infoContent">
                    <h4>Office</h4>
                    <p>Columbus, Ohio, USA</p>
                  </div>
                </div>
                <div class="infoItem">
                  <div class="iconContainer"><?= icon('clock', 24, '#00A63E') ?></div>
                  <div class="infoContent">
                    <h4>Business Hours</h4>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                    <p>Saturday: 10:00 AM - 2:00 PM</p>
                    <p>Sunday: Closed</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="ctaCard">
              <h3 class="ctaTitle">Ready to streamline your books?</h3>
              <p class="ctaDescription">
                Schedule a free consultation and see how we can help your business grow.
              </p>
              <a href="https://calendly.com/arif-sheikh1125/30min" target="_blank" rel="noopener noreferrer" class="ctaBtn">
                Schedule Free Consultation
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
});
