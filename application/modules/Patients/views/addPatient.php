<style>
  .control-label
  {
    text-align: left !important;
  }
</style>
<h3>Add a Patient Below</h3>
<form method="POST" action="<?php echo base_url('Patients/AddPatient'); ?>" class = "form-horizontal">
  <legend>Patient Details</legend>
  <div class = "form-group">
    <label for = "patient_first_name" class = "col-sm-2 control-label">First Name</label>
    <div class = "col-sm-10">
      <input type = "text" name = "patient_first_name" class = "form-control" required/>
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_last_name" class = "col-sm-2 control-label">Last Name</label>
    <div class = "col-sm-10">
      <input type = "text" name = "patient_last_name" class = "form-control" required/>
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_other_names" class = "col-sm-2 control-label">Other Names</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_other_names" class = "form-control" required/>
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_phone_number" class = "col-sm-2 control-label">Phone Number</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_phone_number" class = "form-control" required/>
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_email_address" class = "col-sm-2 control-label">Email Address</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_email_address" class = "form-control" required/>
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_insurance_company" class = "col-sm-2 control-label">Insurance Company</label>
    <div class = "col-md-10">
      <select name = "patient_insurance_company_id" class = "form-control" id = "insurance_company"></select>
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_insurance_scheme" class = "col-sm-2 control-label">Insurance Scheme</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_insurance_scheme" class = "form-control" />
    </div>
  </div>
  <legend>Next of Kin</legend>
  <div class = "form-group">
    <label for = "patient_next_of_kin_name" class = "col-sm-2 control-label">Next of Kin Name</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_next_of_kin_name" class = "form-control" />
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_next_of_kin_phone" class = "col-sm-2 control-label">Next of Kin Phone Number</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_next_of_kin_phone" class = "form-control" />
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_next_of_kin_email" class = "col-sm-2 control-label">Next of Kin Email Address</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_next_of_kin_email" class = "form-control" />
    </div>
  </div>

  <div class = "form-group">
    <label for = "patient_next_of_kin_relationship" class = "col-sm-2 control-label">Next of Kin Relationship</label>
    <div class = "col-md-10">
      <input type = "text" name = "patient_next_of_kin_relationship" class = "form-control" />
    </div>
  </div>

  <button class="btn btn-blue">Add Patient</button>
</form>
