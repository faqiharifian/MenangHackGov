		<div id="content-mid">
			<div class="col-md-12" style="clear:both">
			</div>
			<div id="main_content" class="col-md-9">
				<div class="col-md-12">
					<div class="list_solusi">
						<p style="font-size:16px;">Hasil untuk "kata kunci" xx records</p>
					</div>
					<?php
						if(!empty($solusi)){
							foreach ($solusi as $key => $item) {
								echo '<div class="list_solusi">';
								echo '<p class="title_solusi"><a href="'.site_url('solusi/'.$item->id).'">'.$item->judul.'</a></p>';
								echo '<p class="perusahaan_solusi">oleh perusahaan solusi</p>';
								echo '<p class="deskripsi_solusi">
									'.$item->deskripsi.'
									<a href="'.site_url('solusi/'.$item->id).'">baca selengkapnya...</a>
								</p></div>';
							}
						}else{
							echo '<div class="list_solusi">';
							echo '<p style="font-size:16px;">Tidak Ada Hasil yang sesuai</p>';
							echo '</div>';
						}
					?>
					
					<div class="list_solusi">
						<p>Tidak temukan solusi?<a href="<?=site_url('masalah/create')?>"> Click disini</a></p>
					</div>
				</div>
				<div class="col-md-12">

				</div>
			</div>
			<div class="col-md-3 side_menu" style="margin-top:30px;">
				<h4>Cari apa yang Anda perlukan</h4>
				<form class="form-inline col-md-12 col-sm-12" action="<?php echo site_url('solusi');?>" method="get">
					<div class="form-group col-md-10">
						<input type="text" class="form-control" style="width:100%"id="search" placeholder="Masukkan yang Anda cari" name="q">
				  	</div>
				  	<button type="submit" class="btn btn-primary col-md-2">Cari!</button>
				</form>
			</div>
			<?php
				if(!$this->session->userdata('logged_in')){
					echo '
					<div class="col-md-3 side_menu">
						<h4>Anda belum login</h4>
						<form action="'.site_url('login').'" method="post">
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
					';
				}

			?>
		</div>
		<!--END of CONTENT-MID-->