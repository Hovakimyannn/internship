<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

$service = new Service();
$service->addUser(new User($_POST['username'], $_POST['email'], $_POST['password']));