<?php

$error = [];

if (isset($_POST['register'])) {
    $user = new Models\User();

    try {
        $user->setName($_POST['name']);
    } catch (\Exception $e) {
        $error['name'] = $e->getMessage();
    }
    try {
        $user->setEmail($_POST['email']);
    } catch (\Exception $e) {
        $error['email'] = $e->getMessage();
    }
    try {
        $user->setPassword($_POST['password']);
    } catch (\Exception $e) {
        $error['password'] = $e->getMessage();
    }

    if (empty($error)) {
        if ($user->register()) {
            setcookie('name', $user->getName(), time() + 3600, '/');
            setcookie('email', $user->getEmail(), time() + 3600, '/');
            setcookie('password', $user->getPassword(), time() + 3600, '/');
            redirectTo('/');
            exit;
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
} elseif (isset($_POST['login'])) {
    $user = new Models\User();

    try {
        $user->setEmail($_POST['login_email']);
    } catch (\Exception $e) {
        $error['login_email'] = $e->getMessage();
    }
    $verif = $user->getUserByEmail();

    if (count($verif) == 0) {
        $error['login_email'] = 'Email not found';
    }
    try {
        $user->setPassword($_POST['login_password']);
    } catch (\Exception $e) {
        $error['login_password'] = $e->getMessage();
    }
    $verif2 = $user->getPasswordByEmail();

    if (count($verif2) == 0) {
        $error['login_password'] = 'Password incorrect';
    }
    if (empty($error)) {
        $name = $user->getNameByEmail();
        $user->setName($name[0]['name']);
        setcookie('name', $user->getName(), time() + 3600, '/');
        setcookie('email', $user->getEmail(), time() + 3600, '/');
        setcookie('password', $user->getPassword(), time() + 3600, '/');
        redirectTo('/');
        exit;
    } else {
        $error['global'] = 'Echec de la connexion';
    }
}

render('connexion', false, [
    'error' => $error,
    'user' => isset($user) ? $user : ''
]);
