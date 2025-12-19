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
			<a href="/"><img src="assets/images/bicount_logo.jpg" alt="home"></a>
		</div>
		<div id="connect">
			<button id="btnconnect" onclick="window.location.href = '/connexion';">Connexion</button>
		</div>
	</div>
	<main>
		<?= $content ?>
	</main>
</body>

</html>