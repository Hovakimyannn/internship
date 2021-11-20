<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

$service = new UserController();
$service->addUser(new User($_POST['username'], $_POST['email'], $_POST['password']));