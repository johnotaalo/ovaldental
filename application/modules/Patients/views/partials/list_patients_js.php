<script>
  $(document).ready(function(){
    $('table').dataTable();

    $('.start-visit').click(function(e){
      e.preventDefault();

      $('#start-visit').attr('action', $(this).attr('href'));

      patient_name =  $(this).closest('td').prev('td').prev('td').prev('td').text();
      $('#patient').text(patient_name);
      $('#patient_name').val(patient_name);

      $('#StartVisit').modal('show');

      $('select[name="doctor"]').select2({
        data: <?= @$doctors; ?>
      });
    });

    $('#health-form').click(function(){
      form_data = $('#start-visit').serialize();

      $.ajax({
        url         : $('#start-visit').attr('action'),
        method      : "POST",
        data        : form_data,
        beforeSend  : function()
        {
          console.log('sending data');
        }
      })
      .done(function(res){
        res = jQuery.parseJSON(res);
        if (res.type == true) {
          alert("Success");
        }
        else{
          alert(res.message);
        }
      });
    });
  });
</script>
