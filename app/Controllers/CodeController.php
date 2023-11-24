<?php

namespace App\Controllers;

use App\Models\Code;
use Core\Helper;

class CodeController
{
	/**
	 * Input data
	 *
	 * @var array
	 */
	private $data = [];

	public function __construct()
	{
		$this->code = new Code();
		$this->data = Helper::get_data();
	}

	public function index()
	{
		if ($this->data["action"] === "get") {
			$this->get_code();
		}

		if ($this->data["action"] === "post") {
			$this->post_code();
		}

		if ($this->data["action"] === "delete") {
			$this->delete_code();
		}
	}

	private function get_code()
	{
		$access = Helper::validate_JWT($this->data["token"]);

		if ($access["message"] === "Success") {
			$response = $this->code->get_code($access["data"]->user_id);

			if ($response) {
				echo json_encode($response);
			} else {
				echo json_encode([
					"message" => "denied"
				]);
			}
		}
	}

	private function post_code()
	{
		$access = Helper::validate_JWT($this->data["token"]);

		if ($access["message"] === "Success") {
			$response = $this->code->post_code(
				$this->data["html"],
				$this->data["css"],
				$this->data["js"],
				$access["data"]->user_id
			);
			echo json_encode(["message" => "Success"]);
		} else {
			echo json_encode($access);
		}
	}

	private function delete_code()
	{
		$access = Helper::validate_JWT($this->data["token"]);

		if ($access["message"] === "Success") {
			$response = $this->code->delete_code($access["data"]->user_id);
			echo json_encode(["message" => "Success"]);
		} else {
			echo json_encode($access);
		}
	}
}
