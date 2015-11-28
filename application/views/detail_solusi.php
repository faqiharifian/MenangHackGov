		<div id="content-mid">
			<div class="col-md-12" style="clear:both">

			</div>
			<div id="main_content" class="col-md-9">
				<div class="col-md-12">
					<div class="detail_solusi">
						<p class="title_solusi" style="font-size:20px;"><?=$masalah->judul?></p>
						<p class="perusahaan_solusi">oleh perusahaan solusi</p>
						<p class="deskripsi_solusi">
							<?=$masalah->deskripsi?>
						</p>
						<form action="<?=site_url('solusi/'.$masalah->id)?>" method="post">
				            <button type="submit" class="btn btn-primary"name="permintaan" value="<?=$this->session->id?>">Kirim Permintaan</button>
				        </form>
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
