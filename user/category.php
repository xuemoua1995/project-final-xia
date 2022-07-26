<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");

$query = "SELECT * FROM tb_ProductType ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>

<div class="main-content">
    <section class="section">
      <div class="section-body">   
        <div class="row">
          <div class="col-12">
          <a href="#addnewcategory" class="btn btn-success" data-toggle="modal" style="font-size:15px"><i class="fas fa-edit"></i> ເພີ່ມຂໍ້ມູນປະເພດສິນຄ້າ</a>
            <div class="card">
              <div class="card-header">
                <h4>ຂໍ້ມູນປະເພດສິນຄ້າ</h4>
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
                        <th>ຊື່ປະເພດສິນຄ້າ</th>
                        <th>ເພີ່ມວັນທີ່ເດຶອນປີ</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if (mysqli_num_rows($result) > 0) {
                        $sn=1;
                        while($row = mysqli_fetch_assoc($result)) {
                        // $new_date = date("d/m/Y H:i:s", strtotime($row["created_date"]));
                      ?>
                      <tr>
                        <td>
                          <div class="sort-handler">
                            <i class="fas fa-th"></i>
                          </div>
                        </td>
                        <td><?php echo $sn ?></td>
                        
                        <td>
                        <div><?php echo $row['typename']; ?></div>
                        </td>
                        <td>
                          <div class="badge badge-success"><?php echo $row["created_date"]; ?></div>
                        </td>
                        <td><a href="category-edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" style="font-size:15px"><i class="fas fa-edit"></i> ແກ້ໄຂ</a> <a href="category-delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" style="font-size:15px"><i class="far fa-trash-alt"></i> ລຶບ</a></td>
                      </tr>
                      <?php
                        $sn++;}} else { ?>
                          <tr>
                          <td colspan="8">ຍັງບໍມີຂໍ້ມູນ</td>
                          </tr>
                      <?php } ?>
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
  <?php include('category-add.php') ?>
<?php 
include "include/footer.php";
?>