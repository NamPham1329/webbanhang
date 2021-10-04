<?php
require_once("../../../database/db_helper.php");
class account extends DB{
    function getAll()
    {
        $sql = "SELECT * FROM account";
        return $this->executeResult($sql);
    }
    function getAccountByID($id)
    {
        $sql = "SELECT * FROM account WHERE id='$id'";
        return $this->executeResult($sql);
    }
    function update($roleID, $userID)
    {
        $sql = "UPDATE account SET role_id = '$roleID' WHERE id='$userID'"; 
        $this->execute($sql);
        header('Location: /webbanhang/admin/user/view');
    }
    function delete($id)
    {
        $sql = "DELETE FROM account WHERE id = '$id'";
        $this->execute($sql);
        header('Location: /webbanhang/admin/user/view');
    }
}
$account = new account();
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $idUser = $account->getAccountByID($id);
}
if(!empty($_POST['updateUser']))
{
    $role = $_POST['role'];
    $id = $_POST['userID'];
    $account->update($role, $id);
}
if(!empty($_POST['delete']))
{
    $id = $_POST["delete"];
    $account->delete($id);
}
else {
    $listAccount = $account->getAll();
}
?>