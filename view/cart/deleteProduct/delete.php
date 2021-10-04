<?php
require_once("../../../database/db_helper.php");
class deleteOrder extends DB{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function delete()
    {
        $sql = "DELETE FROM orderdetail WHERE id = '$this->id'";
        $this->execute($sql);
        header('Location: /webbanhang/view/cart/viewCart');
    }
}

class deleteAll extends DB{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function deleteAll()
    {
        $sql = "DELETE FROM orderdetail WHERE order_id = '$this->id'";
        $this->execute($sql);
        header('Location: /webbanhang/view/cart/viewCart');
    }
}
if(!empty($_POST['delete']))
{
    $idOrder = $_POST['delete'];
    $delCart = new deleteOrder($idOrder);
    $delCart->delete();
}
if(!empty($data)){
    $id_order = $data[0]['order_id'];
}

if(!empty($_POST['deleteAll']))
{
    $delAll = new deleteAll($id_order);
    $delAll->deleteAll();
}
?>