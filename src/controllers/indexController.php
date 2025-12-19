<?php

use Models\User;

use Models\Budget;

session_start();

$user = new User;
$user->setName($_COOKIE['name']);
$user->setEmail($_COOKIE['email']);
$user->setPassword($_COOKIE['password']);


$error = [];

$id = $user->getUserByEmail();

$budgets = $user->getUserBudget($id[0]['id']);

if (isset($_POST['btn-create'])) {
	$newbudget = new Models\Budget;
	try {
		$newbudget->setName($_POST['name']);
	} catch (\Exception $e) {
		$error['name'] = $e->getMessage();
	}
	if (!isset($error['name'])) {
		if ($newbudget->register()) {
			$relation = new relation_budget;
			$relation->setUser_id($id[0]['id']);
			$chiant = $newbudget->getIdByName();
			$budgetId = end($chiant)['id'];
			$relation->setBudget_id($budgetId);
			$relation->register();
		}
	}
}



render('index', false, [
	'error' => $error,
	'budgets' => $budgets
]);
