<div class = "panel-heading"><h3><?php if(!isset($user_details)) { ?>Add a User <?php } else { ?> Editting User: <?php echo $user_details->staff_firstname . " " . $user_details->staff_lastname;} ?></h3></div>
<div class = "panel-body">
	<div class = "form-body">
		<form method = "POST" name = "" action="<?= @(!isset($user_details)) ? base_url('Account/adduser') : base_url('Account/edituser/' . $user_details->uuid); ?>" class = "form-horizontal">
			<div class = "form-group">
				<label for = "staff_firstname" class = "col-sm-2 control-label">First Name</label>
				<div class = "col-sm-8">
					<input type = "text" class = 'form-control' id = 'staff_firstname' name = 'staff_firstname' placeholder="First Name" value = "<?php echo (isset($user_details)) ? $user_details->staff_firstname : "";?>" required>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class = "form-group">
				<label for = "staff_lastname" class = "col-sm-2 control-label">Last Name</label>
				<div class = "col-sm-8">
					<input type = "text" class = 'form-control' id = 'staff_lastname' name = 'staff_lastname' placeholder="Last Name" value = "<?php echo (isset($user_details)) ? $user_details->staff_lastname : "";?>" required>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class = "form-group">
				<label for = "staff_othernames" class = "col-sm-2 control-label">Other Names</label>
				<div class = "col-sm-8">
					<input type = "text" class = 'form-control' id = 'staff_othernames' name = 'staff_othernames' placeholder="Other Names" value = "<?php echo (isset($user_details)) ? $user_details->staff_othernames : "";?>">
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class = "form-group">
				<label for = "staff_phonenumber" class = "col-sm-2 control-label">Phone Number</label>
				<div class = "col-sm-8">
					<input type = "text" class = 'form-control' id = 'staff_phonenumber' name = 'staff_phonenumber' placeholder="Phone Number" value = "<?php echo (isset($user_details)) ? $user_details->staff_phonenumber : "";?>" required>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class = "form-group">
				<label for = "staff_emailaddress" class = "col-sm-2 control-label">Email Address</label>
				<div class = "col-sm-8">
					<input type = "email" class = 'form-control' id = 'staff_emailaddress' name = 'staff_emailaddress' placeholder="Email Address" value = "<?php echo (isset($user_details)) ? $user_details->staff_emailaddress : "";?>" required>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class = "form-group">
				<label for = "staff_gender" class = "col-sm-2 control-label">Gender</label>
				<div class = "col-sm-8">
					<select class = 'form-control1' id = 'staff_gender' name = 'staff_gender' required>
						<option value = "">Please select a gender...</option>
						<?= @$genders; ?>
					</select>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class = "form-group">
				<label for = "staff_user_type" class = "col-sm-2 control-label">Designation</label>
				<div class = "col-sm-8">
					<select class = 'form-control1' id = 'staff_user_type' name = 'staff_user_type' required>
						<option value = "">Please select a designation...</option>
						<?= @$user_types; ?>
					</select>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class = "form-group">
				<div class = "col-sm-2"></div>
				<div class = "col-sm-8">
					<?php if(!isset($user_details)) : ?>
						<input type = "submit" class = "btn btn-primary" value = "Create User">
					<?php else: ?>
						<input type = "submit" class = "btn btn-primary" value = "Edit User">
					<?php endif; ?>
				</div>
			</div>
		</form>
	</div>
</div>