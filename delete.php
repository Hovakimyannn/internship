<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});
$controller = new UserController();
$controller->deleteById($_POST['id']);