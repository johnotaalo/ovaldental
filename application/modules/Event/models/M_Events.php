<?php

defined('BASEPATH') or die("No direct script access allowed");

class M_Events extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getEventTypes()
	{
		$query = $this->db->get('event_type');

		return $query->result();
	}

	function addEvent($event_data)
	{
		$result = $this->db->insert('events', $event_data);

		return $result;
	}

	function getEventById($event_id)
	{
		$this->db->where('id', $event_id);
		$query = $this->db->get('events');

		return $query->row();
	}

	function updateEvent($event_id, $edit_data)
	{
		$this->db->where('id', $event_id);

		$updated = $this->db->update('events', $edit_data);

		return $updated;
	}

	function getAllEvents()
	{
		$this->db->select('events.*, event_type.event_type');
		$this->db->from('events');
		$this->db->join('event_type', 'event_type.id = events.event_type_id');
		$query = $this->db->get();

		return $query->result();
	}

	function getEventsBySearchTerm($search_term)
	{
		$sql = "SELECT e.id, event_title, event_from_date, event_to_date, e.deleted, event_type FROM events e
				JOIN event_type et ON et.id = e.event_type_id
				WHERE e.event_title LIKE '%{$search_term}%'
				OR e.event_from_date LIKE '%{$search_term}%'
				OR e.event_to_date LIKE '%{$search_term}%'
				OR et.event_type LIKE '%{$search_term}%'";

		$query = $this->db->query($sql);

		return $query->result();
	}

	function getEventsByAllParameters($search_term, $order_by, $direction, $limit_start, $limit_length)
	{
		$sql = "SELECT e.id, event_title, event_from_date, event_to_date, event_type, e.deleted FROM events e
				JOIN event_type et ON et.id = e.event_type_id
				WHERE e.event_title LIKE '%{$search_term}%'
				OR e.event_from_date LIKE '%{$search_term}%'
				OR e.event_to_date LIKE '%{$search_term}%'
				OR et.event_type LIKE '%{$search_term}%'
				ORDER BY {$order_by} {$direction}
				LIMIT {$limit_start}, {$limit_length}";

		$query = $this->db->query($sql);

		return $query->result();
	}

	function deleteEvent($event_id)
	{
		$this->db->where('id', $event_id);
		$update_data = ['deleted'	=>	1];
		return $this->db->update('events', $update_data);
	}

	function restoreEvent($event_id)
	{
		$this->db->where('id', $event_id);
		$update_data = ['deleted'	=>	0];
		return $this->db->update('events', $update_data);
	}
}