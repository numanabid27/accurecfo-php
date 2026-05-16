<?php require_once __DIR__ . '/icons.php'; ?>
<header class="header">
  <div class="container">
    <div class="headerContent">
      <div class="logo">
        <a href="<?= url('/') ?>"<?= title_attr('AccureCFO Home') ?>>
          <img src="<?= e(asset('img/logo.png')) ?>" width="105" height="105" <?= img_alt_title('AccureCFO - Professional Bookkeeping Services') ?>>
        </a>
      </div>

      <nav class="nav">
        <a href="<?= url('/') ?>" class="navLink<?= is_active('/') ? ' navLinkActive' : '' ?>"<?= title_attr('Home') ?>>Home</a>
        <a href="<?= url('about') ?>" class="navLink<?= is_active('/about') ? ' navLinkActive' : '' ?>"<?= title_attr('About') ?>>About</a>
        <a href="<?= url('blogs') ?>" class="navLink<?= is_active('/blogs') ? ' navLinkActive' : '' ?>"<?= title_attr('Blogs') ?>>Blogs</a>
        <a href="<?= url('pricing') ?>" class="navLink<?= is_active('/pricing') ? ' navLinkActive' : '' ?>"<?= title_attr('Pricing') ?>>Pricing</a>
        <a href="<?= url('contact') ?>" class="navLink<?= is_active('/contact') ? ' navLinkActive' : '' ?>"<?= title_attr('Contact') ?>>Contact</a>
      </nav>

      <div class="ctaButtons">
        <a href="<?= url('contact') ?>" class="getStartedBtn"<?= title_attr('Get Started') ?>>Get Started</a>
      </div>

      <button type="button" class="mobileMenuBtn" id="mobileMenuBtn" aria-label="Open menu" aria-expanded="false">
        <span id="menuIconOpen"><?= icon('menu', 24, '#374151') ?></span>
        <span id="menuIconClose" hidden><?= icon('x', 24, '#374151') ?></span>
      </button>
    </div>
  </div>

  <div class="mobileNav" id="mobileNav" hidden>
    <nav class="mobileNavContent container">
      <a href="<?= url('/') ?>" class="navLink<?= is_active('/') ? ' navLinkActive' : '' ?>"<?= title_attr('Home') ?>>Home</a>
      <a href="<?= url('about') ?>" class="navLink<?= is_active('/about') ? ' navLinkActive' : '' ?>"<?= title_attr('About') ?>>About</a>
      <a href="<?= url('blogs') ?>" class="navLink<?= is_active('/blogs') ? ' navLinkActive' : '' ?>"<?= title_attr('Blogs') ?>>Blogs</a>
      <a href="<?= url('pricing') ?>" class="navLink<?= is_active('/pricing') ? ' navLinkActive' : '' ?>"<?= title_attr('Pricing') ?>>Pricing</a>
      <a href="<?= url('contact') ?>" class="navLink<?= is_active('/contact') ? ' navLinkActive' : '' ?>"<?= title_attr('Contact') ?>>Contact</a>
      <div class="mobileNavButtons">
        <a href="<?= url('contact') ?>" class="getStartedBtn"<?= title_attr('Get Started') ?>>Get Started</a>
      </div>
    </nav>
  </div>
</header>
