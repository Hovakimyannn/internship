<?php
session_start();

unset($_SESSION['incorrect_password']);

$data = file_get_contents("usersInfo.json");
$data = json_decode($data, true);

foreach ($data as $theuser) {
    if ($theuser['username'] == $_POST['username']) {
        if ($theuser['password'] == $_POST['password']) {
            $_SESSION['user'] = json_encode($theuser);
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