<?php
include("config/connection.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM tb_ProductItem WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: product.php"); 
?>