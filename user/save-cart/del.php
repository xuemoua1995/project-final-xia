
<?php include('../config/connection.php'); ?>
<?php
$id = $_POST['id'];
$info = assoc("select * from tb_order where id = '$id'");
$qty = $info['qty'];
$pro_id = $info['product_id'];

if(del("tb_order","id='$id'")
&& update("tb_ProductItem","qty = qty + $qty","id='$pro_id'")
){
    $state=1;
}else{
    $state=0;
}
echo json_encode(array('state'=>$state));
?>