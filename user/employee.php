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
          <a href="#addnewemployee" class="btn btn-success" data-toggle="modal" style="font-size:15px"><i class="fas fa-edit"></i> ເພີ່ມຂໍ້ມູນພະນັກງານ</a>
            <div class="card">
              <div class="card-header">
                <h4>ຂໍ້ມູນພະນັກງານ</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <i class="fas fa-th"></i>
                        </th>
                        <th>ຊື່ເຕັມ</th>
                        <th>ເພດ</th>
                        <th>ວັນເດືອນປີເກີດ</th>
                        <th>ທີ່ຢູ່</th>
                        <th>ເບີໂທ</th>
                        <th>ເພີ່ມວັນທີ່ເດຶອນປີ</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     $count=1;
                      $sql = "SELECT * FROM tb_Staff ORDER BY id DESC";
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
                          <td><?php echo $row["id"]; ?></td>
                          <td>
                          <div><?php echo $row["fullname"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["gender"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["birthday"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["address"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["phone"]; ?></div>
                          </td>
                          <td>
                            <div class='badge badge-success'><?php echo $row["created_date"]; ?></div>
                          </td>
                          <td>
                            <a href="employee-edit.php?id=<?php echo $row["id"]; ?>" class='btn btn-primary' style='font-size:15px'><i class='fas fa-edit'></i></a> 
                            <a href="employee-delete.php?id=<?php echo $row["id"]; ?>" class='btn btn-danger'  style='font-size:15px'><i class='far fa-trash-alt'></i></a> 
                            <a href="employee-detail.php?id=<?php echo $row["id"]; ?>" class='btn btn-warning' style='font-size:15px'><i class='fas fa-eye'></i></a>
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
<?php include('employee-add.php') ?>
<?php 
include "include/footer.php";
?>