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

    public function addUser(User $user)
    {
        $this->user = $user;
        if ($this->user->uniqueUser() && $this->user->validation()) {
            $this->jsonDB->write($this->user);
            $_SESSION['user'] = $this->jsonDB->read();
        } else {
            header('Location:signUp.php');
            exit;
        }
        header('Location:mainPage.php');
    }

    public function deleteById(int $id)
    {
        $users = $this->jsonDB->read();
        foreach ($users as $key=>$user) {
            if ($user['userid']==$id)
            {
                unset($users[$key]);
                $this->jsonDB->update($users);
                header('location:mainPage.php');
                exit;
            }
        }
    }
}

