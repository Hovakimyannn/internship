<?php
session_start();
spl_autoload_register(function ($className) {
    require $className . '.php';
});
unset($_SESSION['incorrect_password']);

$jsonDB = new JsonDB();
var_dump($jsonDB);
$users = $jsonDB->read();

foreach ($users as $user) {
    if ($user['username'] == $_POST['username']) {
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $jsonDB->read();
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