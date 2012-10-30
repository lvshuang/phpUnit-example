<?php
require_once 'BaseServiceTest.php';
require_once APP_PATH . 'src/Service/Impl/UserServiceImpl.php';
require_once APP_PATH . 'src/Service/Impl/PostServiceImpl.php';

class AllServiceTest extends BaseServiceTest {


	public function testAddUser() 
	{
		$userService = new UserServiceImpl();
		$this->assertTrue($userService->addUser(array('userName'=>'lvshuang1201@gmail.com', 'password'=>
			md5(123), 'isAdmin'=>0, 'createdTime'=> time())));
	}

	public function testLoginAction()
	{
		$data = array('username' => 'lvshuang1201@gmail.com', 'password' => 123);
		$userService = new UserServiceImpl();
		$this->assertTrue($userService->addUser(array('userName'=>'lvshuang1201@gmail.com', 'password'=>
			md5(123), 'isAdmin'=>0, 'createdTime'=> time())));
		$this->assertTrue($userService->login($data), '测试应该通过');
	}

	public function testGetUserById()
	{
		$userService = new UserServiceImpl();
		$this->assertTrue($userService->addUser(array('userName'=>'lvshuang1201@gmail.com', 'password'=>
			md5(123), 'isAdmin'=>0, 'createdTime'=> time())));
		$this->assertNotNull($userService->getUser(1));
	}

	public function testAddPost() 
	{
		$postService = new PostServiceImpl();
		$data = array('title' => 'Test Title', 'content' => 'Test Content ', 'createdTime' => time());
		$this->assertTrue($postService->addPost($data), 'ADD USER !');
	}

	public function testGetPost() 
	{
		$postService = new PostServiceImpl();
		$data = array('title' => 'Test Title', 'content' => 'Test Content ', 'createdTime' => time());
		$postService->addPost($data);
		$this->assertNotNull($postService->getPost(1));
	}

}