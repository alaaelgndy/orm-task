<?php 
namespace Task\Traits;

use Task\Connections\ConnectionFactory;

trait HasRelation
{
	/**
	 * @param string $class_path , array $data 
	 */
   	public function insertInRelationTable($class_path,array $data)
   	{
   		$class = new $class_path(new ConnectionFactory());
   		$class->create($data);
   		return $class;
   	}
}
