<?php
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");
?>
<?php
$bc = $_GET['bc'];
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
                <h6>ບາໂຄດ</h6>
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
                    <th>ລະຫັດບາໂຄດ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາ</th>
                    <th>ວັນທີ່ເດືອນປີ</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tb-showCart">
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
                </tbody>
              </table>
              <div>
              <?php
                $query = mysqli_query($conn, "SELECT SUM(price) AS total FROM `tb_order`") or die(mysqli_error());

                $fetch = mysqli_fetch_array($query);
                ?>
              <h5 style="float:right;color:blue;">ລວມ: <?php echo number_format($fetch['total'])?> ກີບ</h5>
            </div>
            </div>
            
          </div>
          <a href="invoice.php" onclick="del('<?=$re['id']?>')" class="btn btn-primary" style="font-size:15px"><i class="fas fa-edit"></i> ອອກໃບບິນ</a>
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
    let data_s = $(this).serialize();
    $("#form-bc").LoadingOverlay('show');
    $.post("save-cart/save.php", data_s, function(res) {
      $("#form-bc").LoadingOverlay('hide')
      if (res.state == 1) {
        $("#tb-showCart").load("save-cart/load-cart.php");
        $("#form-bc #bc").val('');
      } else {
        alert('ບໍ່ສາມາດດຳເນີນການໄດ້')
      }
    }, 'JSON')
  })
</script>
<?php
include "include/footer.php";
?>