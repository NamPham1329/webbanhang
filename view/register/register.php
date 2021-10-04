<?php
require("index.php");
require_once("../../database/db_helper.php");
class Register extends DB{
    protected $username;
    protected $pass;
    protected $confirm_pwd;
    function __construct($username, $pass, $confirm)
    {
        $this->username = $username;
        $this->pass = $pass;
        $this->confirm_pwd = $confirm;
    }
    function register()
    {
        if(!empty($this->username) && !empty($this->pass) && $this->pass === $this->confirm_pwd)
        {
            $password = md5($this->pass);
            $sql = "INSERT INTO account(id, username, password, role_id) values(null, '$this->username', '$password', '2')";
            return $this->execute($sql);
        }
    }
}
if(!empty($_POST['register'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm_pwd'];
    $register = new Register($user, $pass, $confirm);
    return $register->register();
}
?>