<?php

function img_alt_title(string $alt): string
{
    $escaped = e($alt);

    return 'alt="' . $escaped . '" title="' . $escaped . '"';
}

function title_attr(string $text): string
{
    $text = trim(strip_tags($text));

    return $text !== '' ? ' title="' . e($text) . '"' : '';
}

function enhance_html_accessibility(string $html, string $defaultImageAlt = ''): string
{
    $html = trim($html);
    if ($html === '') {
        return $html;
    }

    $prev = libxml_use_internal_errors(true);
    $doc = new DOMDocument('1.0', 'UTF-8');
    $doc->loadHTML(
        '<?xml encoding="UTF-8"><div id="root">' . $html . '</div>',
        LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
    );
    libxml_clear_errors();
    libxml_use_internal_errors($prev);

    $root = $doc->getElementById('root');
    if (!$root) {
        return $html;
    }

    foreach ($root->getElementsByTagName('img') as $img) {
        $alt = trim($img->getAttribute('alt'));
        if ($alt === '') {
            $alt = $defaultImageAlt !== '' ? $defaultImageAlt : 'Image';
            $img->setAttribute('alt', $alt);
        }
        if (trim($img->getAttribute('title')) === '') {
            $img->setAttribute('title', $alt);
        }
    }

    foreach ($root->getElementsByTagName('a') as $link) {
        if (trim($link->getAttribute('title')) !== '') {
            continue;
        }

        $text = trim(preg_replace('/\s+/u', ' ', $link->textContent ?? ''));
        if ($text === '') {
            $text = trim($link->getAttribute('aria-label'));
        }

        if ($text !== '') {
            $link->setAttribute('title', $text);
        }
    }

    $output = '';
    foreach ($root->childNodes as $child) {
        $output .= $doc->saveHTML($child);
    }

    return $output;
}
