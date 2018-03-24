<?php  
namespace Task\Models;

use Task\Contracts\BaseModel;

use Task\Connections\MysqlConnection;
use Task\Models\JobAction;

class Job extends BaseModel
{
	protected $table = "users";

	protected $fields = ["id", "name", "password"];

	public function withAction(array $data)
	{
		return $this->insertInRelationTable(JobAction::class , $data);
	}

}
