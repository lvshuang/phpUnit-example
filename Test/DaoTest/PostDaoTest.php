<?php
require_once 'BaseDaoTest.php';

class PostDaoTest extends BaseDaoTest {

	public function setUp() {
		$this->init();

		$filePath = APP_PATH . 'doc/post.sql';
		$handle = $this->pdo->prepare($this->readFile($filePath));
		if(!$handle->execute()){

			print($handle->errorInfo() . "\n");
			print("构建测试数据失败\n");
			exit();
		}
	}

	public function testFindPost() {
		$dao = DaoFactory::createDao('Post');
		$data = array('title' => 'Test Title', 'content' => 'Test Content ', 'createdTime' => time());
		$dao->addPost($data);
		$this->assertNotEmpty($dao->findPost(1));
		$this->assertEmpty($dao->findPost(0));
	}

	public function testDeletePost() {
		$dao = DaoFactory::createDao('Post');
		$data = array('title' => 'Test Title', 'content' => 'Test Content ', 'createdTime' => time());
		$dao->addPost($data);
		$this->assertTrue($dao->deletePost(2));
		$this->assertEmpty($dao->findPost(2));
	}

}