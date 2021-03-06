<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_users extends CI_Migration {

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
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
			),
			'password' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'user_type_id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'user_is_active' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'active_hash' => array(
				'type' => 'TEXT',
				'constraint' => 0,
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

		$this->dbforge->create_table('users', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}