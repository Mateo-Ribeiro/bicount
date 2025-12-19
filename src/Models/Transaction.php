<?php
namespace Models;

use Exception;
use PDO;


class Transaction extends Database
{
	private $id;
	private $amount;
	private $user_id;

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

	public function getAmount()
	{
		return $this->amount;
	}

	public function setAmount()
	{
		if (empty($value)) throw new Exception('amount is required');
		if (preg_match('/^[0-9]+$/', $value)) {
			$this->amount = htmlspecialchars($value);
		} else {
			throw new Exception('amount numbers');
		}
	}

	public function register()
	{
		$queryExecute = $this->db->prepare("INSERT INTO `TRANSACTION`(`amount`,`user_id`) 
			VALUES (:amount,:user_id)");

		$queryExecute->bindValue(':amount', $this->amount, PDO::PARAM_STR);
		$queryExecute->bindValue(':user_id', $this->user_id, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
