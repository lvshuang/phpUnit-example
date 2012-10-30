<?php
abstract class BaseDao {

	protected $db;

	public function __construct($db) {
		$this->db = $db;
	}

	protected function getDb() {
		return $this->db;
	}

	protected function getTable() {
		return $this->table;
	}

}