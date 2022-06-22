<!-- Add New -->

<?php

include("config/connection.php");

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $perm_mod = $_POST['perm_mod'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM tb_user WHERE username='$username'";
     
        $result = mysqli_query($conn, $sql);
       
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tb_user (username,fullname,perm_mod,password)
				VALUES ('$username', '$fullname', '$perm_mod', '$password')";
         
            $result = mysqli_query($conn, $sql);
          
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
               
                $username = "";
                $fullname = "";
                $permission = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header('location:user.php');
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}
?>

<div class="modal fade" id="addnewuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div style="text-align: center; padding-top:10px;">
				<div>
					<h3>ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້</h3>
				</div>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="user-add.php" style="font-size: 15px;">
                         <div class="form-row">
						<div class="col-12 mb-3">
                                   <p style="font-size:15px">ຊື່ຜູ້ໃຊ້</p>
                                   <input type="text" name="username" class="form-control" required />
							<div class="invalid-feedback" style="font-size:15px">
							ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ
							</div>
                              </div>
                              <div class="col-12 mb-3">
                                   <p style="font-size:15px">ຊື່ພະນັກງານ</p>
                                   <select name="fullname" id="" class="form-control" required>
                                   <option>ກະລຸນາເລືອກພະນັກງານກ່ອນ</option>
                                    <?php 
                                     $emps = mysqli_query($conn, "SELECT * FROM tb_Staff");
                                    foreach ($emps as $emp) {
                                    ?>
                                        <option><?php echo $emp['fullname']; ?> </option>
                                        <?php 
                                        }
                                    ?>
                                   </select>
                                <div class="invalid-feedback" style="font-size:15px">
                                    ກະລຸນາເລືອກສິດທິກ່ອນ
							    </div>
                             </div>
                              <div class="col-12 mb-3">
                                   <p style="font-size:15px">ສິດທິ</p>
                                   <select name="perm_mod" id="" class="form-control">
                                   <option>ກະລຸນາເລືອກສິດທິກ່ອນ</option>
                                    <?php 
                                    $roles = mysqli_query($conn, "SELECT * FROM tb_permissions");
                                    foreach ($roles as $role) {
                                    ?>
                                        <option><?php echo $role['perm_mod']; ?> </option>
                                        <?php 
                                        }
                                    ?>
                                   </select>
                                <div class="invalid-feedback" style="font-size:15px">
                                    ກະລຸນາເລືອກສິດທິກ່ອນ
							    </div>
                            </div>
						<div class="col-12 mb-3">
                                   <p style="font-size:15px">ລະຫັດຜ່ານ</p>
                                   <input type="password" name="password" class="form-control" required />
							<div class="invalid-feedback" style="font-size:15px">
							ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ
							</div>
                              </div>
						<div class="col-12 mb-3">
                                   <p style="font-size:15px">ຢືນຢັນລະຫັດຜ່ານ</p>
                                   <input type="password" name="cpassword" class="form-control" required />
							<div class="invalid-feedback" style="font-size:15px">
							ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ
							</div>
                              </div>
                         </div>
				</div>
                    <div class="modal-footer">
				<button type="button" style="font-size:15px" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
				<button type="submit" name="save" style="font-size:15px" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> ບັນທຶກ</a>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>