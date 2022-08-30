<?php
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");

$bc = $_GET['bc'];
$total = 0;
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>ສະແກນບາໂຄດຂາຍສິນຄ້າ</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <h6>ລະຫັດບາໂຄດ</h6>
                <form id="form-bc">
                  <input type="text" name="bc" id="bc" style="border-style: 2px solid black;" class="form-control">
                  <input type="submit" style="display: none" value="save">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped" id="sortable-table">
                <thead>
                  <tr>
                    <th class="text-center">
                      <i class="fas fa-th"></i>
                    </th>
                    <th>ລະຫັດ</th>
                    <th>ສິນຄ້າ</th>
                    <th>ລາຄາ</th>
                    <th>ຈຳນວນ</th>
                    <th>ຫົວໜ່ວຍ</th>
                    <th>ລາຄາລວມ</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tb-showCart">
                  <?php
            
                  $i;
                  $qry = qry("select * from tb_order where tb_state='1'");
                  while ($re = $qry->fetch_assoc()) {
                  
                    // $new_date = date("d/m/Y H:i:s", strtotime($re["updated_date"]));
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
                      <td><?=$re['qty']?> <input type="hidden" class="iquantity" onchange="subTotal()" style="width:40px" value="<?=$re['qty']?>"/></td>
                      <td>
                        <div><?=$pro['unit_name']?></div>
                      </td>
                     
                      <td>
                        <div class="itotal"></div> ກີບ
                        
                      </td>
                      <td>
                        <a href='#' onclick="del('<?=$re['id']?>')" style='font-size:15px; color:red'><i class='far fa-trash-alt'></i> ລຶບ</a>
                      </td>
                    </tr>
                   
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <div style="width:100%;">
              <h4 style="float:right;color:black;" id="total">ກີບ</h4>
              </div>
            </div>
            
          </div>
          <a href="invoice.php" onclick="update('<?=$re['id']?>')" class="btn btn-primary" style="font-size:15px"><i class="fas fa-edit"></i> ອອກໃບບິນ</a>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  var del = id=>{
    let data_s = "id=" + id;
    $.post("save-cart/del.php",data_s,function(res){
      if (res.state == 1) {
        $("#tb-showCart").load("save-cart/load-cart.php");
        $("#form-bc #bc").val('');
      } else {
        alert('ບໍ່ສາມາດດຳເນີນການໄດ້')
      }
    },'JSON')
  }
  $("#form-bc").on("submit", function(ev) {
    ev.preventDefault();
    debugger
    let data_s = $(this).serialize();
    $("#form-bc").LoadingOverlay('show');
    $.post("save-cart/save.php", data_s, function(res) {
      $("#form-bc").LoadingOverlay('hide')
      console.log(res)
      debugger
      if (res.state == 1) {
        $("#tb-showCart").load("save-cart/load-cart.php");
        $("#form-bc #bc").val('');
      } else {
        alert('ບໍ່ສາມາດດຳເນີນການໄດ້')
      }
    }, 'JSON')
  })
</script>

<script>
  var update = id=>{
    let data = "id=" + id;
    $.post("save-cart/updateqty.php",data,function(res){
      if (res.state == 1) {
        $("#tb-showCart").load("save-cart/load-cart.php");
      } else {
       // alert('ບໍ່ສາມາດດຳເນີນການໄດ້')
      }
    },'JSON')
  }

</script>

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
<?php
include "include/footer.php";
?>