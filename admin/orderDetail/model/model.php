<?php
require_once("../../../database/db_helper.php");
class detailOrder extends DB{
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function get_detail()
    {
        $sql = "SELECT * FROM orderdetail WHERE order_id='$this->id'";
        return $this->executeResult($sql);
    }
}
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $orderDetail = new detailOrder($id);
    $data = $orderDetail->get_detail();
}
?>