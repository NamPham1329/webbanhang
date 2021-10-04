<?php
require_once("../../../database/db_helper.php");

class role extends DB{
    function getAll()
    {
        $sql = "SELECT * FROM role";
        return $this->executeResult($sql);
    }
    function getRolebyID($id) 
    {
        $sql = "SELECT * FROM role WHERE id = '$id'";
        return $this->executeResult($sql);
    }
    function add($name)
    {
        $sql = "INSERT INTO role(id, role_name) values(null, '$name')";
        $this->execute($sql);
        header('Location: /webbanhang/admin/role/view/');
    }
    
    function update($id, $name)
    {
        $sql = "UPDATE role SET role_name = '$name' WHERE id='$id'";
        $this->execute($sql);
        header('Location: /webbanhang/admin/role/view');
    }
    function delete($id)
    {
        $sql = "DELETE FROM role WHERE id='$id'";
        $this->execute($sql);
        header('Location: /webbanhang/admin/role/view');
    }
}
$role = new role();
if(!empty($_POST['create']))
{
    $name = $_POST['name'];
    return $role->add($name);
}
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $roleID = $role->getRolebyID($id);
}
if(!empty($_POST['update']))
{
    $id = $_POST['roleID'];
    $name = $_POST['name'];
    return $role->update($id, $name);
}
if(!empty($_POST['delete']))
{
    $id = $_POST['delete'];
    return $role->delete($id);
}
 else {
    $listRole = $role->getAll();
}
?>