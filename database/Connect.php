<?php

namespace DB;

use PDO;

class Connect extends PDO
{
	public function __construct()
	{
		parent::__construct("mysql:dbname=" . DB_NAME. ";host=" . DB_HOST, DB_USER, DB_PASSWORD);
	}
}
