<?php

function icon(string $name, int $size = 24, string $color = 'currentColor'): string
{
    $attrs = sprintf('width="%d" height="%d" viewBox="0 0 24 24" fill="none" stroke="%s" stroke-width="2"', $size, $size, e($color));

    return match ($name) {
        'check-circle' => "<svg $attrs><path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"/><path d=\"m9 11 3 3L22 4\"/></svg>",
        'check' => "<svg $attrs><path d=\"M20 6 9 17l-5-5\"/></svg>",
        'star' => "<svg $attrs fill=\"$color\" stroke=\"none\"><polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/></svg>",
        'menu' => "<svg $attrs><line x1=\"4\" x2=\"20\" y1=\"12\" y2=\"12\"/><line x1=\"4\" x2=\"20\" y1=\"6\" y2=\"6\"/><line x1=\"4\" x2=\"20\" y1=\"18\" y2=\"18\"/></svg>",
        'x' => "<svg $attrs><path d=\"M18 6 6 18\"/><path d=\"m6 6 12 12\"/></svg>",
        'chevron-left' => "<svg $attrs><path d=\"m15 18-6-6 6-6\"/></svg>",
        'chevron-right' => "<svg $attrs><path d=\"m9 18 6-6-6-6\"/></svg>",
        'phone' => "<svg $attrs><path d=\"M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z\"/></svg>",
        'mail' => "<svg $attrs><rect width=\"20\" height=\"16\" x=\"2\" y=\"4\" rx=\"2\"/><path d=\"m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7\"/></svg>",
        'map-pin' => "<svg $attrs><path d=\"M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z\"/><circle cx=\"12\" cy=\"10\" r=\"3\"/></svg>",
        'clock' => "<svg $attrs><circle cx=\"12\" cy=\"12\" r=\"10\"/><polyline points=\"12 6 12 12 16 14\"/></svg>",
        'users' => "<svg $attrs><path d=\"M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2\"/><circle cx=\"9\" cy=\"7\" r=\"4\"/><path d=\"M22 21v-2a4 4 0 0 0-3-3.87\"/><path d=\"M16 3.13a4 4 0 0 1 0 7.75\"/></svg>",
        'award' => "<svg $attrs><circle cx=\"12\" cy=\"8\" r=\"6\"/><path d=\"M15.477 12.89 17 22l-5-3-5 3 1.523-9.11\"/></svg>",
        'shield' => "<svg $attrs><path d=\"M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z\"/></svg>",
        default => '',
    };
}
