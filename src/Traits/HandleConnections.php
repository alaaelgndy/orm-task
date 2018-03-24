<?php 
namespace Task\Traits;

use Task\Contracts\ConnectionInterface;
use Task\Connections\ConnectionFactory;
use Task\Connections\MysqlConnection;
use \Exception;

/**
* trait HandleConnections responsablity is handle database connection
*/
trait HandleConnections
{
    /**
    * @param string $connection_name , ConnectionFactory $connection_factory
    * @return connection instanse from factory class
    */
    public function getConnection($connection_name , ConnectionFactory $connection_factory)
    {	
    	$connection = $this->checkConnection($connection_name);

    	return $connection_factory->getInstance($connection);
    }

    /**
     * @param String $connection_name 
     * @return obj from this connection name using availableConnections() function
     */
    public function checkConnection(string $connection_name)
    {
    	$connections = $this->availableConnections();
    	if (! isset($connections[$connection_name])) {
    		throw new Exception('this connection not found !');
    	}
    	return $connections[$connection_name];
    }

    /**
     * we must put of all connection in this function
     */
    public function availableConnections()
    {
    	return [
    		'mysql' => new MysqlConnection()
    	];
    }
}