<!-- Add New -->
<?php
include_once("config/connection.php");

if(isset($_POST['save'])){
    $unit_name = $_POST['unit_name'];


    $sql = "INSERT INTO tb_unit (unit_name) VALUES ('$unit_name')";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'Document added successfully';
        header('location: unitprice.php');
    }
    
    else{
        $_SESSION['error'] = 'can not add Document';
        header('location: unitprice.php');
    }
}
else{
    $_SESSION['error'] = 'Fill up add form Document';
  
}

?>


<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div style="text-align: center; padding-top:10px;">
				<div>
					<h3>ເພີ່ມຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ</h3>
				</div>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
                    <form method="POST" action="unit-add.php" style="font-size: 15px;">
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <p>ຊື່ຫົວໜ່ວຍສິນຄ້າ</p>
                                    <input type="text" name="unit_name" class="form-control" required />
                                </div>
                            </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
                        <!-- <button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> ບັນທຶກ</button> -->
                        <input type="submit" name="save" value="ບັນທຶກ" class="btn btn-primary"/>
                        </div>
                    </form>
			    </div>
			</div>
		</div>
	</div>
</div>
