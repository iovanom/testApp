<?php
//define the template path
define('TEMPLATE_PATH', THE_PATH . '/application/View/_templates');

//define the main template
define('MAIN_TEMPLATE', '_main');

//define the main controller
define('MAIN_CONTROLLER', 'Home');

define('UPLOAD_FILE_DIR', THE_PATH . "/public/users_files/");

//messages constants
require THE_PATH . '/application/config/msgConst.php';

//DB constants
define('DB_SERVER', 'localhost');

define('DB_USER', 'root');

define('DB_PASS', 'ferrari');

define('DB_NAME', 'testApp');