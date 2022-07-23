
<?php include('../config/connection.php'); ?>
<?php

$bc = $_POST['bc'];
$info = assoc("select * from tb_ProductItem where barcode = '$bc'");
$pro_id = $info['id'];

$qty = 1;
$price = $info['sale_price'];

if(insert("tb_order","product_id,qty,date,price","'$pro_id','$qty',now(),'$price'")
&& update("tb_productitem","qty=qty-1","id='$pro_id'")
){
	$state=1;
}else{
	$state=0;
}
echo json_encode(array('state'=>$state));
?>
