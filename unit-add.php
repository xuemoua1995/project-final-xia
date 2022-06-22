<!-- Add New -->
<?php
include("config/connection.php");

if(isset($_POST['save'])){
    $unit_name = $_POST['unit_name'];

    $sql = "INSERT INTO tb_unit (unit_name) VALUES ('$unit_name')";
    // $res = mysqli_query($conn, $sql);
    // $unit_name ="";
    if(mysqli_query($conn, $sql)){
        echo "<script>('add data successfully!')</script>";
        $unit_name = "";
        header("Location: unitprice.php");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);
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
