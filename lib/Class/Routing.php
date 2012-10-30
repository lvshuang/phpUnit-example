<?php

final class Routing {

	public static function routingDispatch() {

		$controller = empty($_GET['c']) ? 'index' : $_GET['c'];
		$action = empty($_GET['a']) ? 'index' : $_GET['a'];
		$controllerClass = $controller . 'Controller';
		$actionName = $action . 'Action';

		if(file_exists(APP_PATH . 'src/Controller/' . $controller . 'Controller.php')) {
			require_once APP_PATH . 'src/Controller/' . $controller . 'Controller.php';
			$controller = new $controllerClass;
			if(method_exists($controller, $actionName)) {
				call_user_func_array(array($controller, $actionName), array());
			}else{
				exit($action . ' Action is not exists!');
			}
		}else{
			exit($controller . ' Controller is not exists!');
		}
	}

}