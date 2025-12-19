<?php

namespace Models;

use Exception;
use PDO;

class User extends Database
{
	private $id;
	private $name;
	private $email;
	private $password;

	public function getName()
	{
		return $this->name;
	}

	public function setName($value)
	{
		if (empty($value)) throw new Exception('Name is required');
		if (strlen($value) < 3 || strlen($value) > 100) throw new Exception('Name must be between 3 and 100 characters');
		if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
			$this->name = htmlspecialchars($value);
		} else {
			throw new Exception('Name can only contain letters and numbers');
		}
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($value)
	{
		if (empty($value)) throw new Exception('Password is required');
		if (strlen($value) < 3 || strlen($value) > 100) throw new Exception('Password must be between 3 and 100 characters');
		$this->password = htmlspecialchars($value);
	}
	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($value)
	{
		if (empty($value)) throw new Exception('Email is required');
		if (strlen($value) > 255) throw new Exception('Email must be under 255 characters');
		if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
			$this->email = htmlspecialchars($value);
		} else {
			throw new Exception('Invalid Email');
		}
	}

	public function getNameByEmail()
	{
		$queryExecute = $this->db->prepare("SELECT name FROM `USERS` WHERE email = :email");
		$queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
		$queryExecute->execute();

		return $queryExecute->fetchAll();
	}

	public function getUserByEmail()
	{
		$queryExecute = $this->db->prepare("SELECT id FROM `USERS` WHERE email = :email");
		$queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
		$queryExecute->execute();

		return $queryExecute->fetchAll();
	}

	public function getPasswordByEmail()
	{
		$queryExecute = $this->db->prepare("SELECT password FROM `USERS` WHERE email = :email");
		$queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
		$queryExecute->execute();

		return $queryExecute->fetchAll();
	}

	public function getUserBudget($id)
	{
		$queryExecute = $this->db->prepare("SELECT * FROM `USERS` JOIN `RELATION_BUDGET`, `BUDGETS` WHERE BUDGETS.id = RELATION_BUDGET.budget_id AND RELATION_BUDGET.user_id = USERS.id AND USERS.id=:id");
		$queryExecute->bindValue(':id', $id, PDO::PARAM_STR);
		$queryExecute->execute();

		return $queryExecute->fetchAll();
	}

	public function register()
	{
		$queryExecute = $this->db->prepare("INSERT INTO `USERS`(`name`, `email`, `password`) 
        VALUES (:name, :email, :password)");

		$queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
		$queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
		$queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
