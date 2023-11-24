<?php

namespace App\Controllers;

use App\Models\User;
use Core\Helper;

class LoginController
{
	/**
	 * Input data
	 *
	 * @var array
	 */
	private $data = [];

	public function __construct()
	{
		$this->user = new User();
		$this->data = Helper::get_data();
	}

	public function index()
	{
		$db_data = $this->user->select("email", $this->data["email"]);

		if (!empty($db_data)) {
			$db_data = $this->user->select_password($this->data["email"]);

			if (password_verify($this->data["password"], $db_data["password"])) {
				$user_data = $this->user->select_user($this->data["email"]);

				$token = Helper::create_JWT($user_data);

				echo json_encode([
					"message" => "Success",
					"token" => $token
				], JSON_UNESCAPED_UNICODE);
			} else {
				echo json_encode([
					"message" => "password"
				], JSON_UNESCAPED_UNICODE);
			}
		} else {
			echo json_encode([
				"message" => "email"
			], JSON_UNESCAPED_UNICODE);
		}
	}
}
