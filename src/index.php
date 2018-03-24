<?php 

require '../vendor/autoload.php';

use Task\Connections\ConnectionFactory;
use Task\Connections\MysqlConnection;
use Task\Contracts\BaseModel;
use Task\Models\Job;

$job = new Job(new ConnectionFactory);
// var_dump($job->create(['name' => 'ayman' , 'password' => 'ayman' , 'email' => "alaa"])->withAction(['job_id'=> $job->id, 'time' => date('H')]));
var_dump($job->update(['name' => 'ayman' , 'password' => 'ayman' , 'email' => "alaa"] , 12)->withAction(['job_id' => $job->id , 'time' => date('H')]));
// var_dump($job->findById(29));
// var_dump(md5(16));