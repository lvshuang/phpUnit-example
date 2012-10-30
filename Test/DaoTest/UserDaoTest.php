<?php
require_once 'BaseDaoTest.php';

class UserDaoTest extends BaseDaoTest {

	public function setUp() {
		$this->init();

		$filePath = APP_PATH . 'doc/user.sql';
		$handle = $this->pdo->prepare($this->readFile($filePath));
		if(!$handle->execute()){

			print($handle->errorInfo() . "\n");
			print("构建测试数据失败\n");
			exit();
		}
	}

	public function testFindUserByName() {
		$dao = DaoFactory::createDao('User');
		$this->assertTrue($dao->addUser(array('userName'=>'lvshuang1201@gmail.com', 'password'=>
			md5(123), 'isAdmin'=>0, 'createdTime'=> time())));
		$this->assertNotEmpty($dao->findUserByUserName('lvshuang1201@gmail.com'));
		$this->assertEmpty($dao->findUserByUserName('lvshuang@gmail.com'));
	}

	public function testFindUser() {
		$dao = DaoFactory::createDao('User');
		$this->assertTrue($dao->addUser(array('userName'=>'lvshuang1201@gmail.com', 'password'=>
			md5(123), 'isAdmin'=>0, 'createdTime'=> time())));
		$this->assertNotEmpty($dao->findUser(1));
		$this->assertEmpty($dao->findUser(10));
	}

	public function testDeleteUser() {
		$dao = DaoFactory::createDao('User');
		$this->assertTrue($dao->addUser(array('userName'=>'lvshuang1201@gmail.com', 'password'=>
			md5(123), 'isAdmin'=>0, 'createdTime'=> time())));
		$this->assertTrue($dao->deleteUser(1));
		$this->assertTrue($dao->deleteUser(10));
		$this->assertEmpty($dao->findUser(1));
	}

}