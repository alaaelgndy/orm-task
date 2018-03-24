<?php
namespace Task\Contracts;

use Task\Contracts\ModelInterface;
use Task\Connections\ConnectionFactory;
use Task\Traits\HandleConnections;
use Task\Traits\HandleArrays;
use Task\Traits\Cacheable;
use Task\Traits\HasRelation;

/**
* @auther alaaelgndy
* BaseModel class should implement function in ModelInterface
*/
abstract class BaseModel implements ModelInterface
{
    use HandleConnections;
    use HandleArrays;
    use Cacheable;
    use HasRelation;

    /**
     * @param string $connection_name
     * @return mysql is defualt connection
     * we can overwrite this connection name form any model
     */
    protected $connection_name = 'mysql';

    /**
    * @param $connection
    * has pdo connection
    */
    protected $connection;

    /**
    * @param $table
    * overwrite from any model with it's own table
    */
    protected $table;

    public function __construct(ConnectionFactory $connection_factory)
    {
        $this->connection = $this->getConnection($this->connection_name , $connection_factory);
    }

    /**
    * @param array $data
    * @return this obj after set $data elments 
    */
    public function create(array $data)
    {
        $data = $this->validateArrayAndSetValues($data);
        extract($this->HanldeInsertionArray($data));

        $statement = $this->connection->prepare("INSERT INTO $this->table (" . $keys . ") VALUES (" . $valuesCount . ");");
        $statement->execute($values);
        
        $this->id = $this->connection->lastInsertId();
        return $this;
    }

    /**
    * @param array $data
    * @return this obj after set $data elments 
    */
    public function update(array $data,int $id)
    {
        $data = $this->validateArrayAndSetValues($data);
        extract($this->HanldeUpdateArray($data));

        $statement = $this->connection->prepare("UPDATE $this->table SET $keys WHERE id=$id");
        $statement->execute($values);

        $this->id = $id;
        return $this;
    }


    /**
    * @param int $id
    * @return this obj after set $data elments 
    */
    public function findById(int $id)
    { 
        $fromCache = $this->getCache($id);
        if ($fromCache) {
            return $fromCache;
        }
        $statement = $this->connection->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->execute([':id' => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        if (!$result) {
            return NULL;
        }
        $data = $this->validateArrayAndSetValues($result);
        $this->cache($id , $this);
        return $this;
    }

}
