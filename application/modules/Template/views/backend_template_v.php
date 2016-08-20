<!DOCTYPE html>
<html>
<head>

	<title>Oval Dental System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="<?= @$this->config->item('assets_url'); ?>backend/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="<?= @$this->config->item('assets_url'); ?>backend/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="<?= @$this->config->item('assets_url'); ?>backend/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- jQuery -->
	<!-- <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	lined-icons
	<link rel="stylesheet" href="<?= @$this->config->item('assets_url'); ?>backend/css/icon-font.min.css" type='text/css' /> -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300' rel='stylesheet' type='text/css'>
	<?= @$css; ?>
	<style type="text/css">
		body
		{
			font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
		}
		.control-label
		{
			line-height: 1px !important;
		}

		.table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
		{
			color: rgb(119, 119, 119);
		}

		a
		{
			cursor: pointer;
		}
		table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
			vertical-align: middle;
		}
	</style>
</head>
<body>
	<div class = "page-container">
		<div class = "left-content">
			<div class = "inner-content">
				<div class = "header-section">
					<div class = "top_menu">
						<div class = "main-search">
							<form>
								<input type="text" value = "search" name="" class = "text">
							</form>
							<div class="close"><img src="<?= @$this->config->item('assets_url'); ?>backend/images/cross.png"></div>
						</div>
						<div class="srch"><button></button></div>
						<div class="profile_details_left">
							<ul class = "notifications-dropdown">
								<li class = "dropdown note">
									<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" aria-expanded = "false"><i class = "fa fa-bell-o"></i> <span class="badge">3</span></a>
									<ul class = "dropdown-menu two first">
										<li class="notification-header">
											<div class="notification_header">
												<h3>You have 0 messages</h3>
											</div>
										</li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all messages</a>
											</div> 
										</li>
									</ul>
								</li>
								<div class="clearfix"></div>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>

				<div class = "outter-wp">
					<?= @$this->load->view($content_view); ?>
				</div>
			</div>
		</div>

		<div class = 'sidebar-menu'>
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="<?= @base_url('Dashboard'); ?>"> <span id="logo"> <h1>Oval Dental</h1></span> 
				<!--<img id="logo" src="" alt="Logo"/>--> 
				</a> 
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)">
				<?= @$sidebar; ?>
			</div>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id = "generalModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<p>One fine body&hellip;</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn red" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script src="<?= @$this->config->item('assets_url'); ?>backend/js/jquery-1.10.2.min.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>backend/js/jquery.nicescroll.js"></script>
	<script src="<?= @$this->config->item('assets_url'); ?>backend/js/bootstrap.min.js"></script>
	<?= @$js; ?>
	<?= @$javascript; ?>
	<script src="<?= @$this->config->item('assets_url'); ?>backend/custom/custom.js"></script>
</body>
</html>