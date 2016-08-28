<div class = "panel">
  <div class = "panel-heading">
    <h3 class = "panel-title">Patient Health Form</h3>
  </div>
  <form method = "POST">
    <div class = "form-group">
      <label>1. &nbsp;Are you taking any medication now?</label><br/>
      <input type = "radio" name = "medication" value = "1" id = "yes_medication"/> <label for = "yes_medication">Yes</label>&nbsp;&nbsp;
      <input type = "radio" name = "medication" value = "0" id = "no_medication"/> <label for = "no_medication">No</label>

      <div class = "form-group hidable" id = "medication-hide">
        <label>Please list both prescribed and over the counter medications that you take in the space below:</label>
        <textarea class = "form-control" rows = "5" name = "yes_medication_specific"></textarea>
      </div>
    </div>
    <div class = "form-group">
      <label for = "treatment">2. &nbsp;Have you received Dental Treatment before?</label><br/>
      <input type = "radio" name = "treatment" value = "1" id = "yes_treatment"/> <label for = "yes_treatment">Yes</label>&nbsp;&nbsp;
      <input type = "radio" name = "treatment" value = "0" id = "no_treatment"/> <label for = "no_treatment">No</label>
    </div>

    <div class = "form-group">
      <label for = "medication">3. &nbsp;Please check any illnesses or conditions you have EVER had</label>
      <div>
        <p><input type = "checkbox" name = "conditions[]" value = "Allergies to Medicine(s)" value = "1" id = "allergies" /> <label for = "allergies"> Allergies to Medicine(s)</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Epilepsy" value = "1" id = "epilepsy" /> <label for = "epilepsy"> Epilepsy</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Anaemia or Blood Problems" value = "1" id = "anaemia_blood_problems" /> <label for = "anaemia_blood_problems"> Anaemia or Blood Problems</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Any Heart Ailments" value = "1" id = "any_heart_ailments" /> <label for = "any_heart_ailments"> Any Heart Ailments</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Stroke" value = "1" id = "stroke" /> <label for = "stroke"> Stroke</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Hepatitis A, B, C" value = "1" id = "hepatitis" /> <label for = "hepatitis"> Hepatitis A, B, C</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Thyroid Problem(s)" value = "1" id = "thyroid" /> <label for = "thyroid"> Thyroid Problem(s)</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "High Blood Pressure" value = "1" id = "high_blood_pressure" /> <label for = "high_blood_pressure"> High Blood Pressure</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Tuberculosis" value = "1" id = "tuberculosis" /> <label for = "tuberculosis"> Tuberculosis</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Asthma" value = "1" id = "asthma" /> <label for = "asthma"> Asthma</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Ulcer" value = "1" id = "ulcer" /> <label for = "ulcer"> Ulcer</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Cancer or Chemotherapy" value = "1" id = "cancer" /> <label for = "cancer"> Cancer or Chemotherapy</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Kidney problems" value = "1" id = "kidney_problem" /> <label for = "kidney_problem"> Kidney problems</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Diabetes" value = "1" id = "diabetes" /> <label for = "diabetes"> Diabetes</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Liver Problems" value = "1" id = "liver_problems" /> <label for = "liver_problems"> Liver Problems</label></p>
        <p><input type = "checkbox" name = "conditions[]" value = "Use of tobacco, cigarettes, chew" value = "1" id = "tobacco" /> <label for = "tobacco"> Use of tobacco, cigarettes, chew</label></p>
      </div>
    </div>

    <div class = "form-group">
      <label for = "health-condition">4. &nbsp;Do you have any other health conditions?</label><br/>
      <input type = "radio" name = "health-condition" value = "1" id = "yes_heath_condition"/> <label for = "yes_heath_condition">Yes</label>&nbsp;&nbsp;
      <input type = "radio" name = "health-condition" value = "0" id = "no_heath_condition"/> <label for = "no_heath_condition">No</label>

      <div class = "form-group hidable" id = "health-condition-hide">
        <label>Please list them below:</label>
        <textarea class = "form-control" rows = "5" name = "yes_health_condition_specific"></textarea>
      </div>
    </div>

    <div class = "form-group">
      <label for = "allergies-radio">5. &nbsp;Do you have any allergies?</label><br/>
      <input type = "radio" name = "allergies-radio" value = "1" id = "yes_allergies"/> <label for = "yes_allergies">Yes</label>&nbsp;&nbsp;
      <input type = "radio" name = "allergies-radio" value = "0" id = "no_allergies"/> <label for = "no_allergies">No</label>
      <div class = "form-group hidable" id = "allergies-radio-hide">
        <p><input type = "checkbox" name = "allergies[]" value = "Penicilin" id = "penicilin" /> <label for = "penicilin">&nbsp;Penicilin</label></p>
        <p><input type = "checkbox" name = "allergies[]" value = "Antibiotics" id = "antibiotics" /> <label for = "antibiotics">&nbsp;Antibiotics</label></p>
        <p><input type = "checkbox" name = "allergies[]" value = "Anesthetics" id = "anaesthetics" /> <label for = "anaesthetics">&nbsp;Anesthetics</label></p>
        <p><input type = "checkbox" name = "allergies[]" value = "Aspirin" id = "aspirin" /> <label for = "aspirin">&nbsp;Aspirin</label></p>
        <p><input type = "checkbox" name = "allergies[]" value = "Foods" id = "foods" /> <label for = "foods">&nbsp;Foods</label></p>
        <p><input type = "checkbox" name = "allergies[]" value = "Latex" id = "latex" /> <label for = "latex">&nbsp;Latex</label></p>
        <p><input type = "checkbox" name = "allergies[]" value = "Other" id = "other" /> <label for = "other">&nbsp;Other: </label><textarea name = "allergies-others-specific" class = "form-control" rows = "5"></textarea></p>
      </div>
    </div>

    <div class = "form-group">
      <label for = "take-care-gums">6. &nbsp;What do you do to take care of your teeth and gums?</label><br/>
      <input type = "checkbox" name = "taking_care_of_teeth[]" value = "Daily Tooth Brushing" id = "daily_tooth_brushing"/> <label for = "daily_tooth_brushing">Daily Tooth Brushing</label>&nbsp;&nbsp;
      <input type = "checkbox" name = "taking_care_of_teeth[]" value = "Daily Flossing" id = "daily_flossing"/> <label for = "daily_flossing">Daily Flossing</label>
    </div>

    <div class = "form-group">
      <label for = "bore-hole-supply">7. &nbsp;Is your drinking water supply from a bore hole?</label><br/>
      <input type = "radio" name = "bore_hole_supply" value = "1" id = "yes_bore_hole_supply"/> <label for = "yes_bore_hole_supply">Yes</label>&nbsp;&nbsp;
      <input type = "radio" name = "bore_hole_supply" value = "0" id = "no_bore_hole_supply"/> <label for = "no_bore_hole_supply">No</label>
    </div>

    <button class="btn btn-blue">Submit Information</button>
  </form>
</div>
