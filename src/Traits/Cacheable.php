<?php 
namespace Task\Traits;


trait Cacheable
{
     /**
     * Cache the model data into files
     * @param int $id , array $data
     */
   	public function cache(int $id , array $data)
   	{
         // set connection = null => we can't serialize pdo connection
         $connection = $this->$connection;
         $this->connection = null;
   		$filename = md5($id);
   		$this->checkPath();
   		file_put_contents('cache/' . $this->table . '/' . $filename . '.cache', serialize($data));
         $this->connection = $connection;
   	}

      /**
      * check path for table name 
      * create dir if not found
      */
   	public function checkPath()
   	{
   		if (!file_exists("cache/".$this->table)) {
   			mkdir("cache/".$this->table);
   		}
   	}

      /**
      * @param int $id
      * @return unserialize from cache
      */
   	public function getCache(int $id)
   	{
   		$filename = md5($id);
   		if (file_exists('cache/' . $this->table . '/' . $filename . '.cache')) 
   		{
   			return unserialize(file_get_contents('cache/' . $this->table . '/' . $filename . '.cache'));
   		}
   		return false;
   	}
}