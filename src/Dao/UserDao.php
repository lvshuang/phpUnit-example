<?php
interface UserDao {

	public function deleteUser($id);

	public function findUser($id);

	public function findUserByUserName($userName);

}