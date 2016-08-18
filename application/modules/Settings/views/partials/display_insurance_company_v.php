<div class = "p-20">
	<div class="about-info-p">
		<strong>Company Name</strong>
		<br/>
		<p class = "text-muted"><?= @$company_details->company_name; ?></p>
	</div>

	<div class="about-info-p">
		<strong>Phone Number</strong>
		<br/>
		<p class = "text-muted"><?= @$company_details->company_main_contact; ?></p>
	</div>


	<div class="about-info-p">
		<strong>Alternate Phone Number</strong>
		<br/>
		<p class = "text-muted"><?= @$company_details->company_alternate_contact; ?></p>
	</div>


	<div class="about-info-p">
		<strong>Email Address</strong>
		<br/>
		<p class = "text-muted"><?= @$company_details->company_main_email; ?></p>
	</div>

	<div class="about-info-p">
		<strong>Alternate Email Address</strong>
		<br/>
		<p class = "text-muted"><?= @$company_details->company_alternate_email; ?></p>
	</div>

	<div class="about-info-p">
		<img src="<?= @$company_details->company_logo; ?>" style = "max-width: 100%;";/>
	</div>
</div>