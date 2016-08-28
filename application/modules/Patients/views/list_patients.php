<div class = "row">
  <div class = "pull-right">
    <a href="<?php echo base_url('Patients/AddPatient'); ?>" class = "btn btn-blue">Add Patient</a>
  </div>
</div>

<div class = "panel-heading">
  <h2 class = "panel-title">Patients List</h2>
</div>
<div class = "panel-body">
  <table class = "table table-bordered table-striped">
    <thead>
        <td>#</td>
        <td>Patient Name</td>
        <td>Phone Number</td>
        <td>Email Address</td>
        <td><center>Visit</center></td>
        <td>Action</td>
    </thead>
    <tbody>
      <?= @$patients_table; ?>
    </tbody>
  </table>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id = "StartVisit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Start Visit for <span id = "patient"></span></h4>
      </div>
      <div class="modal-body">
          <?php $this->load->view('Patients/start_visit'); ?>
      </div>
      <div class="modal-footer">
        <button type = "button" class = "btn btn-success" id = "health-form">Go to Health Form</button>
        <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
