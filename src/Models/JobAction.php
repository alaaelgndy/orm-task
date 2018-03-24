<?php  
namespace Task\Models;

use Task\Contracts\BaseModel;

use Task\Connections\MysqlConnection;

class JobAction extends BaseModel
{
	protected $table = "actions";

	protected $fields = ["job_id", "time"];

}
