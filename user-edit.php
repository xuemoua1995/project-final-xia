<!-- Add New -->
<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";

include_once("config/connection.php");

$id=$_REQUEST['id'];
$query = "SELECT * from tb_user where id='".$id."'"; 
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
                <h4>ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</h4>
              </div>
             
              <div class="container-fluid">
              <?php
              
               $status = "";
               if(isset($_POST['new']) && $_POST['new']==1)
               {
               $id=$_REQUEST['id'];
               $username =$_REQUEST['username'];
               $fullname =$_REQUEST['fullname'];
               $perm_mod =$_REQUEST['perm_mod'];
               $password =$_REQUEST['password'];
               $passwordEncrypted = sha1($password);
               $confpassword = $_POST['cpassword'];
               $confPasswordEncrypted = sha1($confirmPass);  
               
               if($password !== $confpassword){
                echo "<script>alert('Passwords are not match')</script>";
               }else{
                $update="UPDATE tb_user set username='".$username."',fullname='".$fullname."',
                perm_mod='".$perm_mod."', password='".$confPasswordEncrypted."' where id='".$id."'";
              
                mysqli_query($conn, $update) or die(mysqli_error());
                $status = "ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ. </br></br>
                <a href='user.php' class='btn btn-primary'>ກັບໄປເບິ່ງຂໍ້ມູນທີ່ແກ້ໄຂແລ້ວ</a>";
                echo '<p style="color:blue;">'.$status.'</p>';
               }
        
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
                              
                              </div>
                              <div class="col-12 mb-3">
                                   <p style="font-size:15px">ຊື່ພະນັກງານ</p>
                                   <select name="fullname" id="" class="form-control" required>
                                   <option>ກະລຸນາເລືອກພະນັກງານກ່ອນ</option>
                                     <?php 
                                     $emp  = mysqli_query($conn, "SELECT DISTINCT fullname FROM tb_Staff");
                                    foreach($emp as $rows):?>
                                    <option value="<?php echo $rows['fullname']; ?>"<?php if($row['fullname'] == $rows['fullname']) echo 'selected="selected"'; ?>><?php echo $rows['fullname']; ?></option>
                                    <?php endforeach;
                                    ?>
                                   </select>
                             </div>
                            <div class="col-12 mb-3">
                                <p style="font-size:15px">ສິດທິ</p>
                                  <select name="perm_mod" id="" class="form-control" required>
                                    <option>ກະລຸນາເລືອກສິດທິກ່ອນ</option>
                                    <?php 
                                     $perm  = mysqli_query($conn, "SELECT DISTINCT perm_mod FROM tb_permissions");
                                    foreach($perm as $rows):?>
                                    <option value="<?php echo $rows['perm_mod']; ?>"<?php if($row['perm_mod'] == $rows['perm_mod']) echo 'selected="selected"'; ?>><?php echo $rows['perm_mod']; ?></option>
                                    <?php endforeach;
                                    ?>
                                   </select>
                              </div>
                                  <div class="col-12 mb-3">
                                      <p style="font-size:15px">ລະຫັດຜ່ານ</p>
                                      <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control"  required />
                  
                                   </div>
                            <div class="col-12 mb-3">
                                  <p style="font-size:15px">ຢືນຢັນລະຫັດຜ່ານ</p>
                                  <input type="password" name="cpassword" value="<?php echo $row['cpassword'];?>" class="form-control" required />
                              
                              </div>
                         </div>
				                  </div>
                    <div class="modal-footer">
                    <a href="user.php" type="button" style="font-size:15px" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</a>
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
