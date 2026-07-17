<?php

// basic app information
define('APP_NAME', 'Galeri UMKM API');
define('APP_VERSION', '1.0.0');
define('APP_CHARSET', 'UTF-8');

// URL
define('BASE_URL', '/Website-Galeri-UMKM/backend');

//timezone
date_default_timezone_set('Asia/Makassar');
define('APP_TIMEZONE', 'Asia/Makassar');

//storage
define('STORAGE_PATH', __DIR__ . '/../storage');
define('UPLOAD_PATH', STORAGE_PATH . '/uploads');

//file upload
define('MAX_UPLOAD_SIZE', 2 * 1024 * 1024);
define('ALLOWED_IMAGE_EXT', ['jpg', 'jpeg', 'png', 'webp']);

//environment
define('APP_ENV', 'development');

//rate limit
define('RATE_LIMIT_ENABLED', false);
define('RATE_LIMIT_MAX_REQUEST', 60);
define('RATE_LIMIT_WINDOW_SECONDS', 60);

//error reporting
if (APP_ENV === 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(E_ALL);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/../logs/error.log');
}
