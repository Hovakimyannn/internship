<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});
$service = new UserController();
$service->deleteById($_POST['id']);