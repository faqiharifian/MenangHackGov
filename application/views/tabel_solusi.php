		<div id="content-mid">
			<div class="col-md-12" style="clear:both">

			</div>
			<div id="main_content" class="col-md-9">
				<div class="col-md-12">
					<div class="tabel_solusi">
						<p class="title_solusi" style="font-size:20px;"><?=$masalah->judul?></p>
						<p class="perusahaan_solusi">oleh perusahaan solusi</p>
						<p class="deskripsi_solusi">
							<?=$masalah->deskripsi?>
						</p>
						<table class="table table-hover table-bordered">
						<thead>
							<th>No</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Status</th>
						</thead>
						<tbody>
							<!-- <tr>
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
							</tr> -->
							<?php
							foreach ($solusi as $key => $value) {
								echo '<tr>
									<td>'.($key+1).'</td>
									<td>'.$value->deskripsi.'</td>
									<td><a href="#" data-imgsource="'.base_url($value->gambar).'" data-toggle="modal" '.($value->status <= 1 ? 'data-target="#myModalUpload"' : 'data-target="#myModalGambar"').' >'.($value->status <= 1 ? 'Upload Gambar' : 'Lihat Gambar').'</a></td>
									<td>';
								if($value->status == 0){
									echo '<span class="label label-danger">Ditolak</span>';
								}else if($value->status == 1){
									echo '<span class="label label-warning">Belum upload</span>';
								}else if($value->status == 2){
									echo '<span class="label label-info">Dalam proses</span>';
								}else{
									echo '<span class="label label-success">Diterima</span>';
								}
								echo '</td>
								</tr>';
							}
							?>
						</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-12 panel_komentar">
					<div id="disqus_thread"></div>
					<script>
					    /**
					     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
					     */
					    /*
					    var disqus_config = function () {
					        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
					        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					    };
					    */
					    (function() {  // DON'T EDIT BELOW THIS LINE
					        var d = document, s = d.createElement('script');
					        
					        s.src = '//konekin.disqus.com/embed.js';
					        
					        s.setAttribute('data-timestamp', +new Date());
					        (d.head || d.body).appendChild(s);
					    })();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
			
				</div><!--HERE-->
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
