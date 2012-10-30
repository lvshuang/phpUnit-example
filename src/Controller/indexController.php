<?php
include_once APP_PATH . 'src/Service/Impl/UserServiceImpl.php';


class indexController {


	public function __construct() {
	}

	function indexAction() {
		print("Wellcome!");
	}

	function loginAction() {

		// if(!empty($_POST)){
		$_POST['username'] = 'aaaa';

			if($this->getUserService()->logIn($_POST)) {
				return true;
			}else{
				return false;
			}
		// }else{
		// 	//display login template
		// 	echo 'login template';
		// }


	}

	private function getUserService() {
		return new UserServiceImpl();
	}

}
