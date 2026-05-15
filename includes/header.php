<?php require_once __DIR__ . '/icons.php'; ?>
<header class="header">
  <div class="container">
    <div class="headerContent">
      <div class="logo">
        <a href="<?= url('/') ?>">
          <img src="<?= e(asset('img/logo.png')) ?>" width="105" height="105" alt="AccureCFO - Professional Bookkeeping Services">
        </a>
      </div>

      <nav class="nav">
        <a href="<?= url('/') ?>" class="navLink<?= is_active('/') ? ' navLinkActive' : '' ?>">Home</a>
        <a href="<?= url('about') ?>" class="navLink<?= is_active('/about') ? ' navLinkActive' : '' ?>">About</a>
        <a href="<?= url('blogs') ?>" class="navLink<?= is_active('/blogs') ? ' navLinkActive' : '' ?>">Blogs</a>
        <a href="<?= url('pricing') ?>" class="navLink<?= is_active('/pricing') ? ' navLinkActive' : '' ?>">Pricing</a>
        <a href="<?= url('contact') ?>" class="navLink<?= is_active('/contact') ? ' navLinkActive' : '' ?>">Contact</a>
      </nav>

      <div class="ctaButtons">
        <a href="<?= url('contact') ?>" class="getStartedBtn">Get Started</a>
      </div>

      <button type="button" class="mobileMenuBtn" id="mobileMenuBtn" aria-label="Open menu" aria-expanded="false">
        <span id="menuIconOpen"><?= icon('menu', 24, '#374151') ?></span>
        <span id="menuIconClose" hidden><?= icon('x', 24, '#374151') ?></span>
      </button>
    </div>
  </div>

  <div class="mobileNav" id="mobileNav" hidden>
    <nav class="mobileNavContent container">
      <a href="<?= url('/') ?>" class="navLink<?= is_active('/') ? ' navLinkActive' : '' ?>">Home</a>
      <a href="<?= url('about') ?>" class="navLink<?= is_active('/about') ? ' navLinkActive' : '' ?>">About</a>
      <a href="<?= url('blogs') ?>" class="navLink<?= is_active('/blogs') ? ' navLinkActive' : '' ?>">Blogs</a>
      <a href="<?= url('pricing') ?>" class="navLink<?= is_active('/pricing') ? ' navLinkActive' : '' ?>">Pricing</a>
      <a href="<?= url('contact') ?>" class="navLink<?= is_active('/contact') ? ' navLinkActive' : '' ?>">Contact</a>
      <div class="mobileNavButtons">
        <a href="<?= url('contact') ?>" class="getStartedBtn">Get Started</a>
      </div>
    </nav>
  </div>
</header>
