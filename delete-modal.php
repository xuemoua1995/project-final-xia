<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div style="text-align: center; padding-top:10px;">
				<div>
					<h4>ລຶບຂໍ້ມູນ</h4>
				</div>
			</div>
			<div class="modal-body">
				<p class="text-center">ທ່ານຕ້ອງການລຶບບໍ?</p>
				<h2 class="text-center"></h2>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ຍົກເລີກ</button>
				<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ຕົກລົງ</a>
			</div>

		</div>
	</div>
</div>