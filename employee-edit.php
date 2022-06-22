<!-- Add New -->

<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";

include_once("config/connection.php");


$id=$_REQUEST['id'];
$query = "SELECT * from tb_Staff where id='".$id."'"; 
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
                <h4>ແກ້ໄຂຂໍ້ມູນພະນັກງານ</h4>
              </div>
             
              <div class="container-fluid">
              <?php
               $query=$conn->query("select gender from tb_Staff");
               $result=$query->fetch_array();

               $status = "";
               if(isset($_POST['new']) && $_POST['new']==1)
               {
               $id=$_REQUEST['id'];
               $fullname =$_REQUEST['fullname'];
               $birthday = date("Y-m-d H:i:s");
               $gender = $_REQUEST['gender'];
               $address =$_REQUEST['address'];
               $phone =$_REQUEST['phone'];
               
               $update="UPDATE tb_Staff set fullname='".$fullname."',
               birthday='".$birthday."', gender='".$gender."',
               address='".$address."', phone='".$phone."' where id='".$id."'";
             
               mysqli_query($conn, $update) or die(mysqli_error());
               $status = "ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ. </br></br>
               <a href='employee.php'class='btn btn-primary'>ກັບໄປເບິ່ງຂໍ້ມູນທີ່ແກ້ໄຂແລ້ວ</a>";
               echo '<p style="color:blue;">'.$status.'</p>';
               
               }else {
               ?>
		    <form method="POST" action="employee-edit.php" style="font-size: 15px;">
                    <div class="form-row">
                    <div class="col-12 mb-3">
                    <input type="hidden" name="new" value="1" />
                         <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                    </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ຊື່ເຕັມ</p>
                              <input type="text" name="fullname" value="<?php echo $row['fullname'];?>" class="form-control"   required/>
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນຊື່ເຕັມ
                              </div>
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ວັນເດືອນປີເກີດ</p>
                              <input type="date" name="birthday" value="<?php echo $row['birthday'];?>" class="form-control" required />
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນວັນເດືອນປີເກີດ
                              </div>
                         </div>
                         <div class="col-12 mb-3">
                              <p>ເພດ</p>
                              <input type="radio" name="gender" value="ຍິງ" <?php if($result['gender']=="ຍິງ"){ echo "checked";}?>/> ຍິງ
                              <input type="radio" name="gender" value="ຊາຍ" <?php if($result['gender']=="ຊາຍ"){ echo "checked";}?> /> ຊາຍ
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ທີ່ຢູ່</p>
                              <input type="text" name="address" value="<?php echo $row['address'];?>" class="form-control"  required />
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນທີ່ຢູ່
                              </div>
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ເບີໂທ</p>
                              <input type="text" name="phone" value="<?php echo $row['phone'];?>" class="form-control" required />
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນເບີໂທ
                              </div>
                         </div>
                    </div>
				</div>
                    <div class="modal-footer">
				<a href="employee.php" type="button" style="font-size:15px" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</a>
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
