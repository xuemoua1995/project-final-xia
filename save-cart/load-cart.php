<?php include('../config/connection.php'); ?>
<?php
$i;
$qry = qry("select * from tb_order where tb_state='1'");
while ($re = $qry->fetch_assoc()) {
$pro = assoc("select * from tb_ProductItem where id = '$re[product_id]'");
$i++;
?>
<tr>
    <td>
    <div class="sort-handler">
        <i class="fas fa-th"></i>
    </div>
    </td>
    <td><?=$i?></td>
    <td>
    <div><?=$pro['name']?></div>
    </td>
    <td><?=number_format($re['price'])?> ກີບ <input type="hidden" class="iprice" value="<?=$re['price']?>"/></td>
    <td><?=$re['qty']?></td>
    <td>
    <div><?=$pro['unit_name']?></div>
    </td>
    <td>
    <div class="itotal"></div>ກີບ
    </td>
    <td>
    <a href='#' onclick="del('<?=$re['id']?>')" style='font-size:15px; color:red'><i class='far fa-trash-alt'></i> ລຶບ</a>
    </td>
</tr>
<?php
}
?>

<script>
  var gt = 0;
  var iprice = document.getElementsByClassName('iprice');
  var iquantity = document.getElementsByClassName('iquantity');
  var itotal = document.getElementsByClassName('itotal');
  var gtotal = document.getElementById('total');

 function subTotal() {
  gt = 0;
  for (var i = 0; i < iprice.length; i++) {
    itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
    gt = gt+(iprice[i].value)*(iquantity[i].value);
  }
  gtotal.innerText = gt;
 }
 subTotal();
</script>