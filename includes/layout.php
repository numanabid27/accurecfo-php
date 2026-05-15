<?php

function render_page(callable $content): void
{
    render_head();
    require INCLUDES_PATH . '/header.php';
    $content();
    require INCLUDES_PATH . '/footer.php';
    render_foot();
}
