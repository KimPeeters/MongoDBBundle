<?php
/**
 * User: kpeeters
 * Date: 24-7-13
 * Time: 15:13
  */

namespace Qwad\Bundle\MongoDBBundle;

class MongoConnection
{
	private $host;
	private $database;

	private $connection;

	public function __construct($host,$database)
	{
		$this->host = $host;
		$this->database = $database;
	}

	public function getConnection()
	{
		if ( !$this->connection )
			$this->connect();

		return $this->connection;
	}

	private function connect()
	{
		$connection = new \MongoClient($this->host);
		if ( $connection )
		{
			$this->connection = $connection->{$this->database};
			return true;
		}
		return false;
	}
}