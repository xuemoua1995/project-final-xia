<?php
include("config/connection.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM tb_ProductType WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: employee.php"); 
?>