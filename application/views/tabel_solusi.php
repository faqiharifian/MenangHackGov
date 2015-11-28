<div id="content-mid">
			<div class="col-md-12" style="clear:both">

			</div>
			<div id="main_content" class="col-md-9">
				<div class="col-md-12">
					<div class="tabel_solusi">
						<p class="title_solusi" style="font-size:20px;">Ini adalah judul untuk Satu solusi</p>
						<p class="perusahaan_solusi">oleh perusahaan solusi</p>
						<p class="deskripsi_solusi">
							Tahapan-tahapan yang harus dipenuhi untuk "Ini adalah judul untuk satu solusi" adalah sebagai berikut 
						</p>
						<table class="table table-hover table-bordered">
						<thead>
							<th>No</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Status</th>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Membuat surat pernyataan RT dan RW</td>
								<td><a href="#" data-imgsource="<?php echo base_url('assets/image/bg.jpg');?>" data-toggle="modal" data-target="#myModalGambar">Lihat Gambar</a></td>
								<td><span class="label label-success">Diterima</span></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Membuat surat pernyataan Kelurahan</td>
								<td><a href="#" data-toggle="modal" data-target="#myModalGambar">Lihat Gambar</a></td>
								<td><span class="label label-info">Dalam proses</span></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Membuat surat pernyataan Kecamatan</td>
								<td><a href="#" data-toggle="modal" data-target="#myModalUpload">Upload Gambar</a></td>
								<td><span class="label label-danger">Ditolak</span></td>
							</tr>
							<tr>
								<td>4</td>
								<td>Membuat surat pernyataan Walikota</td>
								<td><a href="#" data-toggle="modal" data-target="#myModalUpload">Upload Gambar</a></td>
								<td><span class="label label-warning">Belum upload</span></td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-12">

				</div>
			</div>
			<div class="col-md-3 side_menu" style="margin-top:30px;">
				<h4>Cari apa yang Anda perlukan</h4>
				<form class="form-inline col-md-12 col-sm-12" action="#" method="post">
					<div class="form-group col-md-10">
						<input type="text" class="form-control" style="width:100%"id="search" placeholder="Masukkan yang Anda cari" name="search">
				  	</div>
				  	<button type="submit" class="btn btn-primary col-md-2">Cari!</button>
				</form>
			</div>
			<div class="col-md-3 side_menu">
				<h4>Anda belum login</h4>
				<form>
				  <div class="form-group">
				    <input type="text" class="form-control" id="username" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="password" placeholder="Password">
				  </div>
				  <div class="form-group">
				  	<div class="col-md-8">
				  		<a href="#" data-toggle="modal" data-target="#myModal">Daftar Baru</a></p>

				  	</div>
				  	
				    <button type="submit" class="btn btn-primary pull-right col-md-4">Login</button>
				  </div>
				  
				</form>
			</div>
		</div>


		<div class="modal fade" id="myModalGambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Lihat Gambar</h4>
		      </div>
		      <div class="modal-body">
		      		<img class="imageModal" src="" />
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		      </div>
		    </div>
		  </div>
		</div><!--END OF MODAL LIHAT GAMBAR-->


		<div class="modal fade bs-example-modal-sm" id="myModalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Upload Gambar</h4>
		      </div>
		      <div class="modal-body">
		      		<form action="#" method="post" enctype="multipart/form-data">
		      			<input type="file" name="uploadGambar" id="uploadGambar"></input>
		      		</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		      </div>
		    </div>
		  </div>
		</div><!--END OF MODAL UPLOAD GAMBAR-->

		<script>
			$('#myModalGambar').on('shown.bs.modal', function () {
			  $('#myInput').focus()
			})

			
			$('#myModalGambar').on('show.bs.modal', function(e) {
				var img = $(e.relatedTarget).data('imgsource');
			    //alert(img);
			    $('.imageModal').attr('src', img);

			    $(this).find('.modal-body').css({
	              width:'auto', //probably not needed
	              height:'auto', //probably not needed 
	              'max-height':'100%'
	      		 });
			});

			$('#myModalUpload').on('shown.bs.modal', function () {
			  $('#myInput').focus()
			})
			
		</script>