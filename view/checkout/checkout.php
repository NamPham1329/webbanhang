<?php
require_once("../../database/db_helper.php");
print_r($_POST);
echo "<br>";
print_r($_GET);

class checkout extends DB{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function checkOut()
    {
        $sql = "UPDATE cart SET order_status = 'paid' WHERE id = '$this->id'";
        $this->execute($sql);
        // header('Location: /webbanhang');
    }
    function getInf()
    {
        
    }
}
if(!empty($_POST['checkout'])){
    $id = $_GET['id'];
    $checkout = new checkout($id);
    $checkout->checkOut();
}
?>