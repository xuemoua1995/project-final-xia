

<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");

if(isset($_GET['id'])){
  $sql = "DELETE FROM tb_user WHERE id = '".$_GET['id']."'";

  //use for MySQLi OOP
  if($conn->query($sql)){
    $_SESSION['success'] = 'Document deleted successfully';
  }
  
  else{
    $_SESSION['error'] = 'Something went wrong in deleting Document';
  }
}
else{
  $_SESSION['error'] = 'Select Document to delete first';
}

?>
<div class="main-content">
    <section class="section">
      <div class="section-body">   
        <div class="row">
          <div class="col-12">
          <a href="#addnewuser" class="btn btn-success" data-toggle="modal" style="font-size:15px"><i class="fas fa-edit"></i> ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້</a>
            <div class="card">
              <div class="card-header">
                <h4>ຂໍ້ມູນຜູ້ໃຊ້</h4>
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
                        <th>ຊື່ພະນັກງານ</th>
                        <th>ຊື່ຜູ້ໃຊ້</th>
                        <th>ສິດທິ</th>
                        <th>ເພີ່ມວັນທີ່ເດຶອນປີ</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                      include_once("config/connection.php");
                      $sql = "SELECT * FROM tb_user ORDER BY id DESC";
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
                          <td><?php echo $count ?></td>
                          
                          <td>
                          <div><?php echo $row["fullname"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["username"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["perm_mod"]; ?></div>
                          </td>
                          <td>
                            <div class='badge badge-success'><?php echo $row["created_date"]; ?></div>
                          </td>
                          <td>
                            <a href="user-edit.php?id=<?php echo $row["id"]; ?>" class='btn btn-primary' style='font-size:15px'><i class='fas fa-edit'></i> ແກ້ໄຂ</a> 
                            <a href="user-delete.php?id=<?php echo $row["id"]; ?>" class='btn btn-danger'  style='font-size:15px'><i class='far fa-trash-alt'></i> ລຶບ</a> 
                            <a href="user-detail.php?id=<?php echo $row["id"]; ?>" class='btn btn-warning' style='font-size:15px'><i class='fas fa-eye'></i></a>
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

<?php include('user-add.php') ?>
