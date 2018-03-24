<?php 
namespace Task\Contracts;

interface ModelInterface {

	public function create(array $data);

	public function update(array $data , int $id);

	public function findById(int $id);
}
