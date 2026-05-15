<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

$routes = [
    '/' => __DIR__ . '/index.php',
    '/about' => __DIR__ . '/about.php',
    '/contact' => __DIR__ . '/contact.php',
    '/pricing' => __DIR__ . '/pricing.php',
    '/privacy-policy' => __DIR__ . '/privacy-policy.php',
    '/blogs' => __DIR__ . '/blogs/index.php',
];

if (isset($routes[$uri])) {
    require $routes[$uri];
    return true;
}

if (preg_match('#^/blogs/(\d+)$#', $uri, $m)) {
    $_GET['id'] = $m[1];
    require __DIR__ . '/blogs/detail.php';
    return true;
}

if (preg_match('#^/offer-detail/([^/]+)$#', $uri, $m)) {
    $_GET['slug'] = $m[1];
    require __DIR__ . '/offer-detail/index.php';
    return true;
}

if (preg_match('#\.(css|js|png|jpg|jpeg|gif|svg|ico|webp)$#', $uri)) {
    return false;
}

http_response_code(404);
echo '404 Not Found';
return true;
