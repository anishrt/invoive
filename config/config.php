<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'simpleadmin');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));
define('SITE_URL',$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));
define('ASSETS_PATH',SITE_URL.'/assets/');
?>
