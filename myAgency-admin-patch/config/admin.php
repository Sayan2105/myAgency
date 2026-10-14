<?php

return [
    // Comma separated list in .env, for example: ADMIN_EMAILS=you@definebit.dev
    'emails' => array_filter(array_map('trim', explode(',', (string) env('ADMIN_EMAILS', '')))),
];
