<?php
// Composer Autoloader
require __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR . "..");
define('APP_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'app');
define('PUBLIC_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'public');

if (!ob_start("ob_gzhandler")) {
    ob_start();
}

$app = new \core\App();

print $app->initialize();


while (ob_get_level() > 0) {
    ob_end_flush();
}