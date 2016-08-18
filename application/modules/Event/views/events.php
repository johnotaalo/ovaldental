<div class = "panel panel-default">
	<div class = "panel-heading">
		<h3 class="panel-title">Showing Events</h3>
	</div>
	<div class="panel-body">
		<div class = "row">
			<a href="<?php echo base_url('Event/addEvent');?>" class = "btn blue pull-right">Add Event</a>
		</div>
		<table id = "events_table" class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Event Title</th>
					<th>Event Type</th>
					<th>Event From</th>
					<th>Event To</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>