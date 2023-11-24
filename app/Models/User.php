<?php

namespace App\Models;

use Core\Services\Model;
use PDO;

class User extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function select($column, $value)
	{
		$response = $this->pdo->query("SELECT $column FROM users WHERE $column = '$value'");
		return $response->fetchAll(PDO::FETCH_ASSOC);
	}

	public function select_password($email)
	{
		$response = $this->pdo->query("SELECT password FROM users WHERE email = '$email'");
		return $response->fetch(PDO::FETCH_ASSOC);
	}

	public function select_user($email)
	{
		$response = $this->pdo->query("SELECT user_id, nickname, email FROM users WHERE email = '$email'");
		return $response->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($data)
	{
		$this->pdo->query("INSERT INTO users (nickname, email, password)
			VALUES ('{$data["nickname"]}', '{$data["email"]}', '{$data["password_hash"]}')");
		return $this->pdo->lastInsertId();
	}
}
