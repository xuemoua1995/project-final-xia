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
                                        <h2>ໃບບິນ</h2>
                                        <br>
                                        <?php
                                             $dt = new DateTime();
                                              echo $dt->format('ວັນທີ່ສັ່ງຊື້: Y-m-d H:i:s');
                                             ?>
                                   </div>
                              </div>
                         </div>
                         <div class="row mt-4">
                              <div class="col-md-12">
                                   <div class="section-title">ສັງລວມການສັ່ງຊື້</div>
                                   <p class="section-lead">ລາຍການທັງໝົດຢູ່ທີ່ນີ້ບໍ່ສາມາດລຶບໄດ້.</p>
                                   <div class="table-responsive">
                                   <table class="table table-striped table-hover table-md">
                                        <tr>
                                                       <th data-width="40">#</th>
                                                       <th>ລາຍການ</th>
                                                       <th class="text-center">ລາຄາ</th>
                                                       <th class="text-center">ຈຳນວນ</th>
                                                       <th class="text-right">ລວມທັງໝົດ</th>
                                                  </tr>
                                             <?php
                                             $i=1;
                                             $qry = qry("select * from tb_order where tb_state='1'");
                                             while ($re = $qry->fetch_assoc()) {
                                                  $pro = assoc("select * from tb_ProductItem where id = '$re[product_id]'");
                                             ?>
                                                  <tr>
                                                       <th data-width="40"><?=$i?></th>
                                                       <th><?=$pro['name']?></th>
                                                       <th class="text-center"><?=$re['price']?> ກີບ</th>
                                                       <th class="text-center"><?=$re['qty']?></th>
                                                       <th class="text-right"><?=$re['price'] * $re['qty']?> ກີບ</th>
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
                                                  <div class="invoice-detail-value">ລາຄາລວມ</div>
                                                  <?php
                                                  $query = mysqli_query($conn, "SELECT SUM(price) AS total FROM `tb_order`") or die(mysqli_error());

                                                  $fetch = mysqli_fetch_array($query);
                                                  ?>
                                                  <div class="invoice-detail-value" style="color:blue"><?php echo number_format($fetch['total'])?> ກີບ</div>
                                             </div>
                                             <hr class="mt-2 mb-2">
                                             <div class="invoice-detail-item">
                                                  <div class="invoice-detail-value">ລາຄາລວມທັງໝົດ</div>
                                                  <div class="invoice-detail-value invoice-detail-value-lg" style="color:blue"><?php echo number_format($fetch['total'])?> ກີບ</div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <hr>
                    <div>
                    <div class="text-md-left">
                         <a href="product_sale.php" class="btn btn-primary btn-icon icon-left"><i class="fas fa-backward"></i> ກັບຄືນໜ້າສະແກນຂາຍສີນຄ້າ</a>
                    </div>
                    <div class="text-md-right">
                         <button type="submit" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> ປຣິນໃບບິນ</button>
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
     <?php 
     include "include/footer.php";
     ?>