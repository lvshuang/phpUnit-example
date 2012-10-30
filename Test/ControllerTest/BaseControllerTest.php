<?php
require_once substr(dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 15) . "/BaseTest.php";
require_once APP_PATH . 'src/Controller/indexController.php';

class ControllerTest extends BaseTest {

	public function setUp(){
		$this->init();
	}
 
 	public function tearDown(){
 		$this->clear();
 	}

	public function testLoginAction()
	{
		$_POST['username'] = 'lvshuang1201@gmail.com';
		$_POST['password'] = '3842407';
		$indexController = new indexController();
		$this->assertTrue($indexController->loginAction());
	}

}