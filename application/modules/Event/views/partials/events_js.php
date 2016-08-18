<script>
	$(document).ready(function(){
		$.get('<?php echo base_url('Event/getEventTypes'); ?>', function(data){
			dataObj = jQuery.parseJSON(data);

			var event_type_id = '<?php if(isset($event_details)) { echo $event_details->event_type_id;}else{ echo "None"; } ?>';
			var flashdata = '<?php if(isset($flashdata)){echo $flash_data;}else{echo "None";} ?>';

			if (flashdata !== "None")
			{
				$.toast({
					heading: 'Success!',
					text: flashdata,
					position: 'top-right',
					icon: 'info',
					stack: false,
					hideAfter: 5000,
					showHideTransition: 'slide',
					bgColor: '#388E3C',
					loader: false
				});
			}

			if($('select#event_types')[0]){
				console.log("Found");

				if(event_type_id !== "None"){
					$('select#event_types').select2({
						data: dataObj
					}).select2('val', event_type_id);
				}
				else{
					$('select#event_types').select2({
						data: dataObj
					});
				}
			}
		});

		if($('input[name="event_duration"]')[0]){
			$('input[name="event_duration"]').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				locale: {
					format: 'MM/DD/YYYY h:mm A'
				}
			});
		}

		if($('#events_table')[0]){
			$('#events_table').DataTable( {
				"processing": true,
				"serverSide": true,
				"ajax": "<?php echo base_url('Event/getEventsList'); ?>"
			});
		}
		
	});
	$(document).delegate( '.delete-event', "click",function (event) {
		event.preventDefault();
		url = $(this).attr('data-href');
		swal({
			type: "warning",
			title: "Delete Event?",
			text: "Are you sure you want to delete this event?",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true
		}, function(){
			$.get(url, function(data){
				responseObj = jQuery.parseJSON(data);
				if (responseObj.type == "success")
				{
					swal({
						title: "Deleted!",
						text: "The event has been deleted",
						type: "success"
					}, function(){
						location.reload();
					});
				}
				else
				{
					swal("Error!", responseObj.message, "error");
				}
			});
		});
	});
	$(document).delegate( '.restore-event', "click",function (event) {
		event.preventDefault();
		url = $(this).attr('data-href');
		swal({
			type: "warning",
			title: "Restore Event?",
			text: "Are you sure you want to restore this event?",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true
		}, function(){
			$.get(url, function(data){
				responseObj = jQuery.parseJSON(data);
				if (responseObj.type == "success")
				{
					swal({
						title: "Restored!",
						text: responseObj.message,
						type: "success"
					}, function(){
						location.reload();
					});
				}
				else
				{
					swal("Error!", responseObj.message, "error");
				}
			});
		});
	});
</script>