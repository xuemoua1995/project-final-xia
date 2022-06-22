<?php include('../config/connection.php'); ?>
<?php
$qry = qry("select * from tb_order where tb_state='1'");
while ($re = $qry->fetch_assoc()) {
$pro = assoc("select * from tb_ProductItem where id = '$re[product_id]'");
?>
<tr>
    <td>
    <div class="sort-handler">
        <i class="fas fa-th"></i>
    </div>
    </td>
    <td><?=$pro['barcode']?></td>
    <td>
    <div><?=$pro['name']?></div>
    </td>
    <td><?=$re['qty']?></td>
    <td><?=$re['price']?> ກີບ</td>
    <td>
    <div><?=$re['updated_date']?></div>
    </td>
    <td>
    <a href='#' onclick="del('<?=$re['id']?>')" style='font-size:15px; color:red'><i class='far fa-trash-alt'></i> ລຶບ</a>
    </td>
</tr>
<?php
}
?>