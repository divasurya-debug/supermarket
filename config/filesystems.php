<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Disk default untuk penyimpanan file.
    | Kita pakai 'public' supaya file bisa langsung diakses via URL.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Konfigurasi disk penyimpanan.
    | - local  : untuk file private (tidak diakses publik).
    | - public : untuk file publik (gambar, upload user, dll).
    | - s3     : contoh kalau nanti mau pakai Amazon S3.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public_uploads' => [
        'driver' => 'local',
        'root' => public_path('uploads'),
        'url' => env('APP_URL').'/uploads',
        'visibility' => 'public',
    ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Perintah `php artisan storage:link` akan membuat symbolic link
    | dari "public/storage" ke "storage/app/public" supaya file bisa diakses.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
