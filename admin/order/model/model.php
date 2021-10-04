<?php
require_once("../../../database/db_helper.php");

class order extends DB{
    function getAll()
    {
        $sql = "SELECT * FROM cart";
        return $this->executeResult($sql);
    }
    
    function delete($id)
    {
        $sql = "DELETE FROM cart WHERE id='$id'";
        $this->execute($sql);
        header('Location: /webbanhang/admin/order/view/index.php');
    }
}
$order = new order();
if(!empty($_POST["delete"]))
{
    $id = $_POST["delete"];
    $order->delete($id);
}
 else {
    $data = $order->getAll();
}
?>