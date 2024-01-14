<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UrnController extends CI_Controller
{
  // TO LOAD THE MODEL AND OTHER LIBRARIES
  public function __construct()
	{
		parent::__construct();
    $this->load->model('UrnModel');
	}
  // TO VIEW THE URN DATA TABLE
	public function View_Urn()
	{
	  $data['urn'] = $this->UrnModel->getUrns();
	  $archive_mode = $this->input->get('archive_mode');
	  if ($archive_mode) {
	   $data['archived_urns'] = $this->UrnModel->getArchivedUrn();
	  }
	  $data['archive_mode'] = $archive_mode;
	  $this->load->view('urn/viewurn', $data);
	}
  // TO ADD URN (FORM)
	public function Add_Urn()
	{
		$this->load->view('urn/addurn');
	}
  // TO STORE THE ADD URN IN THE DATABASE
	public function Store_Urn()
	{
		$this->form_validation->set_rules('urn_name', 'Urn Name', 'required');
		$this->form_validation->set_rules('description', 'Casket Description', 'required');
		$this->form_validation->set_rules('urn_price', 'Urn Price', 'required|numeric');
		if ($this->form_validation->run())
		{
				$data = [
					'urn_name' => $this->input->post('urn_name'),
					'description' => $this->input->post('description'),
					'urn_price' => $this->input->post('urn_price'),
				];
				$this->UrnModel->insertUrn($data);
				redirect(base_url('urn'));
		}
		else
		{
			$this->Add_Urn();
		}
	}
  // TO EDIT THE URN DETAILS
	public function Edit_Urn($urn_id)
	{
		$data['urn'] = $this->UrnModel->edit_urn($urn_id);

		$this->load->view('urn/editurn', $data);
	}
  // TO UPDATE THE URN DETAILS IN DATABASE
	public function Update_Urn($urn_id)
	{
		$this->form_validation->set_rules('urn_name', 'Urn Name', 'required');
		$this->form_validation->set_rules('description', 'Casket Description', 'required');
		$this->form_validation->set_rules('urn_price', 'Urn Price', 'required|numeric');

		if ($this->form_validation->run())
		{
				$data = [
					'urn_name' => $this->input->post('urn_name'),
					'description' => $this->input->post('description'),
          'urn_price' => $this->input->post('urn_price'),
				];
				$this->UrnModel->update_urn($data, $urn_id);
				redirect(base_url('urn'));
		}
		else
		{
			$this->Edit_Urn($urn_id);
		}
	}
  // TO DELETE URN IN DATABASE AND IN SYSTEM
	public function Delete_Urn($urn_id)
	{
		$this->UrnModel->delete_urn($urn_id);
		redirect(base_url('urn'));
	}
  // TO ARCHIVE URN
	public function Archive_Urn($urn_id)
	{
	  $this->UrnModel->archive_urn($urn_id);
	  redirect(base_url('urn'));
	}
  // UNARCHIVE URN
	public function Unarchive_Urn($urn_id)
	{
	  $this->UrnModel->unarchive_urn($urn_id);
	  redirect(base_url('archive_urn'));
	}
  // TO VIEW THE ARCHIVE URN (DATA TABLE)
	public function View_Archive_Urn()
	{
		$data['archive_mode'] = true;
		$data['archived_urns'] = $this->UrnModel->getArchivedUrn();
		$this->load->view('urn/archiveurn', $data);
	}
}
