<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan disk sistem file default yang harus digunakan
    | oleh framework. Disk "local", serta berbagai disk berbasis cloud
    | tersedia untuk aplikasi Anda untuk penyimpanan file.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'public'), // Mengubah default ke 'public' agar konsisten

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Di bawah ini Anda dapat mengonfigurasi disk sistem file sebanyak yang diperlukan, dan Anda
    | bahkan dapat mengonfigurasi beberapa disk untuk driver yang sama. Contoh untuk
    | sebagian besar driver penyimpanan yang didukung dikonfigurasi di sini sebagai referensi.
    |
    | Driver yang didukung: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'), // 'local' digunakan untuk file private
            'throw' => false,
        ],

        /* | ======================================================================
        | KONFIGURASI KUNCI ADA DI SINI
        | ======================================================================
        | Disk 'public' sekarang dikonfigurasi untuk menggunakan driver 's3'.
        | Ini berarti setiap kali kode Anda memanggil disk('public'),
        | file akan secara otomatis diunggah ke Amazon S3, bukan ke server Railway.
        */
        'public' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'visibility' => 'public',
            'throw' => false,
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
    | Bagian ini tidak lagi relevan untuk penyimpanan file publik karena kita
    | menggunakan S3, tetapi dibiarkan untuk konsistensi. Perintah `storage:link`
    | tidak diperlukan lagi untuk file publik di Railway.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

