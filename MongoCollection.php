<?php
/**
 * User: kpeeters
 * Date: 24-7-13
 * Time: 15:13
  */

namespace Qwad\Bundle\MongoDBBundle;

use Qwad\Bundle\MongoDBBundle\MongoConnection;

class MongoCollection
{
	private $collection;

	public function __construct(MongoConnection $connection, $name)
	{
		$this->collection = $connection->getConnection()->$name;
	}

	public function findById( $id )
	{
		return $this->collection->find(array('_id'=> new \MongoId($id)));
	}

	public function __call($name,$args)
	{
		return call_user_func_array($this->collection->$name,$args);
	}
}