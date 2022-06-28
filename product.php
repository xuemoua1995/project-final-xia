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
                        <th>ລະຫັດ</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ລະຫັດບາໂຄດ</th>
                        <th>ປະເພດສິນຄ້າ</th>
                        <th>ຈຳນວນ</th>
                        <th>ລາຄາຊື້</th>
                        <th>ລາຄາຂາຍ</th>
                        <th>ວັນທີ່ເພີ່ມ</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = 1;
                      include_once("config/connection.php");
                      $sql = "SELECT * FROM tb_ProductItem";
                      $query = $conn->query($sql);
                    
                        while($row =  $query->fetch_assoc()) {?>
                          <tr>
                          <td>
                            <div class='sort-handler'>
                              <i class='fas fa-th'></i>
                            </div>
                          </td>
                          <td><?php echo $row["id"]; ?></td>
                          <td>
                          <div><?php echo $row["name"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["barcode"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["typename"]; ?></div>
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
                            <div class='badge badge-success'><?php echo date_format($row["created_date"]); ?></div>
                          </td>
                          <td>
                            <a href="product-edit.php?id=<?php echo $row["id"]; ?>" class='btn btn-primary' style='font-size:15px'><i class='fas fa-edit'></i></a> 
                            <a href="product-delete.php?id=<?php echo $row["id"]; ?>" class='btn btn-danger' style='font-size:15px'><i class='far fa-trash-alt'></i></a> 
                            <a href="product-detail.php?id=<?php echo $row["id"]; ?>" class='btn btn-warning' style='font-size:15px'><i class='fas fa-eye'></i></a>
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
  <?php include('product-add.php') ?>
<?php 
include "include/footer.php";
?>
