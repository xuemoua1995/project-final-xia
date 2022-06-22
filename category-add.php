<!-- Add New -->
<?php
include("config/connection.php");

if(isset($_POST['save'])){
    $name = $_POST['typename'];

    $sql = "INSERT INTO tb_ProductType (typename) VALUES ('$name')";
    // $res = mysqli_query($conn, $sql);
    // $unit_name ="";
    if(mysqli_query($conn, $sql)){
        header("Location:category.php");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
        header("Location:category.php");
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
					<h3>ເພີ່ມຂໍ້ມູນປະເພດສິນຄ້າ</h3>
				</div>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="category-add.php" style="font-size: 15px;">
                         <div class="form-row">
                              <div class="col-12 mb-3">
                                   <p>ຊື່ປະເພດສິນຄ້າ</p>
                                   <input type="text" name="typename" class="form-control" required />
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