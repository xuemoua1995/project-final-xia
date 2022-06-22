<!-- Add New -->
<?php 
    include("config/connection.php");
    $query ="SELECT * FROM `tb_ permissions`";

    echo $query;
        $result = $conn->query($query);
        if($result->num_rows> 0){
          $roles= mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
?>
<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";

include_once("config/connection.php");
if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$perm_mod = $_POST['perm_mod'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	

	$sql = "UPDATE tb_user SET perm_mod = '$perm_mod', username = '$username', password = '$password' WHERE id = '".$id."'";

	// echo $sql;
	//use for MySQLi OOP
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Document updated successfully';
	} else {
		$_SESSION['error'] = 'Something went wrong in updating Document';
	}

} else {
	$_SESSION['error'] = 'Select Document to edit first';
}

header('location: home.php');


?>

<div class="main-content">
    <section class="section">
      <div class="section-body">   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>ລາຍລະອຽດຂໍ້ມູນຜູ້ໃຊ້</h4>
              </div>
             
              <div class="container-fluid">
              <?php
              $perm  = mysqli_query($conn, "SELECT DISTINCT perm_mod FROM tb_permissions");
               $status = "";
               if(isset($_POST['new']) && $_POST['new']==1)
               {
               $id=$_REQUEST['id'];
               $username =$_REQUEST['username'];
               $perm_mod =$_REQUEST['perm_mod'];
               $password =$_REQUEST['password'];
               
               $update="UPDATE tb_user set username='".$username."',
               perm_mod='".$perm_mod."', password='".$password."' where id='".$id."'";
             
               mysqli_query($conn, $update) or die(mysqli_error());
               $status = "Record Updated Successfully. </br></br>
               <a href='user.php'>View Updated Record</a>";
               echo '<p style="color:blue;">'.$status.'</p>';
               
               }else {
               ?>
		            <form method="POST" action="user-edit.php" style="font-size: 15px;">
                         <div class="form-row">
                            <div class="col-12 mb-3">
                                  <input type="hidden" name="new" value="1" />
                                  <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                            </div>
                            <div class="col-12 mb-3">
                                <p style="font-size:15px">ຊື່ເຕັມ</p>
                                <input type="text" name="username" value="<?php echo $row['username'];?>" class="form-control" required/>
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນຊື່ເຕັມ
                              </div>
                              </div>
                            <div class="col-12 mb-3">
                                                <p style="font-size:15px">ສິດທິ</p>
                            <select name="perm_mod" id="" class="form-control" required>
                                    <option>ກະລຸນາເລືອກສິດທິກ່ອນ</option>
                                    <?php foreach($perm as $rows):?>
                                    <option value="<?php echo $rows['perm_mod']; ?>"<?php if($row['perm_mod'] == $rows['perm_mod']) echo 'selected="selected"'; ?>><?php echo $rows['perm_mod']; ?></option>
                                    <?php endforeach;?>
                                   </select>
                              </div>
                            <div class="col-12 mb-3">
                                                  <p style="font-size:15px">ລະຫັດຜ່ານ</p>
                                                  <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control"  required />
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ
                              </div>
                                              </div>
                            <div class="col-12 mb-3">
                                                  <p style="font-size:15px">ຢືນຢັນລະຫັດຜ່ານ</p>
                                                  <input type="password" name="cpassword" value="<?php echo $row['cpassword'];?>" class="form-control" required />
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ
                              </div>
                              </div>
                         </div>
				                  </div>
                    <div class="modal-footer">
                    <button type="button" style="font-size:15px" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
                    <button type="submit" name="edit" style="font-size:15px" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> ແກ້ໄຂຂໍ້ມູນ</a>
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
