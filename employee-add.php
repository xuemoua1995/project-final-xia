<!-- Add New -->
<?php

include_once("config/connection.php");


if(isset($_POST['save'])){
    $fullname = $_POST['fullname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];


    $sql = "INSERT INTO tb_Staff (fullname, birthday, gender, address, phone   ) VALUES ('$fullname', '$birthday', '$gender','$address','$phone')";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = ' Add Employee successfully';
        header("Location:employee.php");
    }
    
    else{
        $_SESSION['error'] = 'can not add Employee';
        header("Location:employee.php");
    }
}
else{
    $_SESSION['error'] = 'Fill up add form Employee';
}


?>
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div style="text-align: center; padding-top:10px;">
				<div>
					<h3>ເພີ່ມຂໍ້ມູນພະນັກງານ</h3>
				</div>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="employee-add.php" style="font-size: 15px;">
                         <div class="form-row">
                              <div class="col-12 mb-3">
                                   <p>ຊື່ເຕັມ</p>
                                   <input type="text" name="fullname" class="form-control" required />
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ວັນເດືອນປີເກີດ</p>
                                   <input type="date" name="birthday" class="form-control" required />
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ເພດ</p>
                                   <input type="radio" name="gender" value="ຍິງ" /> ຍິງ
                                   <input type="radio" name="gender" value="ຊາຍ" /> ຊາຍ
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ທີ່ຢູ່</p>
                                   <input type="text" name="address" class="form-control" required />
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ເບີໂທ</p>
                                   <input type="number" name="phone" maxlength="11" class="form-control" required />
                              </div>
                         </div>
				</div>
                    <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
				<button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> ບັນທຶກ</a>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>