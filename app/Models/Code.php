<?php

namespace App\Models;

use Core\Services\Model;
use PDO;

class Code extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function add_new_code($user_id)
	{
		$this->pdo->query("INSERT INTO code (user_id, html, css, js) VALUES ($user_id, '', '', '')");
	}

	public function get_code($user_id) {
		$response = $this->pdo->query("SELECT html, css, js FROM code WHERE user_id = '$user_id'");
		return $response->fetch(PDO::FETCH_ASSOC);
	}

	public function post_code($html, $css, $js, $user_id) {
		$html = PDO::quote($html);
		$css = PDO::quote($css);
		$js = PDO::quote($js);
		$query = "UPDATE code SET html = $html, css = $css, js = $js WHERE user_id = '$user_id'";
		return $response = $this->pdo->query($query);
	}

	public function delete_code($user_id) {
		$query = "UPDATE code SET html = '', css = '', js = '' WHERE user_id = '$user_id'";
		return $response = $this->pdo->query($query);
	}
}
