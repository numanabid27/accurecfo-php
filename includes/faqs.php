<?php
/** @var array $faqs */
?>
<div class="container">
  <h2 class="title">Frequently Asked Questions</h2>
  <div class="faqList">
    <?php foreach ($faqs as $index => $faq): ?>
    <div class="faqItem">
      <button type="button" class="faqButton" data-faq-toggle="<?= (int) $index ?>" aria-expanded="false">
        <span class="faqQuestion"><?= e($faq['question']) ?></span>
        <svg class="faqIcon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div class="faqAnswer faqAnswerClosed" id="faq-answer-<?= (int) $index ?>" hidden>
        <div class="faqAnswerContent">
          <?= enhance_html_accessibility($faq['answer']) ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
