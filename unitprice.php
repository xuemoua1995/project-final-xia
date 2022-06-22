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
          <a href="#addnew" class="btn btn-success" data-toggle="modal" style="font-size:15px"><i class="fas fa-edit"></i> ເພີ່ມຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ</a>
            <div class="card">
              <div class="card-header">
                <h4>ຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ</h4>
                <div class="card-header-action">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped" id="exampleTable">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <i class="fas fa-th"></i>
                        </th>
                        <th>ລະຫັດຫົວໜ່ວຍສິນຄ້າ</th>
                        <th>ຊື່ຫົວໜ່ວຍສິນຄ້າ</th>
                        <th>ວັນທີ່ເພີ່ມ</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $count=1;
                      $sql = "SELECT * FROM tb_unit";
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
                          <div><?php echo $row["unit_name"]; ?></div>
                          </td>
                          <td>
                            <div class='badge badge-success'><?php echo $row["created_date"]; ?></div>
                          </td>
                          <td>
                            <a href="unit-edit.php?id=<?php echo $row["id"]; ?>" class='btn btn-primary' style='font-size:15px'><i class='fas fa-edit'></i> ແກ້ໄຂ</a> 
                            <a href="unit-delete.php?id=<?php echo $row["id"]; ?>" class='btn btn-danger' style='font-size:15px'><i class='far fa-trash-alt'></i> ລຶບ</a> 
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
<?php include('unit-add.php') ?>

<?php include "include/footer.php";?>