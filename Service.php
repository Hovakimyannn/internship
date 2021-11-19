<?php
session_start();
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class Service
{
    private JsonDB $jsonDB;
    private User $user;

    public function __construct()
    {
        $this->jsonDB = new JsonDB();
    }

    public function addUser()
    {
        $this->user = new User($_POST['username'], $_POST['email'], $_POST['password']);
        if ($this->user->uniqueUser() && $this->user->validation()) {
            $this->jsonDB->write($this->user);
            $_SESSION['user'] = $this->jsonDB->read();
        } else {
            header('Location:signUp.php');
            exit;
        }
        header('Location:mainPage.php');
    }
}
$service = new Service();
$service->addUser();

