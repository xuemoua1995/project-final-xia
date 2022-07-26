<?php include('../config/connection.php'); ?>
<?php
$invoiceNumber = rand(100,100000);
if(update("tb_order","tb_state='$invoiceNumber'","tb_state='1'")){
    $state=1;
}else{
    $state=$invoiceNumber;
}
?>