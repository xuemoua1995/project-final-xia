<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");

?>

<div class="main-content">
    <section class="section">
      <div class="section-body">   
        <div class="row">
          <div class="col-12">
          <a href="#addnewproduct" class="btn btn-success" data-toggle="modal" style="font-size:15px"><i class="fas fa-edit"></i> ເພີ່ມຂໍ້ມູນສິນຄ້າ</a>
          <a href="#" class="btn btn-primary" style="font-size:15px; float:right"><i class="fas fa-print"></i> ປຣິນບາໂຄດທັງໝົດ</a>
            <div class="card">
              <div class="card-header">
                <h4>ຂໍ້ມູນສິນຄ້າ</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <i class="fas fa-th"></i>
                        </th>
                        <th>ລຳດັບ</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ບາໂຄດ</th>
                        <th>ປະເພດ</th>
                        <th>ຫົວໜ່ວຍ</th>
                        <th>ຈຳນວນ</th>
                        <th>ລາຄາຊື້</th>
                        <th>ລາຄາຂາຍ</th>
                        <th>ເພີ່ມວັນທີ່ເດຶອນປີ</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = 1;
                      include_once("config/connection.php");
                      $sql = "SELECT * FROM tb_ProductItem ORDER BY id DESC";
                      $query = $conn->query($sql);
                    
                        while($row =  $query->fetch_assoc()) {
                          // $new_date = date("d/m/Y H:i:s", strtotime($row["created_date"]));
                          ?>
                          <tr>
                          <td>
                            <div class='sort-handler'>
                              <i class='fas fa-th'></i>
                            </div>
                          </td>
                          <td>
                          <div><?php echo $count ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["name"]; ?></div>
                          </td>
                          <td>
                          <div id="display"><?php echo "<img src='barcode.php?codetyoe=Code39&size=40&text=".$row["barcode"]."&print=true'> "; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["typename"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["unit_name"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["qty"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo number_format($row["buy_price"]); ?> ກີບ</div>
                          </td>
                          <td>
                          <div><?php echo number_format($row["sale_price"]); ?> ກີບ</div>
                          </td>
                          <td>
                            <div class='badge badge-success'><?php echo $row["created_date"]; ?></div>
                          </td>
                          <td>
                            <a href="product-edit.php?id=<?php echo $row["id"]; ?>" class='btn btn-primary' style='font-size:15px'><i class='fas fa-edit'></i></a> 
                            <a href="product-delete.php?id=<?php echo $row["id"]; ?>" class='btn btn-danger' style='font-size:15px'><i class='far fa-trash-alt'></i></a> 
                            <a href="product-detail.php?id=<?php echo $row["id"]; ?>" class='btn btn-warning' style='font-size:15px'><i class='fas fa-eye'></i></a>
                            <button type="submit" id="print" class='btn btn-success' style='font-size:15px'><i class='fas fa-print'></i></button>

                          </td>
                        </tr>
                        <?php $count++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
     $('#print').click(function(){
      var openWindow = window.open("", "", "_blank");
      openWindow.document.write($('#display').parent().html());
      openWindow.document.write('<style>'+$('style').html()+'</style>');
      openWindow.document.close();
      openWindow.focus();
      openWindow.print();
      // openWindow.close();
      setTimeout(function(){
      openWindow.close();
      },1000)
    })
  </script>
  <?php include('product-add.php') ?>
<?php 
include "include/footer.php";
?>
