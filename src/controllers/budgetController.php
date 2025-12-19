<?php

use Models\Budget;

$budget = new Budget();

$all_transactions = $budget->getBudgetTransaction($_POST["id"]);

render('budget', false, [
	'all_transactions' => $all_transactions
]);
