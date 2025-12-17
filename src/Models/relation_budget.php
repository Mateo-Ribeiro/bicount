<?php

use Models\Database;

class relation_budget extends Database
{
	private $user_id;
	private $budget_id;

	public function getUser_id()
	{
		return $this->user_id;
	}

	public function setUser_id($value)
	{
		if (empty($value)) throw new Exception('user_id is required');
		if (preg_match('/^[0-9]+$/', $value)) {
			$this->user_id = htmlspecialchars($value);
		} else {
			throw new Exception('user_id numbers');
		}
	}

	public function getBudget_id()
	{
		return $this->budget_id;
	}

	public function setBudget_id()
	{
		if (empty($value)) throw new Exception('amount is required');
		if (preg_match('/^[0-9]+$/', $value)) {
			$this->budget_id = htmlspecialchars($value);
		} else {
			throw new Exception('amount numbers');
		}
	}

	public function register()
	{
		$queryExecute = $this->db->prepare("INSERT INTO `BUDGETS`(`user_id`,`budget_id`) 
			VALUES (:user_id,:budget_id)");

		$queryExecute->bindValue(':user_id', $this->user_id, PDO::PARAM_STR);
		$queryExecute->bindValue(':budget_id', $this->budget_id, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
