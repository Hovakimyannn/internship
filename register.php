<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

$controller = new UserController();
$controller->addUser(new User($_POST['username'], $_POST['email'], $_POST['password']));