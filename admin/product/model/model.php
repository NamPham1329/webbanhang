<?php
require_once("../../../database/db_helper.php");
class product extends DB{
    function getAll()
    {
        $sql = "SELECT * FROM product";
        return $this->executeResult($sql); 
    }
    function addProduct($name, $price, $detail, $cate_ID, $prd_img)
    {
        $path = "../../../public/upload/";
        $tmp_name = $_FILES['image']['tmp_name'];
        $prd_img = $_FILES['image']['name'];
        move_uploaded_file($tmp_name,$path.$prd_img);
        $sql = "INSERT INTO product(id, product_name, price, product_detail, category_id, product_img) values(null,'$name', '$price', '$detail', '$cate_ID', '$prd_img')";
        $this->execute($sql);
        header('Location: /webbanhang/admin/product/view/list.php'); 
    }
    function getById($id)
    {
        $sql = "SELECT * FROM product WHERE id='$id'";
        return $this->executeResult($sql);
    }
    function updateProduct($id, $prd_name, $price, $prd_detail, $categoryID, $prd_img)
    {
        $path = "../../../public/upload/";
        $tmp_name = $_FILES['image']['tmp_name'];
        $prd_img = $_FILES['image']['name'];
        move_uploaded_file($tmp_name,$path.$prd_img);
        $sql = "UPDATE product SET product_name = '$prd_name', price = '$price', product_detail = '$prd_detail', category_id = '$categoryID', product_img = '$prd_img' WHERE id = '$id'";
        $this->execute($sql); 
        header('Location: /webbanhang/admin/product/view/list.php');
    }
    function delete($id)
    {
        $sql = "DELETE FROM product WHERE id = '$id'";
        $this->execute($sql);
        header('Location: /webbanhang/admin/product/view/list.php');
    }
}
$product = new product();
if(!empty($_POST['add_prd']))
{
    $prd_name = $_POST['name'];
    $price = $_POST['price'];
    $prd_detail = $_POST['detail'];
    $categoryID = $_POST['category_id'];
    $prd_img = $_FILES['image']['name'];
    $product->addProduct($prd_name, $price, $prd_detail, $categoryID, $prd_img);
}
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $productID = $product->getById($id);
}
if(!empty($_POST['update_prd']))
{
    $id = $_POST['prdID'];
    $prd_name = $_POST['name'];
    $price = $_POST['price'];
    $prd_detail = $_POST['detail'];
    $categoryID = $_POST['category_id'];
    $prd_img = $_FILES['image']['name'];
    $product->updateProduct($id, $prd_name, $price, $prd_detail, $categoryID, $prd_img);
}
if(!empty($_POST['delete']))
{
    $id = $_POST['delete'];
    $product->delete($id);
}
else {
    $allProduct = $product->getAll();
}
?>