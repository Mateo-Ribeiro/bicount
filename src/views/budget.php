<?php
ob_start();
foreach ($all_transactions as $transaction) {
?><div><?= $transaction["amount"] ?></div><?php
										};

										render('default', true, [
											'title' => 'Acceuil',
											'css' => 'index',
											'content' => ob_get_clean(),
										]);
