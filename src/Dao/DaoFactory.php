<?php

final class DaoFactory {

	public static function CreateDao($name) {
		$configFile = 'src/config_' . ENV . '.php';

		if(!is_file($configFile)) {
			throw new Exception('Can\'t load config file!' );
		}

		$config = include APP_PATH . $configFile;

		if(file_exists(APP_PATH . 'src/Dao/Impl/' . $name . 'DaoImpl.php')) {

			require_once APP_PATH . 'src/Dao/Impl/' . $name . 'DaoImpl.php';

			$db = new Mysql($config['dbhost'], $config['dbuser'], $config['dbpassword'], $config['database']);
			$dao = $name.'DaoImpl';

			return new $dao($db);
		}else{
			exit($name . 'Dao not Exists!');
		}
	}

}