<?php
	$username = "";
	$error = "";
	if ($this->session->flashdata('error')) {
		$error = $this->session->flashdata('error');
		$username = $this->session->flashdata('username');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Oval Dental Authentication</title>
	<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo $this->config->item('assets_url'); ?>backend/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="<?php echo $this->config->item('assets_url'); ?>backend/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="<?php echo $this->config->item('assets_url'); ?>backend/css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="<?php echo $this->config->item('assets_url'); ?>backend/css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="<?php echo $this->config->item('assets_url'); ?>backend/js/jquery-1.10.2.min.js"></script>
	<!--clock init-->

	<style type="text/css">
		body
		{
			font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
			overflow: visible !important;
		}
	</style>
</head>
<body>
	<div class="error_page">
		<div class="error-top">
			<h2 class="inner-tittle page">Oval Dental</h2>
			<div class="login">
				<h3 class="inner-tittle t-inner">Login</h3>
				<form method="POST" action="<?php echo base_url(); ?>Account/Auth/signin">
					<input type="text" class="text" placeholder="E-mail address" value = "<?php echo $username;?>" name = "email_address">
					<input type="password" name = "password" placeholder="Password">
					<div class="submit">
						<input type="submit" value="Login" >
					</div>
					<div class="clearfix"></div>
					<div class="new">
						<p><label class="checkbox11"><input type="checkbox" name="checkbox"><i> </i>Forgot Password ?</label></p>
						<div class="clearfix"></div>
					</div>
					<span style="color: red;"><?= @$error; ?></span>
				</form>
			</div>
		</div>

	</div>
</body>

<script src="<?php echo $this->config->item('assets_url'); ?>backend/js/jquery.nicescroll.js"></script>
<script src="<?php echo $this->config->item('assets_url'); ?>backend/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $this->config->item('assets_url'); ?>backend/js/bootstrap.min.js"></script>
</html>