<?php
define('APP_PATH', substr(dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 4));
require_once APP_PATH . '/src/envInit.php';
require_once 'PHPUnit/Autoload.php';
EnvInit::init('test');

class BaseTest extends PHPUnit_Framework_TestCase {

	protected $pdo;
	protected $config;

	public function setUp() {

		$this->init();

		$dataPath = APP_PATH . 'doc';
		$dataFiles = $this->readDir($dataPath);

		foreach ($dataFiles as  $dataFile) {
			$filePath = APP_PATH . 'doc/' . $dataFile;
			$handle = $this->pdo->prepare($this->readFile($filePath));
			if(!$handle->execute()){

				print($handle->errorInfo() . "\n");
				print("构建测试数据失败\n");
				exit();
			}
		}

	}

	protected function init() {
		$this->config = include APP_PATH . '/src/config_' . ENV . '.php';
		$this->createDd();
		$this->initPdo();
	}

	protected function createDd() {
		$config = $this->config;

		$dsn = 'mysql:host='. $config['dbhost'] .';charset=utf8';
		$pdo = new pdo($dsn, $config['dbuser'], $config['dbpassword']);
		$handle = $pdo->prepare('DROP DATABASE' . $config['database']);
		$handle->execute();
		
		$handle = $pdo->prepare('CREATE DATABASE ' . $config['database']);
		
		if(!$handle->execute()) {
			print("创建测试数据失败\n");
		}
	}

	protected function initPdo() {
		$config = $this->config;
		$dsn = 'mysql:dbname=' . $config['database'] . ';host='. $config['dbhost'] .';charset=utf8';
		$this->pdo = new pdo($dsn, $config['dbuser'], $config['dbpassword']);
	}

	protected function readFile($file) {
		if(!file_exists($file)) {
			exit($file . 'is not exists!');
		}
		$fp = fopen($file, 'rb');
		$data = fread($fp, filesize($file));
		fclose($fp);
		return $data;
	}

	protected function readDir($path) {
		$dirHandle = opendir($path);
		$files = array();
		while ( ($file = readdir($dirHandle)) !== false) {
			if($file != '..' && $file !='.') {
				$files[] = $file;
			}
		}
		return $files;
	}

	protected function clear() {
		$handle = $this->pdo->prepare('DROP DATABASE db_test');
 		$handle->execute();
	}

}