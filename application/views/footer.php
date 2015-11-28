		<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Daftar Baru</h4>
		      </div>
		      <div class="modal-body">
		      	<form>
		      		<div class="form-group" method="post" action="#">
					    <input type="text" class="form-control" id="username" placeholder="Email atau No HP">
					</div>
					<div class="form-group">
					    <input type="password" class="form-control" id="pass" placeholder="Password">
					</div>
				  	<div class="form-group">
					    <input type="password" class="form-control" id="re_pass" placeholder="Konfirmasi Password">
					</div>
					
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
		      </div>
		    </div>
		  </div>
		</div><!--END OF MODAL-->

		<div style="clear:both">

		</div>
		<div id="content-bottom">
			<div id="footer">

			</div>
		</div>
	</body>
	<script>
		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').focus()
		})
	</script>>

</html>