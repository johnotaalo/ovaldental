<style type="text/css">
	#image-preview {
		width: 400px;
		height: 150px;
		margin-left: 30px;
		position: relative;
		overflow: hidden;
		background-color: #ffffff;
		color: #ecf0f1;
	}
	input#image-upload {
		line-height: 100px;
		font-size: 200px;
		position: absolute;
		opacity: 0;
		z-index: 10;
	}
	label#image-label {
		position: absolute;
		z-index: 5;
		opacity: 0.8;
		cursor: pointer;
		background-color: #bdc3c7;
		width: 200px;
		height: 50px;
		font-size: 15px;
		line-height: 50px;
		text-transform: uppercase;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		text-align: center;
	}
</style>
<h3 class = "inner-title">Add Insurance Company</h3>
<div class = "main-grid3">
	<form class = "form-horizontal" method="POST" action="<?php echo base_url('Settings/Insurance/addCompany'); ?>" enctype = "multipart/form-data">
		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Company Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" id="focusedinput" placeholder="Company Name" name = "company_name" required>
			</div>
			<div class="col-sm-2">
				<p class="help-block"></p>
			</div>
		</div>

		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Phone Number</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" id="focusedinput" placeholder="Phone Number" name = "company_main_contact" required>
			</div>
			<div class="col-sm-2">
				<p class="help-block"></p>
			</div>
		</div>

		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Alternate Phone Number</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" id="focusedinput" placeholder="Alternate Phone Number" name = "company_alternate_contact">
			</div>
			<div class="col-sm-2">
				<p class="help-block"></p>
			</div>
		</div>

		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Email Address</label>
			<div class="col-sm-8">
				<input type="email" class="form-control1" id="focusedinput" placeholder="Email Address" name = "company_main_email" required>
			</div>
			<div class="col-sm-2">
				<p class="help-block"></p>
			</div>
		</div>

		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Alternate Email Address</label>
			<div class="col-sm-8">
				<input type="email" class="form-control1" id="focusedinput" placeholder="Alternate Email Address" name = "company_alternate_email">
			</div>
			<div class="col-sm-2">
				<p class="help-block"></p>
			</div>
		</div>

		<div class="form-group">
			<div class = "col-sm-2"></div>
			<div class = "col-sm-8">
				<div id="image-preview">
					<div class = "col-sm-2"></div>
					<label for="image-upload" id="image-label">Upload Company Logo</label>
					<input type="file" name="image" id="image-upload" required />
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<button class = "btn blue">Add Company</button>
			</div>
		</div>
	</form>
</div>