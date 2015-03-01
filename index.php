<?php
define('THE_PATH', __DIR__);

//load the configuration of application
require THE_PATH . '/application/config/config.php';

// includ the autoload script
require THE_PATH . '/application/config/Autoload.php';

//run the application
$app = new \App\Application();
