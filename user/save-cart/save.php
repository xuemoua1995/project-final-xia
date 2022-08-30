
<?php include('../config/connection.php'); ?>
<?php

$bc = $_POST['bc'];
$info = assoc("select * from tb_ProductItem where barcode = '$bc' or id = '$bc'");
$pro_id = $info['id'];
$qty = 1;
$price = $info['sale_price'];

if(empty($info)){
	$state = 'H';
}else{

	$check = assoc("select * from tb_order where product_id = '$pro_id' and tb_state = '1'");
	$check_qty= $check['qty'];
	$check_id = $check['product_id'];
	$check_order_id = $check['id'];

	if($check > 1){
		$check_qty = $check_qty + 1;
		if(update("tb_order","qty ='$check_qty'","id='$check_order_id'")
        && update("tb_productitem","qty=qty-1","id='$pro_id'")
        ){
	    $state=1;
        }else{
	    $state=0;
        }

	}else{

		if(insert("tb_order","product_id,qty,date,price","'$pro_id','$qty',now(),'$price'")
        && update("tb_productitem","qty=qty-1","id='$pro_id'")
        ){
	    $state=1;
        }else{
	    $state=0;
        }
	}

}

echo json_encode(array('state'=>$state));
// echo json_encode(array('state'=>$check_order_id));
?>
