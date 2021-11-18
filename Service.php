<?php

spl_autoload_register(function ($className){
    require $className . '.php';
});

$user = new JsonDB();
$user->write(new User($_POST['username'], $_POST['email'], $_POST['password']));

header('Location:mainPage.php');