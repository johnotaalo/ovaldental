<?php
  class Patients extends MY_Controller
  {
    function __construct()
    {
      parent::__construct();

      $this->load->model('Patients/M_Patients');
      $this->load->library('Uuid');
    }

    function all()
    {
      $data['assets']['css'] = [
  			"backend/plugins/datatables/media/css/jquery.dataTables.min.css",
  			"backend/plugins/datatables/media/css/dataTables.bootstrap.min.css",
        "backend/plugins/select2/css/select2.min.css",
  			"backend/plugins/sweetalert/sweetalert.css"
  		];


  		$data['assets']['js'] = [
  			"backend/plugins/datatables/media/js/jquery.dataTables.min.js",
  			"backend/plugins/datatables/media/js/dataTables.bootstrap.min.js",
        "backend/plugins/select2/js/select2.min.js",
  			"backend/plugins/sweetalert/sweetalert.min.js"
  		];

      $data['javascript'] = [
        'js'    =>  'Patients/partials/list_patients_js',
        'data'  =>  ['doctors'  =>  $this->getDoctors()]
      ];
      $data['patients_table'] = $this->createCustomerTable();
      $data['content_view'] = 'Patients/list_patients';

  		$this->template->call_admin_template($data);
    }

    function AddPatient()
    {
      if(!$this->input->post())
      {
        $data['assets']['css'] = [
    			"backend/plugins/select2/css/select2.min.css",
    			"backend/plugins/sweetalert/sweetalert.css"
    		];


    		$data['assets']['js'] = [
          "backend/plugins/select2/js/select2.min.js",
    			"backend/plugins/sweetalert/sweetalert.min.js"
    		];

        $data['content_view'] = 'Patients/addPatient';
        $data['javascript'] = [
    				'js'	=>	"Patients/partials/addPatients_js",
    				'data'	=>	['insurance_companies'  =>  $this->getInsuranceCompanies()]
    			];

        $this->template->call_admin_template($data);
      }
      else{
        $insert_data = $this->input->post();
        $insert_data['uuid'] = $this->uuid->v4();
        $this->M_Patients->insertPatientData($insert_data);

        redirect(base_url('Patients/all'));
      }
    }

    function getDoctors()
    {
      $doctors = $this->M_Patients->getDoctors();
      $doctors_array = [];
      if ($doctors) {
        foreach ($doctors as $doctor) {
          $doctors_array[] = [
            'id'    =>  $doctor->uuid,
            'text'  =>  $doctor->staff_firstname . ' ' . $doctor->staff_lastname
          ];
        }
      }

      return json_encode($doctors_array);
    }
    function createCustomerTable()
    {
      $patients = $this->M_Patients->getAllPatients();

      $patients_table = "";

      if ($patients) {
        $counter = 1;
        foreach ($patients as $patient) {
          $patients_table .= "<tr>";
          $patients_table .= "<td>{$counter}</td>";
          $patients_table .= "<td>{$patient->patient_first_name} {$patient->patient_last_name}</td>";
          $patients_table .= "<td>{$patient->patient_phone_number}</td>";
          $patients_table .= "<td>{$patient->patient_email_address}</td>";
          $patients_table .= "<td><center><a href = '".base_url('Patients/StartVisit')."/{$patient->uuid}' class = 'label label-primary start-visit'>Start Visit</a></center></td>";
          $patients_table .= "<td><a href = '".base_url('Patients/EditPatient')."/{$patient->uuid}' class = 'label label-warning'>Edit Patient</a>&nbsp;|&nbsp;<a href = '".base_url('Patients/DeletePatient')."/{$patient->uuid}' class = 'label label-danger'>Delete Patient</a></td>";
          $patients_table .= "</tr>";

          $counter++;
        }
      }

      return $patients_table;
    }

    function getInsuranceCompanies()
    {
      $this->load->model('Settings/M_Companies');
      $companies = $this->M_Companies->getAllCompanies();

      $companies_array[] = [
        'id'  =>  0,
        'text'=>  'No Insurance Company'
      ];
      if ($companies) {
        foreach ($companies as $company) {
          $companies_array[] = [
            'id'  =>  $company->id,
            'text'=>  $company->company_name
          ];
        }
      }

      return json_encode($companies_array, JSON_NUMERIC_CHECK);
    }

    function StartVisit($patient_uuid)
    {
      if($this->input->post())
      {
        $response = [];
        $patient_details = $this->M_Patients->findPatientsByUUID($patient_uuid);

        if($patient_details){

          $doctor_uuid = $this->input->post('doctor');
          $doctor = $this->M_Patients->findStaffByUUID($doctor_uuid);
          if ($doctor) {
            $insert_data = array();

            $insert_data['doctor_id'] = $doctor->id;
            $insert_data['patient_id'] = $patient_details->id;
            $insert_data['uuid'] = $this->uuid->v4();
            $insert_data['created_by'] = $this->session->userdata('user_id');

            unset($_POST['doctor']);
            foreach ($this->input->post() as $key => $value) {
              $insert_data[$key] = 1;
            }

            $this->M_Patients->insertPatientVisit($insert_data);

            $response['type'] = true;
            $response['redirect_url'] = 'Patients/Visit/' . $insert_data['uuid'];
          }
          else{
            $response['type'] = false;
            $response['message'] = "Failed to find doctor's data";
          }
        }
        else{
          $response['type'] = false;
          $response['message'] = "Failed to find patient's data";
        }

        echo json_encode($response);
      }
    }

    function Visit($visit_uuid)
    {
      $visit = $this->M_Patients->findVisitByUUID($visit_uuid);

      if($visit)
      {
        if(!$this->input->post()){
          $data['assets']['css'] = [
            "backend/plugins/select2/css/select2.min.css",
            "backend/plugins/sweetalert/sweetalert.css"
          ];


          $data['assets']['js'] = [
            "backend/plugins/select2/js/select2.min.js",
            "backend/plugins/sweetalert/sweetalert.min.js"
          ];

          $data['content_view'] = 'Patients/HealthForm';
          $data['javascript'] = [
              'js'	=>	"Patients/partials/health_form_js",
              'data'	=>	[]
            ];

          $this->template->call_admin_template($data);
        }
        else{
          // echo "<pre>";print_r($this->input->post());die;
          $insert_data = array();

          $insert_data['visit_id']          = $visit->visit_id;
          $insert_data['medication']        = $this->input->post('medication');
          if($this->input->post('medication') == 1){
            $insert_data['yes_medication_specific']= $this->input->post('yes_medication_specific');
          }

          $insert_data['treatment']         = $this->input->post('treatment');
          $insert_data['conditions']        = implode("||", $this->input->post('conditions'));
          $insert_data['health_condition']  = $this->input->post('health-condition');
          if($this->input->post('health-condition') == 1){
            $insert_data['yes_health_condition_specific'] = $this->input->post('yes_health_condition_specific');
          }

          $insert_data['allergies']         = $this->input->post('allergies-radio');
          if($this->input->post('allergies-radio') == 1)
          {
            $insert_data['allergies_available'] = implode("||", $this->input->post('allergies'));
            if($this->input->post("allergies-others-specific"))
            {
              $insert_data['allergies_other_specific'] = $this->input->post("allergies-others-specific");
            }
          }

          $insert_data['take_care_of_teeth'] = implode("||", $this->input->post('taking_care_of_teeth'));

          $insert_data['bore_hole_supply'] = $this->input->post('bore_hole_supply');

          $inserted = $this->M_Patients->addHealthFormInformation($insert_data);

          if($inserted)
          {
            // add patient to queue
          }
          else{
            show_error("There was an error entering your details");
          }
        }
      }
      else {
        show_404();
      }

    }
  }
