<?php
/**
 * User: kpeeters
 * Date: 24-7-13
 * Time: 15:13
  */

namespace Qwad\Bundle\MongoDBBundle;

use Qwad\Bundle\MongoDBBundle\MongoConnection;
use Qwad\Bundle\MongoDBBundle\MongoCollection;

class MongoManager
{
	private $connection;

	public function __construct(MongoConnection $connection)
	{
		$this->connection = $connection;
	}

	public function getCollection($name)
	{
		return new MongoCollection($this->connection, $name);
	}
}