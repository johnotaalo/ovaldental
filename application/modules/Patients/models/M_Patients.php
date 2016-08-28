<?php
  class M_Patients extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
    }

    function getAllPatients()
    {
      $this->db->where('patient_is_active', 1);
      $query = $this->db->get('patients');

      return $query->result();
    }

    function insertPatientData($insert_data = array())
    {
      if (count($insert_data)) {
        $this->db->insert('patients', $insert_data);
      }

      return true;
    }

    function getDoctors()
    {
      $sql = "SELECT s.* FROM staff s
      JOIN users u ON s.staff_user_id = u.id
      JOIN user_types ut ON ut.id = u.user_type_id
      WHERE ut.user_type LIKE 'Doctor'";

      $query = $this->db->query($sql);

      return $query->result();
    }

    function findPatientsByUUID($patient_uuid)
    {
      $this->db->where('uuid', $patient_uuid);

      $query = $this->db->get('patients');

      return $query->row();
    }

    function findStaffByUUID($doctor_uuid)
    {
      $this->db->where('uuid', $doctor_uuid);

      $query = $this->db->get('staff');

      return $query->row();
    }

    function insertPatientVisit($insert_data)
    {
      $this->db->insert('patient_start_visit', $insert_data);

      return $this->db->insert_id();
    }
  }
