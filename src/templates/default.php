<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<?php if (!empty($css)) { ?>
		<link rel="stylesheet" href="assets/css/<?= $css ?>.css">
	<?php } ?>
	<title>Document<?= isset($title) ? ' - ' . $title : '' ?></title>
</head>

<body>
	<div id="nav">
		<div>
			<?php if (isset($_COOKIE['name']) && isset($_COOKIE['email']) && isset($_COOKIE['password'])) { ?>
			<a href="/home"><img src="assets/images/bicount_logo.jpg" alt="home"></a>
			<?php } ?>
		</div>
		<div id="connect">
			<button id="btnconnect" onclick="window.location.href = '/';">Connexion</button>
		</div>
	</div>
	<main>
		<?= $content ?>
	</main>
</body>

</html>