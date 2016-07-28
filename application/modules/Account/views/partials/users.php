<script type="text/javascript">
	$(document).ready(function(){
		$('table').dataTable({
			data : <?= @$users_data; ?>
		});
	});
</script>