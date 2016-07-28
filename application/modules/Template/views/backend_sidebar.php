<div class = "down">
	<a href = "<?= @base_url('Dashboard'); ?>"><img src="<?= @$this->config->item('assets_url'); ?>backend/images/admin.jpg"></a>
	<a href = "<?= @base_url('Dashboard'); ?>"><span class = "name-caret">Test User</span></a>
	<p>User Role</p>
	<ul>
		<li><a class="tooltips" href="<?= @base_url('Dashboard'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
		<li><a class="tooltips" href="<?= @base_url('Dashboard'); ?>"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
		<li><a class="tooltips" href="<?= @base_url('Dashboard'); ?>"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
	</ul>
</div>
<div class = "menu">
	<ul id = "menu">
		<li><a href = "#"><i class = "fa fa-tachometer"></i> <span>Dashboard</span></a></li>
		<?= @$sidebar_items; ?>
	</ul>
</div>