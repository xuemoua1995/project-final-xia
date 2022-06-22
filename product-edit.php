<!-- Add New -->

<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";

include_once("config/connection.php");
$id=$_REQUEST['id'];
$query = "SELECT * from tb_ProductItem where id='".$id."'"; 
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
                <h4>ແກ້ໄຂຂໍ້ມູນສິນຄ້າ</h4>
              </div>
              <div class="container-fluid">
               
              <?php
              $typename  = mysqli_query($conn, "SELECT DISTINCT typename FROM tb_ProductType");
               $status = "";
               if(isset($_POST['new']) && $_POST['new']==1)
               {
               $id=$_REQUEST['id'];
               $name =$_REQUEST['name'];
               $barcode =$_REQUEST['barcode'];
               $typename =$_REQUEST['typename'];
               $buy_price =$_REQUEST['buy_price'];
               $sale_price =$_REQUEST['sale_price'];
               
               $update="UPDATE tb_ProductItem set name='".$name."',
               barcode='".$barcode."', typename='".$typename."',
               buy_price='".$buy_price."', sale_price='".$sale_price."' where id='".$id."'";
             
               mysqli_query($conn, $update) or die(mysqli_error());
               $status = "ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ. </br></br>
               <a href='product.php' class='btn btn-primary'>ກັບໄປເບິ່ງຂໍ້ມູນທີ່ແກ້ໄຂແລ້ວ</a>";
               echo '<p style="color:blue;">'.$status.'</p>';
               
               }else {
               ?>
		    <form method="POST" action="product-edit.php" style="font-size: 15px;">
                    <div class="form-row">
                         <div class="col-12 mb-3">
                              <input type="hidden" name="new" value="1" />
                              <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ຊື່ສິນຄ້າ</p>
                              <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control"   required/>
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນຊື່ສິນຄ້າ
                              </div>
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ລະຫັດບາໂຄດ</p>
                              <input type="text" name="barcode" value="<?php echo $row['barcode'];?>" class="form-control"   required/>
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນລະຫັດບາໂຄດ
                              </div>
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ຊື່ປະເພດສິນຄ້າ</p>
                              <select name="typename" id="" class="form-control" required>
                              <option>ກະລຸນາເລືອກປະເພດສິນຄ້າກ່ອນ</option>
                              <?php foreach($typename as $rows):?>
                              <option value="<?php echo $rows['typename']; ?>"<?php if($row['typename'] == $rows['typename']) echo 'selected="selected"'; ?>><?php echo $rows['typename']; ?></option>
                              <?php endforeach;?>
                              </select>
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ລາຄາຊື້</p>
                              <input type="text" name="buy_price" value="<?php echo $row['buy_price'];?>" class="form-control"  required />
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນລາຄາຊື້
                              </div>
                         </div>
                         <div class="col-12 mb-3">
                              <p style="font-size:15px">ລາຄາຂາຍ</p>
                              <input type="text" name="sale_price" value="<?php echo $row['sale_price'];?>" class="form-control" required />
                              <div class="invalid-feedback" style="font-size:15px">
                              ກະລຸນາປ້ອນລາຄາຂາຍ
                              </div>
                         </div>
                    </div>
				</div>
                    <div class="modal-footer">
				<a href="product.php" type="button" style="font-size:15px" class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</a>
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
