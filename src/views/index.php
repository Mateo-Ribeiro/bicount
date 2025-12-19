<?php

use Models\User;

ob_start() ?>


<?php $user = new User;
$user->setName($_COOKIE['name']);
$user->setEmail($_COOKIE['email']);
$user->setPassword($_COOKIE['password']);
?>


<?php foreach ($budgets as $budget) { ?>
	<div class="card">
		<?php echo $budget['id']; ?>
	</div>
<?php } ?>

<button class="btn-open" id="openPopup">Créer un nouveau bicount</button>

<div class="popup-overlay" id="popupOverlay">
	<div class="popup">
		<button class="close-x" id="closeX">&times;</button>
		<h2>Créer un bicount</h2>
		<form action="" method="POST">
			<label for="name">Nom du bicount</label>
			<input id="name" type="text" name="name" placeholder="Nom du bicount" required>
			<button name="btn-create" class="btn-create" id="closePopup">Créer</button>
		</form>
	</div>
</div>

<script>
	const openBtn = document.getElementById('openPopup');
	const closeBtn = document.getElementById('closePopup');
	const closeX = document.getElementById('closeX');
	const overlay = document.getElementById('popupOverlay');

	// Ouvrir le popup
	openBtn.addEventListener('click', () => {
		overlay.classList.add('active');
	});

	// Fermer avec le bouton
	closeBtn.addEventListener('click', () => {
		overlay.classList.remove('active');
	});

	// Fermer avec le X
	closeX.addEventListener('click', () => {
		overlay.classList.remove('active');
	});

	// Fermer en cliquant sur l'overlay (fond sombre)
	overlay.addEventListener('click', (e) => {
		if (e.target === overlay) {
			overlay.classList.remove('active');
		}
	});
</script>
<?php
render('default', true, [
	'title' => 'Acceuil',
	'css' => 'index',
	'content' => ob_get_clean(),
	'user' => $user
]);
?>