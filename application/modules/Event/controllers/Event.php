<?php

defined("BASEPATH") or exit("No direct access script");

class Event extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Events');
	}

	function eventlist()
	{
		$flashdata = $this->session->flashdata('success');
		$data['assets']['css'] = [
			"backend/plugins/datatables/media/css/jquery.dataTables.min.css",
			"backend/plugins/datatables/media/css/dataTables.bootstrap.min.css",
			'backend/plugins/toast/jquery.toast.min.css',
			"backend/plugins/sweetalert/sweetalert.css"
		];


		$data['assets']['js'] = [
			"backend/plugins/datatables/media/js/jquery.dataTables.min.js",
			"backend/plugins/datatables/media/js/dataTables.bootstrap.min.js",
			"backend/plugins/toast/jquery.toast.min.js",
			"backend/plugins/sweetalert/sweetalert.min.js"
		];

		$data['javascript'] = [
				'js'	=>	"Event/partials/events_js",
				'data'	=>	["flash_data"	=>	$flashdata]
			];

		$data['content_view'] = 'Event/events';

		$this->template->call_admin_template($data);
	}

	function getEventsList()
	{

		$column_map = [
			'id',
			'event_title',
			'event_type',
			'event_from_date',
			'event_to_date'
		];

		$search_term = $_GET['search']['value'];

		// var_dump($search_term);
		$limit_start = $_GET['start'];
		$limit_length = $_GET['length'];
		$draw = $_GET['draw'];
		$order_by = $column_map[$_GET['order'][0]['column']];
		$direction = $_GET['order'][0]['dir'];

		$events = $this->M_Events->getAllEvents();

		$totalevents = count($events);

		if ($search_term != "") {
			$filtered_data = $this->M_Events->getEventsBySearchTerm($search_term);

			$actual_events_data = $this->M_Events->getEventsByAllParameters($search_term, $order_by, $direction, $limit_start, $limit_length);
		}
		else{
			$actual_events_data = $events;
			$filtered_data = $events;
		}

		$response_data = array();
		$sanitized_events_array = array();

		if ($actual_events_data) {
			$count = 0;
			$inner_counter = 1;
			foreach ($actual_events_data as $event) {

				if ($event->deleted == 0) {
					$delete_string = "<a class = 'delete-event' data-href = '".base_url('Event/deleteEvent/' . $event->id)."'>Delete</a>";
				}
				else
				{
					$delete_string = "<a class = 'restore-event' data-href = '".base_url('Event/restoreEvent/' . $event->id)."'>Restore</a>";
				}

				$sanitized_events_array[$count] = [
					$inner_counter,
					$event->event_title,
					$event->event_type,
					$event->event_from_date,
					$event->event_to_date,
					"<a href = '".base_url('Event/editEvent/' . $event->id)."'>Edit</a>&nbsp;|&nbsp;{$delete_string}"
				];

				$inner_counter++;

				$count++;
			}
		}

		$response_data = [
			'draw'				=>	$draw,
			'data'				=>	$sanitized_events_array,
			'recordsTotal'		=>	$totalevents,
			'recordsFiltered'	=>	count($filtered_data)
		];

		echo json_encode($response_data);
	}

	function addEvent()
	{
		if(!$this->input->post()):

			$data['assets']['css'] = [
				'backend/plugins/select2/css/select2.min.css',
				'backend/plugins/daterangepicker/daterangepicker.css',
				'backend/plugins/toast/jquery.toast.min.css'
			];

			$data['assets']['js'] = [
				'backend/plugins/daterangepicker/moment.min.js',
				'backend/plugins/daterangepicker/daterangepicker.js',
				'backend/plugins/select2/js/select2.min.js',
				'backend/plugins/toast/jquery.toast.min.js'
			];

			$data['content_view'] = 'Event/add_event';

			$data['javascript'] = [
				'js'	=>	"Event/partials/events_js",
				'data'	=>	NULL
			];

			$this->template->call_admin_template($data);
		else:
			$event_duration = explode('-', $this->input->post('event_duration'));

			$event_date_from = date('Y-m-d H:i:s', strtotime($event_duration[0]));
			$event_date_to = date('Y-m-d H:i:s', strtotime($event_duration[1]));

			$new_data = array(
				'event_title'		=>	$this->input->post('event_title'),
				'event_description'	=>	$this->input->post('event_description'),
				'event_type_id'		=>	$this->input->post('event_type'),
				'created_by'		=>	1,
				'event_from_date'	=>	$event_date_from,
				'event_to_date'		=>	$event_date_to
			);

			$added = $this->M_Events->addEvent($new_data);

			if ($added) {
				$_SESSION['success'] = "Successfully added event";
				$this->session->mark_as_flash('success');
				redirect(base_url() . 'Event/eventlist');
			}
			else
			{
				echo "There was an error. Please try again later!";
			}
		endif;
	}

	function editEvent($event_id = NULL)
	{
		if ($event_id) {
			$event_details = $this->M_Events->getEventById($event_id);

			if($event_details)
			{
				if(!$this->input->post())
				{
					$success_flash = $this->session->flashdata('success');
					$data['event_details'] = $event_details;
					$data['assets']['css'] = [
						'backend/plugins/select2/css/select2.min.css',
						'backend/plugins/daterangepicker/daterangepicker.css',
						'backend/plugins/toast/jquery.toast.min.css'
					];

					$data['assets']['js'] = [
						'backend/plugins/daterangepicker/moment.min.js',
						'backend/plugins/daterangepicker/daterangepicker.js',
						'backend/plugins/select2/js/select2.min.js',
						'backend/plugins/toast/jquery.toast.min.js'
					];

					$data['content_view'] = 'Event/add_event';

					$data['javascript'] = [
						'js'	=>	"Event/partials/events_js",
						'data'	=>	[
							'event_details'	=>	$event_details,
							'flash_data'	=>	$success_flash
						]
					];

					$this->template->call_admin_template($data);
				}
				else
				{
					$event_duration = explode('-', $this->input->post('event_duration'));

					$event_date_from = date('Y-m-d H:i:s', strtotime($event_duration[0]));
					$event_date_to = date('Y-m-d H:i:s', strtotime($event_duration[1]));

					$edit_data = array(
						'event_title'		=>	$this->input->post('event_title'),
						'event_description'	=>	$this->input->post('event_description'),
						'event_type_id'		=>	$this->input->post('event_type'),
						'created_by'		=>	1,
						'event_from_date'	=>	$event_date_from,
						'event_to_date'		=>	$event_date_to
					);

					$editted = $this->M_Events->updateEvent($event_id, $edit_data);

					if ($editted) {
						$_SESSION['success'] = "The event was updated successfully";
						$this->session->mark_as_flash('success');
						redirect(base_url('Event/editEvent/' . $event_id));
					}
					else{
						show_error('Could not complete your request! Please try again later');
					}
				}
			}
			else
			{
				show_error('No Such Event! We could not find the specified event. Please click on one that actually exists');
			}
		}
		else{
			show_404();
		}
	}

	function getEventTypes()
	{
		$types = $this->M_Events->getEventTypes();
		$event_types = array();
		if ($types) :
			foreach ($types as $type) {
				$event_types[] = [
					'id'	=>	$type->id,
					'text'	=>	$type->event_type
				];
			}
		endif;

		echo json_encode($event_types, JSON_NUMERIC_CHECK);
	}

	function deleteEvent($event_id)
	{
		$event = $this->M_Events->getEventById($event_id);

		$response = array();

		if ($event) {
			$updated = $this->M_Events->deleteEvent($event_id);

			if ($updated) {
				$response['type'] = 'success';
				$response['message'] = 'Successfully deleted event';
			}
			else{
				$response['type'] = 'error';
				$response['message'] = 'There was a problem. Please try again later';	
			}
		}
		else{
			$response['type'] = 'error';
			$response['message'] = 'Could not delete event. Please try again later';
		}

		echo json_encode($response);
	}

	function restoreEvent($event_id)
	{
		$event = $this->M_Events->getEventById($event_id);

		$response = array();

		if ($event) {
			$updated = $this->M_Events->restoreEvent($event_id);

			if ($updated) {
				$response['type'] = 'success';
				$response['message'] = 'Successfully restored event';
			}
			else{
				$response['type'] = 'error';
				$response['message'] = 'There was a problem. Please try again later';	
			}
		}
		else{
			$response['type'] = 'error';
			$response['message'] = 'Could not restore event. Please try again later';
		}

		echo json_encode($response);
	}

}