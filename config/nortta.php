<?php

return [
    'url' => env('NORTTA_URL', 'https://www.nortta.com/'),

    'ssl' => env('NORTTA_SSL', true),

    'path' => storage_path('app/nortta/key'),

    'cipher' => 'aes-128-cbc',
];