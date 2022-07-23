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
          <div class="section-body">
               <div class="invoice">
                    <div class="invoice-print">
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
                                   <table class="table table-striped table-hover table-md">
                                        <tr>
                                             <th data-width="40">ລຳດັບ</th>
                                             <th>ລາຍການ</th>
                                             <th class="text-center">ຈຳນວນ</th>
                                             <th class="text-center">ລາຄາ</th>
                                             <th class="text-right">ຈຳນວນເງີນ</th>
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
                                             <th class="text-center"><input type="number" class="iquantity" onchange="subTotal()" style="width:40px;border:none" value="<?=$re['qty']?>" disabled/></th>
                                             <th class="text-center"><?=number_format($re['price'])?> ກີບ <input type="hidden" class="iprice" value="<?=$re['price']?>"></th></th>
                                             <th class="text-right itotal"></th>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                   </table>
                                   </div>
                                   <div class="row mt-4">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-8 text-right">
                                             <div class="invoice-detail-item">
                                                  <div class="invoice-detail-value">ລວມເງີນ</div>
                                                   <div class="invoice-detail-value invoice-detail-value-lg" style="color:black" id="total"></div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <hr>
                    <div>
                    <div class="text-md-left">
                         <a href="product_sale.php" onclick="updatestatus()" class="btn btn-primary btn-icon icon-left" style="font-size:18px"><i class="fas fa-arrow-alt-circle-up"></i> ປິດໃບບິນ</a>
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