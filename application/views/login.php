		<div id="content-mid">
			<div class="col-md-3">

			</div>
			<div class="col-md-6">
				<div class="col-md-12">

				</div>
				<div id="form" class="col-md-12" style="padding-top:100px;">
					<div class="jumbotron">
					  <h2 style="text-align:center;">Login to Connect!</h2>
					  	<?php
					  		if($this->session->flashdata('error')){
	                            echo '<p class="bg-danger"><b>'.$this->session->flashdata('error').'</b></p>';
	                        }
					  	?>
						<form action="<?php echo site_url('login');?>" method="post">
						  <div class="form-group">
						    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
						  </div>
						  <div class="form-group">
						    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
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
				<div class="col-md-12">
					
				</div>
			</div>
			<div class="col-md-3" style="color:blue;height:400px">

			</div>
		</div>