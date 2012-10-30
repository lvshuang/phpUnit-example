<?php

interface UserService {

	public function getUserByUserName($userName);

	public function login($data);

}