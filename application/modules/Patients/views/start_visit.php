<style>
  .select2-container
  {
    width: 100% !important;
  }
</style>

<form id = "start-visit" class = "form-horizontal">
  <div class = "form-group">
    <label class = "label-control col-sm-2">Patient:</label>
    <div class = "col-sm-10">
      <input type="text" disabled="disabled" class = "form-control" id = "patient_name" value = ""/>
    </div>
  </div>

  <div class="form-group">
    <label class = "label-control col-sm-2">Doctor: </label>
    <div class = "col-sm-10">
      <select name = "doctor" class = "form-control"></select>
    </div>
  </div>

  <div class = "form-group">
    <label class = "label-control col-sm-2">Concurrency Check</label>
    <div class = "col-sm-10">
      <p><input type="checkbox" name = "currently_on_medication" id = "currently_on_medication" />&nbsp;<label for = "currently_on_medication">Currently on Medication</label></p>
      <p><input type="checkbox" name = "allergies_to_medication" id = "allergies_to_medication" />&nbsp;<label for = "allergies_to_medication">Allergies to Medication</label></p>
      <p><input type="checkbox" name = "food_allergies" id = "food_allergies" />&nbsp;<label for = "food_allergies">Food Allergies</label></p>
    </div>
  </div>
</form>
