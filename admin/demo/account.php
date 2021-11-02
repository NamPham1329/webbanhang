<?php
require_once("./database/config.php");
require_once("interface.php");
class Account extends DB implements CRUD
{
    public function selectAll()
    {
        $sql = "SELECT * FROM account";
        return $this->executeResult($sql);
    }
    public function getDetail($id)
    {
        $sql = "SELECT * FROM account WHERE id='$id'";
        return $this->executeResult($sql);
    }
    public function update($roleID, $userID)
    {
        $sql = "UPDATE account SET role_id = '$roleID' WHERE id='$userID'"; 
        $this->execute($sql);
        header('Location: /webbanhang/admin/user/view');
    }
    public function delete($id)
    {
        $sql = "DELETE FROM account WHERE id = '$id'";
        $this->execute($sql);
        header('Location: /webbanhang/admin/user/view');
    }
}
class User
{
    function login()
    {
        
    }
    function register()
    {

    }
    function logout()
    {

    }
}
class validateData
{

}
