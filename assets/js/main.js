(function () {
  const menuBtn = document.getElementById('mobileMenuBtn');
  const mobileNav = document.getElementById('mobileNav');
  const iconOpen = document.getElementById('menuIconOpen');
  const iconClose = document.getElementById('menuIconClose');

  if (menuBtn && mobileNav) {
    menuBtn.addEventListener('click', function () {
      const isOpen = !mobileNav.hidden;
      mobileNav.hidden = isOpen;
      menuBtn.setAttribute('aria-expanded', String(!isOpen));
      menuBtn.setAttribute('aria-label', isOpen ? 'Open menu' : 'Close menu');
      if (iconOpen) iconOpen.hidden = !isOpen;
      if (iconClose) iconClose.hidden = isOpen;
    });
  }

  document.querySelectorAll('[data-faq-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const index = btn.getAttribute('data-faq-toggle');
      const panel = document.getElementById('faq-answer-' + index);
      const icon = btn.querySelector('.faqIcon');
      const expanded = btn.getAttribute('aria-expanded') === 'true';

      btn.setAttribute('aria-expanded', String(!expanded));
      if (panel) {
        panel.hidden = expanded;
        panel.classList.toggle('faqAnswerOpen', !expanded);
        panel.classList.toggle('faqAnswerClosed', expanded);
      }
      if (icon) {
        icon.classList.toggle('faqIconRotated', !expanded);
      }
    });
  });
})();
