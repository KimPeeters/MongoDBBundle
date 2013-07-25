<?php
/**
 * User: kpeeters
 * Date: 24-7-13
 * Time: 15:13
  */

namespace Qwad\Bundle\MongoDBBundle;

use Qwad\Bundle\MongoDBBundle\MongoConnection;

class MongoCursor
{
	private $cursor;

	public function __construct(\MongoCursor $cursor)
	{
		$this->cursor = $cursor;
	}

	public function __call($name,$args)
	{
		return call_user_func_array($this->cursor->$name,$args);
	}
}