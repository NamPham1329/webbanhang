<?php
require_once("../../../database/db_helper.php");
session_start();

class Cart extends DB{
    protected $idUser;
    function __construct($id)
    {
        $this->idUser = $id;
    }
    function getCart()
    {
        $sql = "SELECT id FROM cart where customer_id = '$this->idUser'";
        return $this->executeResult($sql);
    }
}

class listOrder extends DB{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function getList()
    {
        $sql = "SELECT * FROM orderdetail WHERE order_id = '$this->id'";
        return $this->executeResult($sql);
    }
}

class total extends DB{
    protected $orderId;
    function __construct($id)
    {
        $this->orderId = $id;
    }
    function getTotal()
    {
        $sql = "SELECT product_price, quantity FROM orderdetail WHERE order_id = '$this->orderId'";
        return $this->executeResult($sql);
    }

}

if(!empty($_SESSION['users']))
{
    $idAccount = $_SESSION['users']['id'];
    $idUser = new Cart($idAccount);
    $id = $idUser->getCart();
    if(!empty($id)){
        $idCart = $id[0]['id'];
        $idOrder = new listOrder($idCart);
        $data = $idOrder->getList();
        $total = new total($id[0]['id']);
        $totalValue = $total->getTotal();
        $result = 0;
        if(!empty($totalValue)){
            for($i=0; $i<count($totalValue); $i++)
            {
                $result += (int)($totalValue[$i]['product_price']*$totalValue[$i]['quantity']);
            }
        }
        
    }
    
    
}
?>