<!-- Add New -->


<?php

include_once("config/connection.php");

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $barcode = $_POST['barcode'];
    $typename = $_POST['typename'];
    $qty = $_POST['qty'];
    $buy_price = $_POST['buy_price'];
    $sale_price = $_POST['sale_price'];


    $sql = "INSERT INTO tb_ProductItem (name, barcode, typename, qty, buy_price, sale_price) VALUES ('$name', '$barcode', '$typename', '$qty', '$buy_price','$sale_price')";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'Document added successfully';
        header('location: product_import.php');
    }
    
    else{
        $_SESSION['error'] = 'can not add Document';
        header('location: product_import.php');
    }
}
else{
    $_SESSION['error'] = 'Fill up add form Document';
}

?>
<div class="modal fade" id="addnewproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div style="text-align: center; padding-top:10px;">
				<div>
					<h3>ເພີ່ມຂໍ້ມູນສິນຄ້າ</h3>
				</div>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
                    <form method="POST" action="product-add-import.php" style="font-size: 15px;">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ຊື່ສິນຄ້າ</p>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ລະຫັດບາໂຄດ</p>
                                <input type="text" name="barcode" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ຊື່ປະເພດສິນຄ້າ</p>
                                <select name="typename" id="" class="form-control" required>
                                   <option>ກະລຸນາເລືອກປະເພດສິນຄ້າກ່ອນ</option>
                                    <?php 
                                    $types = mysqli_query($conn, "SELECT * FROM tb_ProductType");
                                    foreach ($types as $type) {
                                    ?>
                                        <option><?php echo $type['typename']; ?> </option>
                                        <?php 
                                        }
                                    ?>
                                   </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ຈຳນວນ</p>
                                <input type="text" name="qty" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ລາຄາຊື້</p>
                                <input type="text" name="buy_price" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <p>ລາຄາຂາຍ</p>
                                <input type="text" name="sale_price" class="form-control" required />
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