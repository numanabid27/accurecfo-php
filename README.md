# AccureCFO PHP Website

PHP version of the AccureCFO marketing site (converted from the Next.js project in `test-aceurfo`).

## Requirements

- PHP 8.0+
- Apache with `mod_rewrite` enabled (or equivalent URL rewriting)

## Local development

```bash
cd C:\PROJECTS\new-acc
php -S localhost:8080 router.php
```

Open [http://localhost:8080](http://localhost:8080). For clean URLs (`/about`, `/blogs/1`, etc.), use Apache with the included `.htaccess` or configure your server to match the rewrite rules.

## Pages

| URL | File |
|-----|------|
| `/` | `index.php` |
| `/about` | `about.php` |
| `/contact` | `contact.php` |
| `/pricing` | `pricing.php` |
| `/privacy-policy` | `privacy-policy.php` |
| `/blogs` | `blogs/index.php` |
| `/blogs/{id}` | `blogs/detail.php` |
| `/offer-detail/{slug}` | `offer-detail/index.php` |

## Structure

- `includes/` — shared PHP (header, footer, data, blog API)
- `assets/css/` — styles from the Next.js CSS modules
- `assets/img/` — images
- `assets/js/` — client scripts (menu, FAQs, contact form, success stories slider)

Blogs are loaded from `https://dashboard.accurecfo.com/api/blogs` (same API as the Next.js app).
