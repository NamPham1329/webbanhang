<?php
require_once("../../../database/db_helper.php");

// session_start();
// class order extends DB{
//     protected $idOrder;
//     protected $quantity;
//     function __construct($id, $quantity)
//     {
//         $this->idOrder = $id;
//         $this->quantity = $quantity;
//     }
//     function update()
//     {
//         $sql = "UPDATE orderdetail SET quantity='$this->quantity' WHERE id='$this->idOrder'";
//         $this->execute($sql);
//     }
// }

// if(!empty($_POST['update']))
// {
//     $id_order = $_POST['update'];
//     $quantity = $_POST['quantity'];
//     $order = new order($id_order, $quantity);
//     $order->update();
// }

class getOrder extends DB{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function get_order()
    {
        $sql = "SELECT * FROM orderdetail where order_id = '$this->id'";
        return $this->executeResult($sql);
    }
}

class updateOrder extends DB{
    protected $qty;
    protected $idOrder;
    function __construct($qty, $id)
    {
        $this->qty = $qty;
        $this->idOrder = $id;
    }
    function update()
    {
        $sql = "UPDATE orderdetail SET quantity = '$this->qty' WHERE id = '$this->idOrder'";
        $this->execute($sql);
    }
}
if(!empty($_POST['update']))
{
    $id_order = $_POST['update'];
    $order = new getOrder($id_order);
    $data = $order->get_order();
    for($i = 0; $i<count($data); $i++)
    {
        $qty = $_POST['quantity'][$i];
        $id_order = $data[$i]['id'];
        $order = new updateOrder($qty, $id_order);
        $order->update();
    }
}

?>