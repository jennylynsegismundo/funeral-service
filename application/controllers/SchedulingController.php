<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchedulingController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('ScheduleModel');
		$this->load->model('FuneralService_Model');
		$this->load->model('NewAddServiceModel');
		$this->load->model('CasketModel');
		$this->load->model('UrnModel');
	}
	//to view the calendar at the same time to view the add schedule
	public function scheduler()
	{
	    $this->load->model('ScheduleModel');
	    $events = $this->ScheduleModel->getSchedule();

			$formattedEvents = []; // Initialize an array to hold the formatted events
	    $data['events'] = []; // Initialize an array to hold the formatted events

	    // Loop through the fetched events and format them for FullCalendar
	    foreach ($events as $event) {
				$status = $event->status; // Get the status attribute from the fetched event

				if ($status !== 'Completed') {
					// Only display events that are not 'Completed'
					$formattedEvents[] = [
								'id' => $event->sched_id,
                'title' => $event->schedule_title,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'location' => $event->location,
								'deceasedName' => $event->deceased_name,
								'Age'=> $event->age
            ];
				}
	    }
			$data['events'] = json_encode($formattedEvents); // Encode the filtered events
	    $this->load->view('scheduling/viewcalendar', $data);
	}
	//to view the details of funeral services
	public function Details($sched_id)
	{
		$data['schedules'] = $this->ScheduleModel->getScheduleDetails($sched_id);
		$this->load->view('scheduling/viewscheduledetails', $data);
	}
	//to mark the schedule as 'in progress'
	public function markInProgress($sched_id)
	{
		$data = array('status' => 'In Progress'); // Set the status to 'In Progress'
		$this->ScheduleModel->updateSchedule($data, $sched_id);
		redirect(base_url('scheduler')); // Redirect to the scheduler view
	}
	//to mark the schedule as 'complete'
	public function markComplete($sched_id)
	{
		$data = array('status' => 'Completed'); // Set the status to 'Completed'
		//$completedServiceData = $this->ScheduleModel->getScheduleDetails($sched_id); // Fetch details of completed service

		$this->ScheduleModel->updateSchedule($data, $sched_id); // Update status in the original table
		// Insert into the table for completed services
    //$this->ScheduleModel->insertCompletedService($completedServiceData);
		redirect(base_url('scheduler')); // Redirect to the scheduler view
	}
	//to view the scheduled status
	public function ViewStatusScheduled()
	{
		$data['schedule'] = $this->ScheduleModel->viewstatusScheduled();
		$this->load->view('scheduling/viewstatusscheduled', $data);
	}
	//to view the completed schedule
	public function ViewCompletedSchedule()
	{
		$data['schedule'] = $this->ScheduleModel->getCompleteSched();
		$this->load->view('scheduling/viewcompletedsched', $data);
	}
	//to view the data table of scheduler
	public function viewScheduler()
	{
		$data['schedule'] = $this->ScheduleModel->getSchedule();
		$this->load->view('scheduling/scheduler', $data);
	}
	//TO VIEW THE PAGE OF ADD SERVICE SCHEDULE
  public function AddServiceScheduleView()
  {
		$data['services_new'] = $this->NewAddServiceModel->getNewService();
		$data['other_services'] = $this->FuneralService_Model->getService();
		$data['casket_products'] = $this->CasketModel->Get_Casket();
		$data['urn_products'] = $this->UrnModel ->getUrns();
    $this->load->view('scheduling/addServiceSched', $data);
  }
	public function ViewChooseService()
	{
		// $data['choose_services'] = $this->FuneralService_Model->getService();
		// $data['additional_products'] = $this->FuneralService_Model->getAdditionalService();
    $data['results'] = $this->ScheduleModel->getServiceandProduct();
		$this->load->view('scheduling/chooseService', $data);
	}
	public function addSchedule()
	{
		$this->form_validation->set_rules('schedule_title', 'Schedule Title', 'required');
    $this->form_validation->set_rules('name_of_customer', 'Name of Customer', 'required');
    $this->form_validation->set_rules('deceased_name', 'Deceased Name', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
    $this->form_validation->set_rules('date_of_death', 'Date of Death', 'required');
    $this->form_validation->set_rules('age', 'Age', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');
    $this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('choose_service', 'Choose Service', 'required');
		$this->form_validation->set_rules('customer_cont_no', 'Customer Contact Number', 'required|numeric');
		$this->form_validation->set_rules('customer_address', 'Customer Address', 'required');
		$this->form_validation->set_rules('relationship_deceased', 'Relationship to Deceased', 'required');

	  if ($this->form_validation->run())
		{
			$start_date = strtotime($this->input->post('start_date'));
			$end_date = strtotime($this->input->post('end_date'));

			if ($start_date > $end_date)
			{
				$this->session->set_flashdata('error', 'Invalid date range! Start date cannot be after the end date.');
				redirect(base_url('AddServiceSchedule'));
			}
			else
			{
				$ori_filename = $_FILES['cert_image']['name'];
				$new_name = time()."".str_replace(' ','-',$ori_filename);
				$config = [
					'upload_path' => './images/',
					'allowed_types' => 'gif|jpg|png',
					'file_name' => $new_name,

				];
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('cert_image'))
				{
					$ImageError = array('ImageError' => $this->upload->display_errors());
					$this->session->set_flashdata('imageError', 'Wrong input of Image type.');
					$this->load->view('scheduling/addServiceSched', $ImageError);
				}
				else
				{
					$cert_filename = $this->upload->data('file_name');
					// Check if both casket and urn are selected, which is not allowed
					if (!empty($casket_id) && !empty($urn_id)) {
						$this->session->set_flashdata('error', 'Please select either a casket or an urn, not both.');
						redirect(base_url('AddServiceSchedule'));
					}
					// Check if the selected casket ID is valid
					if (!empty($casket_id) && !$this->isValidCasket($casket_id)) {
						$this->session->set_flashdata('error', 'Invalid casket ID selected. Please choose a valid casket.');
						redirect(base_url('AddServiceSchedule'));
					}
					// Check if the selected urn ID is valid
					if (!empty($urn_id) && !$this->isValidUrn($urn_id)) {
						$this->session->set_flashdata('error', 'Invalid urn ID selected. Please choose a valid urn.');
						redirect(base_url('AddServiceSchedule'));
					}
					$data = [
						'choose_service' => $this->input->post('choose_service'),
						'casket_id' => null,
						'urn_id' => null,
						'schedule_title' => $this->input->post('schedule_title'),
						'name_of_customer' => $this->input->post('name_of_customer'),
						'customer_cont_no' => $this->input->post('customer_cont_no'),
						'customer_address' => $this->input->post('customer_address'),
						'relationship_deceased' => $this->input->post('relationship_deceased'),
						'deceased_name' => $this->input->post('deceased_name'),
						'gender' => $this->input->post('gender'),
						'date_of_birth' => $this->input->post('date_of_birth'),
						'date_of_death' => $this->input->post('date_of_death'),
						'age' => $this->input->post('age'),
						'start_date' => $this->input->post('start_date'),
						'end_date' => $this->input->post('end_date'),
						'location' => $this->input->post('location'),
						'birth_cert_image' => $cert_filename
					];
					$birth_certificate = new ScheduleModel;
					$casket_id = $this->input->post('casket_id');
					$urn_id = $this->input->post('urn_id');
					if (!empty($casket_id)) {
						$data['casket_id'] = $casket_id;
					} elseif (!empty($urn_id)) {
						$data['urn_id'] = $urn_id;
					}
					if (!empty($casket_id)) {
            $data['casket_id'] = $casket_id;
            $data['urn_id'] = null;
          } elseif (!empty($urn_id)) {
            $data['urn_id'] = $urn_id;
            $data['casket_id'] = null;
          }
					// Insert into the database
					if (!$this->db->insert('service_sched_tbl', $data)) {
			        // Handle database insertion error
			        $error = $this->db->error();
			        echo 'MySQL Error: pag di gumana ang add service' . $error['message'];
			    } else {
			        // Get the inserted schedule details
			        $scheduleDetails = $this->db->where('name_of_customer', $this->input->post('name_of_customer'))
			                                    ->where('choose_service', $this->input->post('choose_service'))
			                                    ->where('start_date', $this->input->post('start_date'))
			                                    ->where('end_date', $this->input->post('end_date'))
			                                    ->get('service_sched_tbl')
			                                    ->row();

			        // Insert the schedule details into start_to_end table
			        $startToEndData = [
			            'customer_name' => $scheduleDetails->name_of_customer,
			            'selected_service' => $scheduleDetails->choose_service,
			            'start_date' => $scheduleDetails->start_date,
			            'end_date' => $scheduleDetails->end_date,
			        ];

			        if (!$this->db->insert('start_to_end', $startToEndData)) {
			            // Handle start_to_end table insertion error
			            $error = $this->db->error();
			            echo 'MySQL Error: pag di gumana ang start to end' . $error['message'];
			        } else {
			            // Redirect or handle successful insertion
			            $this->session->set_flashdata('status', 'Scheduled Service Successfully Inserted');
			            redirect(base_url('scheduling'));
			        }
			    }
			 	}
			}
	    }
			else {
	        // Handle form validation errors
	        $this->AddServiceScheduleView();
	    }
	}
	//to view the edit schedule
	public function editschedule($sched_id)
	{
		$this->load->model('ScheduleModel');
		$data['schedule'] = $this->ScheduleModel->editSchedule($sched_id);
		$this->load->view('scheduling/editschedule', $data);
	}
	//this is the function wherein the edit schedule will store the updated date for start and
	//end in database
	public function updateschedule($sched_id)
	{
		$this->form_validation->set_rules('schedule_title', 'Schedule Title', 'required');
		$this->form_validation->set_rules('name_of_customer', 'Name of Customer', 'required');
		// $this->form_validation->set_rules('deceased_name', 'Deceased Name', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
		$this->form_validation->set_rules('date_of_death', 'Date of Death', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');
    // $this->form_validation->set_rules('location', 'Location', 'required');


    if ($this->form_validation->run())
    {
			$data = [
				'schedule_title' => $this->input->post('schedule_title'),
				'name_of_customer' => $this->input->post('name_of_customer'),
        'deceased_name' => $this->input->post('deceased_name'),
				'gender' => $this->input->post('gender'),
				'date_of_birth' => $this->input->post('date_of_birth'),
				'date_of_death' => $this->input->post('date_of_death'),
				'age' => $this->input->post('age'),
        'start_date' => $this->input->post('start_date'),
        'end_date' => $this->input->post('end_date'),
        'location' => $this->input->post('location'),
      ];

      $this->load->model('ScheduleModel');
      $this->ScheduleModel->updateSchedule($data, $sched_id);
      redirect(base_url('scheduler'));
    }
    else
    {
			$this->editschedule($sched_id);
    }
	}
	// Function to check if the selected casket ID is valid
	private function isValidCasket($casket_id) {
	    // Perform a check in the database for the existence of the casket ID
	    $isValid = $this->CasketModel->checkCasketExists($casket_id);
	    return $isValid;
	}

	// Function to check if the selected urn ID is valid
	private function isValidUrn($urn_id) {
	    // Perform a check in the database for the existence of the urn ID
	    $isValid = $this->UrnModel->checkUrnExists($urn_id);
	    return $isValid;
	}
}
