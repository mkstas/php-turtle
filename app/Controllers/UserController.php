<?php

namespace App\Controllers;

use Core\Helper;

class UserController
{
	public function __construct()
	{
		$this->data = Helper::get_data();
	}

	public function index()
	{
		$this->get_user_data();
	}

	private function get_user_data()
	{
		$access = Helper::validate_JWT($this->data["token"]);

		if ($access["message"] === "Success") {
			echo json_encode([
				"message" => "Success",
				"user_id" => $access["data"]->user_id,
				"username" => $access["data"]->nickname,
				"email" => $access["data"]->email
			]);
		} else {
			echo json_encode($access);
		}
	}
}
