<?php

use Models\Database;

class Relation_transaction extends Database
{
	private $transaction_id;
	private $budget_id;

	public function getTransaction_id()
	{
		return $this->transaction_id;
	}

	public function setTransaction_id($value)
	{
		if (empty($value)) throw new Exception('transaction_id is required');
		if (preg_match('/^[0-9]+$/', $value)) {
			$this->transaction_id = htmlspecialchars($value);
		} else {
			throw new Exception('transaction_id numbers');
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
		$queryExecute = $this->db->prepare("INSERT INTO `BUDGETS`(`budget_id`,`transaction_id`) 
			VALUES (:budget_id,:transaction_id)");

		$queryExecute->bindValue(':transaction_id', $this->transaction_id, PDO::PARAM_STR);
		$queryExecute->bindValue(':budget_id', $this->budget_id, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
