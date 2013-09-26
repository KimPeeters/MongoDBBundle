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
    private $port;
	private $database;

	private $connection;

	public function __construct($host,$port,$database)
	{
		$this->host = $host;
        $this->port = $port;
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
        $connectionString = 'mongodb://'.$this->host;
        if ( $this->port )
            $connectionString .= ':'.$this->port;

		$connection = new \MongoClient($connectionString);
		if ( $connection )
		{
			$this->connection = $connection->{$this->database};
			return true;
		}
		return false;
	}
}