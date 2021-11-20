<?php
session_start();

unset($_SESSION['username_error']);
unset($_SESSION['password_error']);

class User extends JsonDB implements JsonSerializable
{
    protected string $username;
    protected string $email;
    protected string $password;
    public array $user;
    protected int $userid;

    public function __construct($username, $email, $password)
    {
        if (!$this->isEmpty()) {
            $users = $this->read();
            $this->userid = end($users)['userid'] + 1;
        } else {
            $this->userid = 1;
        }
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->user = [
            'userid' => $this->userid,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];
    }

    public function validation(): bool
    {
        if (strlen($this->username) < 2) {
            $_SESSION['username_error'] = 'username is short';
            return false;
        } elseif ($this->password != $_POST['secondPass']) {
            $_SESSION['password_error'] = 'wrong password';
            return false;
        }
        return true;
    }

    public function uniqueUser(): bool
    {
        unset($_SESSION['unique_email']);
        $data = $this->read();
        $result = true;
        foreach ($data as $user) {
            if ($_POST['email'] == $user['email']) {
                $result = false;
                $_SESSION['unique_email'] = 'This mail already exists';
                break;
            }
        }
        return $result;
    }

    public function jsonSerialize()
    {
        if ($this->isEmpty()) {
            return [
                $this->user,
            ];
        } else
            return $this->user;
    }
}



















