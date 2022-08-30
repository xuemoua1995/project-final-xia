<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");
$total = 0;

?>
  <!-- Main Content -->
  <div class="main-content">
     <section class="section">
     <div class="form-row">
          <form action="report_invoice.php" method="POST">
          <div class="col-3 mb-3" style="display:flex; padding:5px">
               <select name="tb_state" style="border:1px solid black;width:500px"  class="form-control" required>
               <option>ຄົ້ນຫາເລກທີ່ໃບຮັບເງີນ</option>
                    <?php 
                    $invoices = mysqli_query($conn, "SELECT DISTINCT tb_state FROM tb_order ORDER BY tb_state ASC");
                    foreach ($invoices as $invoice) {
                    ?>
                    <option value="<?php echo $invoice['tb_state'];?>">ໃບຮັບເງີນເລກທີ່: <?php echo $invoice['tb_state'];?></option>
                    <?php 
                    }
                    ?>
               </select>
               <input type="submit" style="background:blue; border:none; color:white; width:200px; border-radius:2px 5px 5px 2px" name="search" value="ຄົ້ນຫາໃບຮັບເງີນ">
               </div>
          </div>
          </form>
          <div class="section-body">
               <div class="invoice" id="invoice">
                    <div class="invoice-print" id="invoiceprint" style="padding:20px;">
                         <div style="margin:auto; width:600px">
                         <p style="text-align: center">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ <br>
                         ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ
                         </p>
                         </div>
                         <div class="row">
                              <div class="col-lg-12">
                                   <div class="invoice-title">
                                        <h2 style="text-align: center">ໃບຮັບເງີນ</h2>
                                   </div>
                              </div>
                         </div>
                         <div class="row mt-4">
                              <div class="col-md-12">
                                   <p class="section-lead">ເລກທີ່: ....................................... <br>
                                   ວັນທີ່: ....................................... <br>
                                   ອັດເອກະສານ ແລະ ເຄື່ອງໃຊ້ຫ້ອງການ <br>
                                        ບ້ານ ພັນຫຼວງ ນະຄອນຫຼວງພະບາງ ແຂວງ ຫຼວງພະບາງ (ຕໍ່ໜ້າ ມປ ພັນຫຼວງ)
                                   <br>
                                   ໂທ: 020 2930 0013, 020 2930 0014, 030 481 9980
                                   </p>
                                   <div class="table-responsive">
                                   <table class="table table-striped table-hover table-md" style="width:100%">
                                        <tr">
                                             <th class="text-center" data-width="40">ລຳດັບ</th>
                                             <th>ລາຍການ</th>
                                             <th>ຈຳນວນ</th>
                                             <th class="text-center">ລາຄາ</th>
                                             <th style="float:right">ຈຳນວນເງີນ</th>
                                        </tr>
                                        <?php
                                        $i=1;
                                         if(isset($_POST["search"])){
                                        $tb_state=$_POST['tb_state'];
                                        $qry = qry("select * from tb_order where tb_state='$tb_state'");
                                        while ($re = $qry->fetch_assoc()) {
                                             $pro = assoc("select * from tb_ProductItem where id = '$re[product_id]'");
                                        ?>
                                        <tr>
                                             <th data-width="40"><?=$i?></th>
                                             <th><?=$pro['name']?></th>
                                             <th><input type="number" class="iquantity" onchange="subTotal()" style="width:40px;border:none" value="<?=$re['qty']?>" disabled/></th>
                                             <th class="text-center"><?=number_format($re['price'])?> ກີບ <input type="hidden" class="iprice" value="<?=$re['price']?>"></th></th>
                                             <th class="text-right itotal" style="float:right"></th>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                        }else{
                                             echo "<span class='badge badge-danger'>ຍັງບໍມີຂໍ້ມູນ</span>";
                                        }
                                        
                                        ?>
                                   </table>
                                   </div>
                                   <div class="row mt-4">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-8 text-right">
                                             <div class="invoice-detail-item" style="float:right">
                                                  <div class="invoice-detail-value" style="font-size:22px; float:right;font-weight:bold">ລວມເງີນ</div>
                                                   <div class="invoice-detail-value invoice-detail-value-lg" style="color:black;font-size:22px; font-weight:bold" id="total"></div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <hr>
                    <div>
                    <div class="text-md-left">
                         <a href="dashboard.php" class="btn btn-primary btn-icon icon-left" style="font-size:18px"><i class="fas fa-backward"></i> ກັບຄືນ</a>
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
        var pageTitle = '',
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
  var updatestatus = id=>{
    let data_s = "id=" + id;
    $.post("save-cart/updatestatus.php",data_s,function(res){
      if (res.state == 1) {
        $("#tb-showCart").load("save-cart/load-cart.php");
        $("#form-bc #bc").val('');
      } else {
        alert('ບໍ່ສາມາດດຳເນີນການໄດ້')
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