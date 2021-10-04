<?php
require_once("../../database/db_helper.php");
class productDetail extends DB{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function getProduct()
    {
        $sql = "SELECT * FROM product WHERE id = '$this->id'";
        return $this->executeResult($sql);
    }
}
if(!empty($_GET['id']))
{
    $idProduct = $_GET['id'];
    $product = new productDetail($idProduct);
    $data = $product->getProduct();
}
