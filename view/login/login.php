<?php
require_once('index.php');
require_once('../../database/db_helper.php');


class Login extends DB
{   
    protected $username;
    protected $password;
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = md5($password);
    }
    function login()
    {
        if(!empty($this->username) && !empty($this->password))
        {   
            $sql = "SELECT * FROM account WHERE username = '$this->username' and password = '$this->password'";
            $this->executeResult($sql);
            if(!empty($this->data[0]))
            {
                $_SESSION['users'] = $this->data[0];
                if($_SESSION['users']['role_id'] === '1')
                {
                    header('Location: /webbanhang/admin/product/view/list.php');
                    die();
                } 
                header('Location: /webbanhang');
            }
        } 
    }
}
if(!empty($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $login = new Login($user, $pass);
    $login->login();
}
?>