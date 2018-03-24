<?php  
namespace Task\Models;

use Task\Contracts\BaseModel;

class JobAction extends BaseModel
{
	protected $table = "actions";

	protected $fields = ["job_id", "time"];

}
