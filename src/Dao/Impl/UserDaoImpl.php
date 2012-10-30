<?php
require_once APP_PATH . 'src/Dao/BaseDao.php';
require_once APP_PATH . 'src/Dao/UserDao.php';

class UserDaoImpl extends BaseDao implements UserDao {

	protected $table = 'user';

	public function addUser($data) {
		$cols = array();
        $placeholders = array();

        foreach ($data as $columnName => $value) {
            $cols[] = $columnName;
            $placeholders[] = '?';
        }

        $sql = 'INSERT INTO ' . $this->getTable()
               . ' (' . implode(', ', $cols) . ')'
               . ' VALUES (' . implode(', ', $placeholders) . ')';
        return $this->db->query($sql, array_values($data));

	}

	public function deleteUser($id) {
		$sql = 'DELETE FROM ' . $this->getTable() . ' WHERE `id`=' . $id;
		return $this->db->query($sql);
	}

	public function findUser($id) {
		$sql = 'SELECT * FROM '. $this->getTable() . ' WHERE `id`=' . $id;
		$result = $this->db->query($sql);
		return $this->db->fetch();
	}

	public function findUserByUserName($userName) {
		$sql = 'SELECT * FROM ' . $this->getTable() . " WHERE `username`='".$userName."'";
		$result = $this->db->query($sql);
		return $this->db->fetch();
	}
}