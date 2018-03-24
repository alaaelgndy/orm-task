<?php 

namespace Task\Contracts;


interface ConnectionInterface {
	
	public function serverName();

	public function database();

	public function userName();
	
	public function password();

	public function connection();
}
