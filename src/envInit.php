<?php
session_start();
if(!defined('APP_PATH')){
	define('APP_PATH', substr(dirname(__FILE__), 0, strlen(dirname(__FILE__)) -3 ));
}

require_once APP_PATH . 'lib/Class/DB/Mysql.php';
require_once APP_PATH . 'lib/Class/Routing.php';

class EnvInit {
	public static function init($env = '') {
		define('ENV', $env);
	}
}