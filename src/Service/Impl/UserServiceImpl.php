<?php
require_once APP_PATH . 'src/Dao/DaoFactory.php';
require_once APP_PATH . 'src/Service/BaseService.php';
require_once APP_PATH . 'src/Service/UserService.php';

class UserServiceImpl extends BaseService implements UserService {

	public function __construct() {
		$this->dao = DaoFactory::CreateDao('User');
	}

	public function addUser(array $data) {
		if(empty($data) || !is_array($data)) {
			return false;
		}
		return $this->getDao()->addUser($data);
	}

	public function login($data) {
		$user = $this->getDao()->findUserByUserName($data['username']);
		if(empty($user)) {
			return false;
		}

		if($user['password'] == md5($data['password'])) {
			$_SESSION['user'] = serialize($user);
			return true;
		}
		return false;
	}

	public function getUser($id) {
		return $this->getDao()->findUser($id);
	}

	public function getUserByUserName($userName) {
		return $this->getDao()->findUserByUserName($userName);
	}

	public function deleteUser($id) {
		if(!$this->userIsAdmin()) {
			return false;
		}
		return $this->getDao()->deleteUser($id);
	}

	public function isAdmin() {
		return $this->userIsAdmin();
	}
}