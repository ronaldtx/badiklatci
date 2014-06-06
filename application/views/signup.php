<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

	<div class="span12">
	<ul class="breadcrumb">
		<li><a href="#">Home</a> <span class="divider">/</span></li>
		<li><a href="#">Account</a> <span class="divider">/</span></li>
		<li class="active"><a href="#">Sign up</a></li>
	</ul>
	</div>

			<div class="span12">
				<h1>Pembuatan Akun Baru</h1>
				
				<br />				
				<form class="form-horizontal">
					<fieldset>
					<div class="span6 no_margin_left">
						<legend>Data Pribadi</legend>
					  <div class="control-group">
						<label class="control-label">Nama Depan</label>
						<div class="controls docs-input-sizes">
						  <input type="text" placeholder="" class="span4">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label">Nama Belakang</label>
						<div class="controls docs-input-sizes">
						  <input type="text" placeholder="" class="span4">
						</div>
					  </div>					  
					  <div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls docs-input-sizes">
						  <input type="text" placeholder="" class="span4">
						</div>
					  </div>					 

					  <div class="control-group">
						<label class="control-label">Telepon</label>
						<div class="controls docs-input-sizes">
						  <input type="text" placeholder="" class="span4">
						</div>
					  </div>
					  </div>
					  <div class="span6">
						<legend>Alamat</legend>
					  	<div class="control-group">
							<label class="control-label">Alamat 1</label>
							<div class="controls docs-input-sizes">
							  	<input type="text" placeholder="" class="span4">
							</div>
					  	</div>
					  	<div class="control-group">
							<label class="control-label">Alamat 2</label>
							<div class="controls docs-input-sizes">
							  	<input type="text" placeholder="" class="span4">
							</div>
					  	</div>					  
					  	<div class="control-group">
							<label class="control-label">Kota</label>
							<div class="controls docs-input-sizes">
						  		<input type="text" placeholder="" class="span4">
							</div>
					  	</div>
					  	<div class="control-group">
							<label class="control-label">Kode Pos</label>
							<div class="controls docs-input-sizes">
						  		<input type="text" placeholder="" class="span4">
							</div>
					  	</div>					  
					  	</div>
					  
					<div class="span12 no_margin_left">
					<legend>Informasi Login</legend>
					<div class="span6 no_margin_left">
					  <div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls docs-input-sizes">
						  <input type="text" placeholder="" class="span4">
						</div>
					  </div>					 
					  </div>					 
<div class="span6">
					  <div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls docs-input-sizes">
						  <input type="text" placeholder="" class="span4">
						</div>
					  </div>					  
					  <div class="control-group">
						<label class="control-label">Confirm password</label>
						<div class="controls docs-input-sizes">
						  <input type="text" placeholder="" class="span4">
						</div>
					  </div>
					</div>

					  
					  

					  
					  </div>

					
				<div class=" span12 no_margin_left">
					<hr>
					<div class="span8">
						<input type="checkbox" value="option1" name="optionsCheckboxList1"> I have read and agree to the Privacy Policy<br />
						<input type="checkbox" value="option2" name="optionsCheckboxList2"> Subscribe to our newsletter
						
					 </div>
					 <div class="span3"><button class="btn btn-primary btn-large pull-right" type="submit">Register</button></div>
					 <hr>
          </div></fieldset>
				  </form>
	  
			</div>
		
		<hr />

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('footer');
?>