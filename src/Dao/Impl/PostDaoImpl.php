<?php
require_once APP_PATH . 'src/Dao/BaseDao.php';
require_once APP_PATH . 'src/Dao/PostDao.php';

class PostDaoImpl extends BaseDao implements PostDao {

	protected $table = 'post';

	public function addPost($data) {
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

	public function findPost($id) {
		$sql = 'SELECT * FROM '. $this->getTable() . ' WHERE `id`=' . $id;
		$this->db->query($sql);
		return $this->db->fetch();
	}

	public function deletePost($id) {
		$sql = 'DELETE FROM ' . $this->getTable() . ' WHERE `id`=' . $id;
		return $this->db->query($sql);
	}

}