<?php
global $VIDEO_SLIDES;
require_once __DIR__ . '/icons.php';
?>
<div class="container" id="successStories">
  <h2 class="title">Success Stories From Our Clients</h2>
  <div class="sliderWrapper">
    <button type="button" class="navButton" id="successPrev" aria-label="Previous slide" disabled>
      <?= icon('chevron-left', 24) ?>
    </button>

    <div class="sliderContainer">
      <div class="slidesTrack" id="successTrack">
        <?php foreach ($VIDEO_SLIDES as $slide): ?>
        <div class="videoCard">
          <div class="videoWrapper">
            <iframe
              src="https://www.youtube.com/embed/<?= e($slide['videoId']) ?>"
              title="<?= e($slide['title']) ?>"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
              class="video"
            ></iframe>
          </div>
          <div class="slideInfo">
            <h3 class="slideTitle"><?= e($slide['title']) ?></h3>
            <p class="slideDescription"><?= e($slide['description']) ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <button type="button" class="navButton" id="successNext" aria-label="Next slide">
      <?= icon('chevron-right', 24) ?>
    </button>
  </div>

  <div class="dotsContainer" id="successDots"></div>
</div>
