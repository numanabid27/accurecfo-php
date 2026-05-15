(function () {
  const root = document.getElementById('successStories');
  if (!root) return;

  const track = document.getElementById('successTrack');
  const prevBtn = document.getElementById('successPrev');
  const nextBtn = document.getElementById('successNext');
  const dotsContainer = document.getElementById('successDots');
  const cards = track ? track.querySelectorAll('.videoCard') : [];

  let currentIndex = 0;
  let videosPerView = 3;

  function getVideosPerView() {
    if (window.innerWidth <= 768) return 1;
    if (window.innerWidth <= 1024) return 2;
    return 3;
  }

  function updateSlider() {
    videosPerView = getVideosPerView();
    const maxIndex = Math.max(0, cards.length - videosPerView);
    if (currentIndex > maxIndex) currentIndex = maxIndex;

    if (track) {
      track.style.transform = 'translateX(-' + (currentIndex * (100 / videosPerView)) + '%)';
    }
    if (prevBtn) prevBtn.disabled = currentIndex === 0;
    if (nextBtn) nextBtn.disabled = currentIndex >= maxIndex;

    renderDots(maxIndex);
  }

  function renderDots(maxIndex) {
    if (!dotsContainer) return;
    dotsContainer.innerHTML = '';
    if (maxIndex < 1) return;

    for (let i = 0; i <= maxIndex; i++) {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.className = 'dot' + (i === currentIndex ? ' activeDot' : '');
      dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
      dot.addEventListener('click', function () {
        currentIndex = i;
        updateSlider();
      });
      dotsContainer.appendChild(dot);
    }
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', function () {
      currentIndex = Math.max(0, currentIndex - 1);
      updateSlider();
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      const maxIndex = Math.max(0, cards.length - videosPerView);
      currentIndex = Math.min(currentIndex + 1, maxIndex);
      updateSlider();
    });
  }

  window.addEventListener('resize', function () {
    currentIndex = 0;
    updateSlider();
  });

  updateSlider();
})();
