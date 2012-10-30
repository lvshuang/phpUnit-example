<?php
final class Mysql {

	private $connection;

	private $error;

	private $handle;

	public function __construct($hostname, $username, $password, $database) {
		$dsn = 'mysql:dbname=' . $database .';host=' . $hostname . ';charset=utf8';

		if(!$this->connection = new pdo($dsn, $username, $password)) {
			throw new Exception('Error: Could not make a database connection using ' . $username . '@' . $hostname, 1);
			
		  }
  	}

  	public function query($sql, $data = array()) {
  		$this->handle = $this->connection->prepare($sql);
  		if(!$result = $this->handle->execute($data)) {
  			$this->error = $this->handle->errorInfo();
  			return false;
  		}
  		return $result;
  	}

  	public function getError() {
  		return $this->error;
  	}

  	public function fetchAll() {
  		return $this->handle->fetchAll();
  	}

  	public function fetch() {
  		return $this->handle->fetch();
  	}
		
}
