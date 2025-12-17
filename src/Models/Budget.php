<?php

use Models\Database;

class Budget extends Database
{
	private $id;
	private $name;

	public function getName()
	{
		return $this->name;
	}

	public function setName($value)
	{
		if (empty($value)) throw new Exception('Username is required');
		if (strlen($value) < 3 || strlen($value) > 100) throw new Exception('Name must be between 3 and 100 characters');
		if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
			$this->name = htmlspecialchars($value);
		} else {
			throw new Exception('Username can only contain letters and numbers');
		}
	}

	public function register()
	{
		$queryExecute = $this->db->prepare("INSERT INTO `BUDGETS`(`name`) 
			VALUES (:name)");

		$queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
