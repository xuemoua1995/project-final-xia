
<!-- Add New -->

<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";

include_once("config/connection.php");
$id=$_REQUEST['id'];
$query = "SELECT * from tb_unit where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

?>

<div class="main-content">
    <section class="section">
      <div class="section-body">   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>ແກ້ໄຂຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ</h4>
              </div>
              <div class="container-fluid">
		    <?php
				$status = "";
				if(isset($_POST['new']) && $_POST['new']==1)
				{
				$id=$_REQUEST['id'];
				$unit_name =$_REQUEST['unit_name'];

				$update="UPDATE tb_unit set unit_name='".$unit_name."' where id='".$id."'";

				mysqli_query($conn, $update) or die(mysqli_error());
				$status = "ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ. </br></br>
				<a href='unitprice.php' class='btn btn-primary'>ກັບໄປເບິ່ງຂໍ້ມູນທີ່ແກ້ໄຂແລ້ວ</a>";
				echo '<p style="color:blue;">'.$status.'</p>';

				}else {
				?>
				<form method="POST" action="unit-edit.php" style="font-size: 15px;">
				<div class="form-row">
					<div class="col-12 mb-3">
						<input type="hidden" name="new" value="1" />
						<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
					</div>
					<div class="col-12 mb-3">
						<p>ຊື່ຫົວໜ່ວຍສິນຄ້າ</p>
						<input type="text" name="unit_name" value="<?php echo $row['unit_name']; ?>" class="form-control" required />
					</div>
				</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
				<button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> ບັນທຶກ</a>
				</form>
			<?php } ?>
			</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php 
include "include/footer.php";
?>