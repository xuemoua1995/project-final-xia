<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");

?>
  <!-- Main Content -->
  <div class="main-content">
     <section class="section">
          <div class="section-body">
               <div class="invoice">
                    <div class="invoice-print">
                         <div class="row">
                              <div class="col-lg-12">
                                   <div class="invoice-title">
                                        <h2>ໃບບິນການາສັ່ງຊື້ສິນຄ້າ</h2>
                                        <br>
                                        <?php
                                             $dt = new DateTime();
                                              echo $dt->format('ວັນທີ່ສັ່ງຊື້: d-m-y H:i');
                                             ?>
                                   </div>
                              </div>
                         </div>
                         <div class="row mt-4">
                              <div class="col-md-12">
                                   <div class="section-title">ສັງລວມການາສັ່ງຊື້ສິນຄ້າ</div>
                                   <p class="section-lead">ລາຍການທັງໝົດຢູ່ທີ່ນີ້ບໍ່ສາມາດລຶບໄດ້.</p>
                                   <div class="table-responsive">
                                   <table class="table table-striped table-hover table-md">
                                        <tr>
                                             <th data-width="40">#</th>
                                             <th>ລາຍການ</th>
                                             <th class="text-center">ລາຄາ</th>
                                             <th class="text-center">ຈຳນວນ</th>
                                             <th class="text-right">ລາຄາລວມ</th>
                                        </tr>
                                        <?php
                                        $i=1;
                                        $qry = qry("select * from tb_import where tb_state='1'");
                                        while ($re = $qry->fetch_assoc()) {
                                             // $pro = assoc("select * from tb_ProductItem where id = '$re[product_id]'");
                                        ?>
                                        <tr>
                                             <th data-width="40"><?=$i?></th>
                                             <th><?=$re['name']?></th>
                                             <th class="text-center"><?=number_format($re['buy_price'])?> ກີບ</th>
                                             <th class="text-center"><?=number_format($re['qty'])?></th>
                                             <th class="text-right"><?=number_format($re['buy_price'] * $re['qty'])?> ກີບ</th>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                   </table>
                                   </div>
                                   <div class="row mt-4">
                                        <div class="col-lg-8">
                                        </div>
                                        <div class="col-lg-4 text-right">
                                             <div class="invoice-detail-item">
                                                  <div class="invoice-detail-value">ລາຄາລວມທັງໝົດ</div>
                                                  <?php
                                                  $query = mysqli_query($conn, "SELECT SUM(buy_price) AS total FROM `tb_import` where tb_state='1'") or die(mysqli_error());

                                                  $fetch = mysqli_fetch_array($query);
                                                  ?>
                                                   <div class="invoice-detail-value invoice-detail-value-lg" style="color:black"><?php echo number_format($fetch['total'])?> ກີບ</div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <hr>
                    <div>
                    <div class="text-md-left">
                         <a href="product_import.php" onclick="updateimport()" class="btn btn-primary btn-icon icon-left" style="font-size:18px"><i class="fas fa-arrow-alt-circle-up"></i> ປິດໃບບິນ</a>
                    </div>
                    <div class="text-md-right">
                         <button type="submit" class="btn btn-warning btn-icon icon-left" style="font-size:18px"><i class="fas fa-print"></i> ປຣິນໃບບິນ</button>
                    </div>
                    </div>
               </div>
          </div>
     </section>
</div>
<script>
    $(function () {
    $('button[type="submit"]').click(function () {
        var pageTitle = 'ຮ້ານ ສຸນິດຕາ',
            stylesheet = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
            win = window.open('', 'Print', 'width=100%,height=300');
        win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<link rel="stylesheet" href="' + stylesheet + '">' +
            '</head><body>' + $('.invoice-print')[0].outerHTML + '</body></html>');
        win.document.close();
        win.print();
        win.close();
        return false;
    });
  });
</script>

<script>
  var updateimport = id=>{
    let data_s = "id=" + id;
    $.post("save-cart/update-import.php",data_s,function(res){
      if (res.state == 1) {
        $("#tb-showCart").load("save-cart/load-cart.php");
        $("#form-bc #bc").val('');
      } else {
        alert('ບໍ່ສາມາດດຳເນີນການໄດ້')
      }
    },'JSON')
  }
</script>
<?php 
include "include/footer.php";
?>