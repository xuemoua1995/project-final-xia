<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");
?>

<div class="main-content">
    <section class="section">
      <div class="section-body">   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>ຂໍ້ມູນໂປຣຟາຍ</h4>
              </div>
             
              <div class="container-fluid">
					<form method="POST" action="" style="font-size: 15px;">
                         <div class="form-row">
                              <div class="col-12 mb-3">
                                   <p>ຊື່ເຕັມ</p>
                                   <input type="text" name="full_name" class="form-control" required />
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ວັນເດືອນປີເກີດ</p>
                                   <input type="date" name="birthday" class="form-control" required />
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ເພດ</p>
                                   <input type="checkbox" name="gender[]" value="ຍິງ" /> ຍິງ
                                   <input type="checkbox" name="gender[]" value="ຊາຍ" /> ຊາຍ
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ທີ່ຢູ່</p>
                                   <input type="text" name="address" class="form-control" required />
                              </div>
                              <div class="col-12 mb-3">
                                   <p>ເບີໂທ</p>
                                   <input type="number" name="phone" class="form-control" required />
                              </div>
                         </div>
				</div>
                    <div class="modal-footer">
				<!-- <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button> -->
				<button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> ບັນທຶກ</a>
				</form>
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
