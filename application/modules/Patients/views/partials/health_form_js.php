<script>
  medication = $('input[name="medication"]:checked').val();
  health_condition = $('input[name="health-condition"]:checked').val();
  allergies_radio = $('input[name="allergies-radio"]:checked').val();

  ToggleMedication(medication);
  ToggleHealthCondition(health_condition);
  ToggleAllergies(allergies_radio);

  $('input[name="medication"]').on("click", function(){
    medication = $(this).val();

    ToggleMedication(medication);
  });

  $('input[name="health-condition"]').on("click", function(){
    health_condition = $(this).val();

    ToggleHealthCondition(health_condition);
  });

  $('input[name="allergies-radio"]').on("click", function(){
    allergies_radio = $(this).val();

    ToggleAllergies(allergies_radio);
  });

  function ToggleMedication(medication_val)
  {
    if (medication_val == 1) {
      $('#medication-hide').show();
      $('textarea[name="yes_medication_specific"]').removeAttr("disabled");
    }
    else if(medication_val == 0){
      $('#medication-hide').hide();
      $('textarea[name="yes_medication_specific"]').attr("disabled", "disabled");
    }
    else {
      $('#medication-hide').hide();
      $('textarea[name="yes_medication_specific"]').attr("disabled", "disabled");
    }
  }

  function ToggleHealthCondition(health_condition_val)
  {
    if (health_condition_val == 1) {
      $('#health-condition-hide').show();
      $('textarea[name="yes_health_condition_specific"]').removeAttr("disabled");
    }
    else if(health_condition_val == 0){
      $('#health-condition-hide').hide();
      $('textarea[name="yes_health_condition_specific"]').attr("disabled", "disabled");
    }
    else {
      $('#health-condition-hide').hide();
      $('textarea[name="yes_health_condition_specific"]').attr("disabled", "disabled");
    }
  }

  function ToggleAllergies(allergies_radio)
  {
    checkboxes = $('#allergies-radio-hide input[type="checkbox"]');
    if (allergies_radio == 1) {
      $('#allergies-radio-hide').show();

      $.each(checkboxes, function(key, value){
        $(value).removeAttr('disabled');
      });

    }
    else if(allergies_radio == 0){
      $('#allergies-radio-hide').hide();
      $.each(checkboxes, function(key, value){
        $(value).attr('disabled', 'disabled');
        $(value).removeAttr('checked');
      });
    }
    else {
      $('#allergies-radio-hide').hide();
      $.each(checkboxes, function(key, value){
        $(value).attr('disabled', 'disabled');
        $(value).removeAttr('checked');
      });
    }
  }

  $('form button').click(function(e){
    e.preventDefault();

    var medication_check, treatment_check, conditions_check, health_condition_check, allergies_check, taking_care_of_teeth_check, bore_hole_supply_check;
    var submission = false;

    var medication_val = $('input[name="medication"]:checked').val();
    var treatment_val = $('input[name="treatment"]:checked').val();

    var conditions_val = new Array();
    $.each($("input[name='conditions[]']:checked"), function() {
      conditions_val.push($(this).val());
    });

    var health_condition_val =  $('input[name="health-condition"]:checked').val();

    var allergies_radio_val = $('input[name="allergies-radio"]:checked').val();

    var allergies_val = new Array();

    $.each($("input[name='allergies[]']:checked"), function() {
      allergies_val.push($(this).val());
    });

    var taking_care_of_teeth_val = Array();

    $.each($('input[name="taking_care_of_teeth[]"]:checked'), function(){
      taking_care_of_teeth_val.push($(this).val());
    });

    var bore_hole_supply_val = $('input[name="bore_hole_supply"]:checked').val();

    if(medication_val == 1 && $('textarea[name="yes_medication_specific"]').val() !== "")
    {
      medication_check = true;
    }
    else if (medication_val == 0)
    {
      medication_check = true;
    }
    else {
      medication_check = false;
    }

    if(treatment_val == 1 || treatment_val == 0)
    {
      treatment_check = true;
    }else{
      treatment_check = false;
    }

    if(conditions_val.length > 0){
      conditions_check = true;
    }else{
      conditions_check = false;
    }

    if((health_condition_val == 1 && $('textarea[name="yes_health_condition_specific"]').val() !== "") || health_condition_val == 0){
      health_condition_check = true;
    }else{
      health_condition_check = false;
    }

    if(allergies_radio_val == 1 && allergies_val.length > 0){
      var others = allergies_val.indexOf('Other');
      if(others != -1){
        var allergies_other_specific_val = $('textarea[name ="allergies-others-specific"]').val();

        if(allergies_other_specific_val !== "")
        {
            allergies_check = true;
        }
        else{
            allergies_check = false;
        }
      }else{
          allergies_check = true;
      }
    }
    else if(allergies_radio_val == 0){
      allergies_check = true;
    }
    else{
      allergies_check = false;
    }

    if(taking_care_of_teeth_val.length > 0){
      taking_care_of_teeth_check = true;
    }else{
      taking_care_of_teeth_check = false;
    }

    if(bore_hole_supply_val == 1 || bore_hole_supply_val == 0){
      bore_hole_supply_check = true;
    }else{
      bore_hole_supply_check = false;
    }

    if(medication_check == false || treatment_check == false || conditions_check == false || health_condition_check == false || allergies_check == false || taking_care_of_teeth_check == false || bore_hole_supply_check == false){
      submission = false;
    }else{
      submission = true;
    }
    if (submission == false) {
      swal("Error!", "Looks like some fields have not been filled", "error");
    }else{
      $('form').submit();
    }
  });
</script>
