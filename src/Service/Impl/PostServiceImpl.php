<?php
require_once APP_PATH . 'src/Dao/DaoFactory.php';
require_once APP_PATH . 'src/Service/BaseService.php';
require_once APP_PATH . 'src/Service/PostService.php';

class PostServiceImpl extends BaseService implements PostService {

	public function __construct() {
		$this->dao = DaoFactory::CreateDao('Post');
	}

	public function addPost(array $data) {
		if(empty($data) || !is_array($data)) {
			return false;
		}
		return $this->getDao()->addPost($data);
	}

	public function getPost($id) {
		return $this->getDao()->findPost($id);		
	}

	public function deletePost($id) {
		if(!$this->userIsAdmin()) {
			return false;
		}
		return $this->getDao()->deletePost($id);
	}

}