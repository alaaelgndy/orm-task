<?php 
namespace Task\Connections;

use Task\Contracts\ConnectionInterface;

/**
* @auther alaaelgndy
* this class will return instance from connection
*/
class ConnectionFactory
{
    public function getInstance(ConnectionInterface $connection)
    {
    	return $connection->connection();
    }
}
