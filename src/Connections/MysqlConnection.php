<?php
namespace Task\Connections;

use Task\Contracts\ConnectionInterface;

/**
* @auther alaaelgndy
* MysqlConnection class should implement function in connectioninterface
* we can create more connections like (redis , mongo) implements connectioninterface
*/
class MysqlConnection implements ConnectionInterface
{
	public function serverName()
	{
		return 'localhost';
	}

	public function database()
	{
		return 'wazzaf';
	}

	public function userName()
	{
		return 'root';
	}

	public function password()
	{
		return 'root';
	}

	public function connection()
	{
		try {
            $servername = $this->servername();
            $username = $this->userName();
            $password = $this->password();
            $database = $this->database();
            $conn = new \PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
	}
}