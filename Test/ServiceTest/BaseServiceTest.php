<?php
require_once substr(dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 12) . "/BaseTest.php";

class BaseServiceTest extends BaseTest {

 	public function tearDown() {
 		$this->clear();
 	}

}