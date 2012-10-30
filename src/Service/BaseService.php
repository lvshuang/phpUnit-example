<?php
abstract class BaseService {

	protected $dao;

	protected function getDao() {
		return $this->dao;
	}

	protected function userIsAdmin() {
		$user = $this->getCurrentUser();

		if(!empty($user)) {
			return (bool)$user['isAdmin'];
		}
		return false;
	}

	protected function getCurrentUser() {
		if(isset($_SESSION['user'])){
			return unserialize($_SESSION['user']);
		}
		return null;
	}

}