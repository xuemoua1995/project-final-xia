<?php include('../config/connection.php'); ?>
<?php
if(update("tb_order","tb_state='0'","tb_state='1'")){
    $state=1;
}else{
    $state=0;
}
?>