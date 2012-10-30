<?php
require_once substr(dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 8) . "/BaseTest.php";
require_once APP_PATH . 'src/Dao/DaoFactory.php';

class BaseDaoTest extends BaseTest {

	public function setUp(){ }
 
 	public function tearDown() {
		$this->clear(); 		
 	}
}