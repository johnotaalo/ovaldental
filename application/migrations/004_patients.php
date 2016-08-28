<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_patients extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'uuid' => array(
				'type' => 'VARCHAR',
				'constraint' => 36,
			),
			'patient_first_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
			),
			'patient_last_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
			),
			'patient_other_names' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'patient_phone_number' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
			),
			'patient_email_address' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
			),
			'patient_next_of_kin_name' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'patient_next_of_kin_phone' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
			),
			'patient_next_of_kin_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
			),
			'patient_next_of_kin_relationship' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'patient_insurance_company_id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'patient_insurance_scheme' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'patient_created_at' => array(
				'type' => 'TIMESTAMP',
				'constraint' => 0,
			),
			'patient_is_active' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
		));

		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->create_table('patients', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('patients');
	}
}