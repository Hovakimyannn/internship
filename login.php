<?php
session_start();
spl_autoload_register(function ($className) {
    require $className . '.php';
});

$service = new UserController();
$users = $service->getAll();

foreach ($users as $user) {
    if ($user['username'] == $_POST['username']) {
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            unset($_SESSION['incorrect_password']);
            header("Location: mainPage.php");
            exit();
        } else {
            $_SESSION['incorrect_password'] = "password is incorrect";
        }
    }
}

header("Location: signIn.php");
exit();