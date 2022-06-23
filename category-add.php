<!-- Add New -->
<?php
include_once("config/connection.php");

if(isset($_POST['save'])){
    $typename = $_POST['typename'];


    $sql = "INSERT INTO tb_ProductType (typename) VALUES ('$typename')";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = ' Add category successfully';
        header("Location:category.php");
    }
    
    else{
        $_SESSION['error'] = 'can not add category';
        header("Location:category.php");
    }
}
else{
    $_SESSION['error'] = 'Fill up add form category';
}

?>
<div class="modal fade" id="addnewcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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