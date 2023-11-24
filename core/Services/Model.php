<?php

namespace Core\Services;

use DB\Connect;

class Model extends Connect
{
	/**
	 * Database connection
	 *
	 * @var bool/object
	 */
	protected $pdo;

	public function __construct()
	{
		parent::__construct();
		$this->pdo = new Connect();
	}
}
