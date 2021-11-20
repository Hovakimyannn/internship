<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});
$service =  new Service();
$service->deleteById($_POST['id']);