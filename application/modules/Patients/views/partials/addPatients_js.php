<script>
  $(document).ready(function(){
    $('#insurance_company').select2({
      data : <?= @$insurance_companies; ?>
    });

    val = $('#insurance_company').val();
    if (val == 0) {
      $('input[name="patient_insurance_scheme"]').attr("disabled", "disabled");
    }

    $('#insurance_company').change(function(){
      val = $(this).val();

      if (val == 0) {
        $('input[name="patient_insurance_scheme"]').attr("disabled", "disabled");
      }
      else {
        $('input[name="patient_insurance_scheme"]').attr("disabled", false);
      }
    });
  });
</script>
