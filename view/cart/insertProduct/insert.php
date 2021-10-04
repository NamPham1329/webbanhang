<?php
session_start();
require_once("../../database/db_helper.php");
class Cart extends DB{
    protected $idCart;
    function __construct($id)
    {
        $this->idCart = $id;
    }
    function checkCart()
    {
        $sql = "SELECT id FROM cart WHERE customer_id = '$this->idCart'";
        return $this->executeResult($sql);
    }
}
class newCart extends DB{
    protected $idUser;
    function __construct($id)
    {
        $this->idUser = $id;
    }
    function insertCart()
    {
        $sql = "INSERT INTO cart(id, customer_id, order_status) values(null, '$this->idUser', 'processing', null)";
        $this->execute($sql);
    }
}

class getPrd extends DB{
    protected $idPrd;
    function __construct($id)
    {
        $this->idPrd = $id;
    }
    function getProduct()
    {
        $sql = "SELECT product_name, product_img, price FROM product WHERE id = '$this->idPrd'";
        return $this->executeResult($sql);
    }
}

class addOrder extends DB{
    protected $idCart;
    protected $product_name;
    protected $price;
    protected $image;
    protected $quantity;
    protected $total;
    function __construct($cart, $product, $price, $image, $quantity, $total)
    {
        $this->idCart = $cart;
        $this->product_name = $product;
        $this->price = $price;
        $this->image = $image;
        $this->quantity = $quantity;
        $this->total = $total;
    }
    function saveCartDetail()
    {
        $sql = "INSERT INTO orderdetail(id, order_id, order_total, product_name, product_img, product_price, quantity) values(null,'$this->idCart', '$this->total', '$this->product_name', '$this->image', '$this->price', '$this->quantity')";
        $this->execute($sql);
    }
}

if(!empty($_SESSION['users']) & (!empty($_POST['addToCart'])))
{
    $idUser = $_SESSION['users']['id'];
    $cart = new Cart($idUser);
    $data1 = $cart->checkCart();
    
    if(empty($data1))
    {
        $cart = new newCart($idUser);
        $cart->insertCart();
    }
    $prdDetail = new getPrd($_POST['addToCart']);
    $prd = $prdDetail->getProduct();
    foreach($prd as $value)
    {
        $prd_name = $value['product_name'];
        $price = $value['price'];
        $prd_image = $value['product_img'];
    }
    if(!empty($data1))
    {
        $order = $data1[0]['id'];
        $quantity = '1';
        $total = $price* $quantity;
        $cartDetail = new addOrder($order, $prd_name, $price, $prd_image, $quantity, $total);
        $cartDetail->saveCartDetail();
}
    }
    
?>