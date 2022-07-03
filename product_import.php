<?php
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");

if(isset($_POST['save'])){
  $name = $_POST['name'];
  $barcode = $_POST['barcode'];
  $typename = $_POST['typename'];
  $qty = $_POST['qty'];
  $buy_price = $_POST['buy_price'];


  $sql = "INSERT INTO tb_import (name, barcode, typename, qty, buy_price) VALUES ('$name', '$barcode', '$typename', '$qty', '$buy_price')";

  //use for MySQLi OOP
  if($conn->query($sql)){
      $_SESSION['success'] = 'Document added successfully';
      header('location: product_import.php');
  }
  
  else{
      $_SESSION['error'] = 'can not add Document';
      header('location: product_import.php');
  }
}
else{
  $_SESSION['error'] = 'Fill up add form Document';
}

?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>ສັ່ງຊື້ສິນຄ້າເຂົ້າຮ້ານ</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <form method="POST" action="product_import.php" style="font-size: 15px;">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ລະຫັດບາໂຄດ</p>
                                <input type="text" name="barcode" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ຊື່ສິນຄ້າ</p>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ຊື່ປະເພດສິນຄ້າ</p>
                                <select name="typename" id="" class="form-control" required>
                                   <option>ກະລຸນາເລືອກປະເພດສິນຄ້າກ່ອນ</option>
                                    <?php 
                                    $types = mysqli_query($conn, "SELECT * FROM tb_ProductType");
                                    foreach ($types as $type) {
                                    ?>
                                        <option><?php echo $type['typename']; ?> </option>
                                        <?php 
                                        }
                                    ?>
                                   </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ຈຳນວນ</p>
                                <input type="text" name="qty" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ລາຄາ</p>
                                <input type="text" name="buy_price" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-primary"><i class="fas fa-edit"></i> ບັນທຶກ</a>
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
                    <th>ບາໂຄດ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ຈຳນວນ</th>
                    <th>ປະເພດ</th>
                    <th>ລາຄາ</th>
                    <th>ວັນທີ່ເດືອນປີ</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                      include_once("config/connection.php");
                      $sql = "SELECT * FROM tb_import WHERE tb_state='1'";
                      $query = $conn->query($sql);
                    
                        while($row =  $query->fetch_assoc()) {
                          $new_date = date("d/m/Y", strtotime($row["created_date"]));
                          ?>
                          <tr>
                          <td>
                            <div class='sort-handler'>
                              <i class='fas fa-th'></i>
                            </div>
                          </td>
                          <td>
                          <div><?php echo $row["barcode"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["name"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["qty"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["typename"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo number_format($row["buy_price"]); ?> ກີບ</div>
                          </td>
                          <td>
                            <div><?php echo $new_date; ?></div>
                          </td>
                          <td>
                            <a href="product-import-delete.php?id=<?php echo $row["id"]; ?>" style='font-size:15px; color:red'><i class='far fa-trash-alt'></i> ລຶບ</a> 
                            
                          </td>
                        </tr>
                        <?php $count++; } ?>
                    </tbody>
              </table>
              <div>
              <?php
                $query = mysqli_query($conn, "SELECT SUM(buy_price) AS total FROM `tb_import` where tb_state='1'") or die(mysqli_error());

                $fetch = mysqli_fetch_array($query);
                ?>
              <h5 style="float:right;color:black;">ລວມ: <?php echo number_format($fetch['total'])?> ກີບ</h5>
            </div>
            </div>
            
          </div>
          <a href="invoice-import.php" class="btn btn-primary" style="font-size:15px"><i class="fas fa-edit"></i> ອອກໃບບິນ</a>
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