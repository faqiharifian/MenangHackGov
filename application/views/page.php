<html>
	<head>
		<title>HackGov</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css"></link>
		
		<script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
	</head>
	<body class="body">
		<div id="content-up">
			<div id="header">
				<h1>Connect!</h1>
			</div>
		</div>

		<div id="content-mid">
			<div class="col-md-12" style="clear:both">

			</div>
			<div id="main_content" class="col-md-9">
				<div class="col-md-12">
					<div class="list_solusi">
						<p style="font-size:16px;">Hasil untuk "kata kunci" xx records</p>
					</div>
					<div class="list_solusi">
						<p class="title_solusi">Ini adalah judul untuk Satu solusi</p>
						<p class="perusahaan_solusi">oleh perusahaan solusi</p>
						<p class="deskripsi_solusi">
							Ini adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusi
							<a href="#">baca selengkapnya...</a>
						</p>
					</div>
					<div class="list_solusi">
						<p class="title_solusi">Ini adalah judul untuk Satu solusi</p>
						<p class="perusahaan_solusi">oleh perusahaan solusi</p>
						<p class="deskripsi_solusi">
							Ini adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusi
							<a href="#">baca selengkapnya...</a>
						</p>
					</div>
					<div class="list_solusi">
						<p class="title_solusi">Ini adalah judul untuk Satu solusi</p>
						<p class="perusahaan_solusi">oleh perusahaan solusi</p>
						<p class="deskripsi_solusi">
							Ini adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusi
							<a href="#">baca selengkapnya...</a>
						</p>
					</div>
					<div class="list_solusi">
						<p class="title_solusi">Ini adalah judul untuk Satu solusi</p>
						<p class="perusahaan_solusi">oleh perusahaan solusi</p>
						<p class="deskripsi_solusi">
							Ini adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusiIni adalah deskripsi solusi
							<a href="#">baca selengkapnya...</a>
						</p>
					</div>
					<div class="list_solusi">
						<p>Tidak temukan solusi?<a href="#"> Click disini</a></p>
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