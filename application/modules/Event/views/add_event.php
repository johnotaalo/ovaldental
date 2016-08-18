<?php
	$event_title = $event_description = $event_duration = $page_title = $form_link = "";

	$page_title = "Add a New Event";

	$form_link = 'Event/addEvent';

	$button_name = "Add Event";

	if (isset($event_details)) {
		$event_title = $event_details->event_title;
		$event_description = $event_details->event_description;

		$event_from = date('m/d/Y h:i A', strtotime($event_details->event_from_date));
		$event_to = date('m/d/Y h:i A', strtotime($event_details->event_to_date));

		$event_duration = $event_from .' - '. $event_to;

		$form_link = 'Event/editEvent/' . $event_details->id;
		$page_title = "Editting Event: {$event_title}";
		$button_name = "Save Changes";
	}
?>
<h2><?= @$page_title; ?></h2>

<form class="" method="POST" action = "<?php echo base_url($form_link); ?>">
	<div class="form-group">
		<label for = "event_title">Event Title</label>
		<input type="text" name="event_title" class="form-control" value = "<?= @$event_title; ?>">
	</div>

	<div class = "form-group">
		<label for = "event_type">Event Type</label>
		<select id = "event_types" class="form-control" name = "event_type"></select>
	</div>

	<div class = "form-group">
		<label for = "event_description">Event Description</label>
		<textarea rows = "8" class = "form-control" name = "event_description"><?= @$event_description; ?></textarea>
	</div>

	<div class="form-group">
		<label for = "event_date_from">Event Duration</label>
		<input type="text" name="event_duration" class = "form-control" value="<?= @$event_duration; ?>">
	</div>

	<div class="form-group">
		<button class="btn btn-primary"><?= @$button_name; ?></button>
	</div>
</form>