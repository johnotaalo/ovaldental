<div class = "panel-header">
	<h2>Users List</h2>
</div>
<div class = "panel-body">
	<div class = "row">
		<div class = "col-md-12">
			<div class = "pull-left">
				<div class = "form-group">
					<label>Filter by User Type</label>
					<select name = "user_types" class = "form-control1" id = "user_types_select">
						<?= @$user_types_select; ?>
					</select>
				</div>
			</div>
			<div class = "pull-right">
				<a href = "<?= @base_url('Account/createuser'); ?>" class = "btn btn-primary">Add User</a>
			</div>
		</div>
	</div>
	<table class = "table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>User Type</th>
				<th>Email Address</th>
				<th>Phone Number</th>
				<th>Last Login</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>