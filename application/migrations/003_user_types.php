<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_user_types extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'user_type' => array(
				'type' => 'VARCHAR',
				'constraint' => 70,
			),
			'is_active' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'created' => array(
				'type' => 'TIMESTAMP',
				'constraint' => 0,
			),
			'updated' => array(
				'type' => 'TIMESTAMP',
				'constraint' => 0,
			),
		));

		$this->dbforge->add_key('id', TRUE);

		$this->dbforge->create_table('user_types', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('user_types');
	}
}