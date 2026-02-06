<?php ob_start() ?>

<body>
    <h1>Inscription</h1>
    <div id="inscription">
        <form id="register" action="" method="POST">
            <label for="name">Nom d'utilisateur</label>
            <input id="name" type="text" name="name" placeholder="Nom d'utilisateur" required>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Email" required>

            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required>

            <button name="register" type="submit">Créer un compte</button>
        </form>
    </div>
    <h1>Connexion</h1>
    <div id="connexion">
        <form id="login" action="" method="POST">
            <label for="login_email">Email</label>
            <input id="login_email" type="email" name="login_email" placeholder="Email" required>

            <label for="login_password">Mot de passe</label>
            <input id="login_password" type="password" name="login_password" placeholder="Mot de passe" required>

            <button name="login" type="submit">Se connecter</button>
        </form>
    </div>
</body>
<?php
render('default', true, [
    'title' => 'Connexion',
    'css' => 'style',
    'content' => ob_get_clean(),
    'user' => $user
]);
?>