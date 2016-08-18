<script type="text/javascript">
	$(document).ready(function(){
		if($('table')[0]){
			$('table').DataTable({
				"columnDefs": [{
					"targets": [1, 3, 4, 5],
					"orderable": false
				}],
				"processing": true,
				"serverSide": true,
				"ajax": "<?php echo base_url('Settings/Insurance/getCompanies'); ?>"
			});
		}

		if ($('#image-preview')[0])
		{
			$.uploadPreview({
				input_field: "#image-upload",   // Default: .image-upload
				preview_box: "#image-preview",  // Default: .image-preview
				label_field: "#image-label",    // Default: .image-label
				label_default: "Upload Company Logo",   // Default: Choose File
				label_selected: "Change Logo",  // Default: Change File
				no_label: false                 // Default: false
			});
		}
	});

	$(document).delegate( '.quick-view', "click",function (event) {
		url = $(this).attr('data-href');
		$.get(url, function(data){
			dataObj = jQuery.parseJSON(data);

			if (dataObj.type == "success")
			{
				$('#generalModal .modal-body').html(dataObj.page);
				$('#generalModal').modal('show');
			}
			else
			{
				swal("Error!", dataObj.message, "error");
			}

		});
	});
</script>