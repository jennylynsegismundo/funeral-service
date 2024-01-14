<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdditionalProductController extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('AdditionalProductModel');
	}
  public function additionalService()
	{
		// Load urn data
		$data['add_service'] = $this->AdditionalProductModel->getAdditionalService();

		$archive_mode = $this->input->get('archive_mode'); // Check if archive mode is enabled

		if ($archive_mode) {
				// Load archived urns
				$data['archived_addserv'] = $this->AdditionalProductModel->getArchivedAdditional_service();
		}
		$data['archive_mode'] = $archive_mode;
		$this->load->view('additionalserv/additionalservicesview', $data);
	}

	public function addAdditionalServiceView()
	{
		$this->load->view('additionalserv/addAdditionalservice');
	}

	public function storeAdditionalService()
	{
		$this->form_validation->set_rules('additional_serv_type', 'Additional Service Type', 'required');
		// $this->form_validation->set_rules('description_details', 'Description & Details', 'required');
		// $this->form_validation->set_rules('customization_options', 'Customization Options', 'required');
		$this->form_validation->set_rules('additional_price', 'Price', 'required|numeric');
		if ($this->form_validation->run())
		{
		  $data = [
			  'additional_serv_type' => $this->input->post('additional_serv_type'),
				// 'description_details' => $this->input->post('description_details'),
				// 'customization_options' => $this->input->post('customization_options'),
        'additional_price' => $this->input->post('additional_price'),
			];
			$this->AdditionalProductModel->insert_additional_serv($data);
			redirect(base_url('additional_services'));
		}
		else
		{
			$this->addAdditionalServiceView();
		}
	}

	public function editAdditionalService($id)
	{
		$data['add_service'] = $this->AdditionalProductModel->edit_additional_serv($id);
		$this->load->view('additionalserv/editAdditionalService', $data);
	}

	public function updateAdditionalService($id)
	{
		$this->form_validation->set_rules('additional_serv_type', 'Additional Service Type', 'required');
		// $this->form_validation->set_rules('description_details', 'Description & Details', 'required');
		// $this->form_validation->set_rules('customization_options', 'Customization Options', 'required');
		$this->form_validation->set_rules('additional_price', 'Price', 'required|numeric');

		if ($this->form_validation->run())
		{
			$data = [
				'additional_serv_type' => $this->input->post('additional_serv_type'),
				// 'description_details' => $this->input->post('description_details'),
				// 'customization_options' => $this->input->post('customization_options'),
				'additional_price' => $this->input->post('additional_price'),
			];
			$this->AdditionalProductModel->update_additional_serv($data, $id);
			redirect(base_url('additional_services'));
		}
		else {
			$this->editAdditionalService($id);
		}
	}

	public function deleteAdditionalService($id)
	{
		$this->AdditionalProductModel->delete_additional_service($id);
		redirect(base_url('additional_services'));
	}

	public function archiveAdditionalService($id)
	{
		$this->AdditionalProductModel->archive_addserv($id);
		redirect(base_url('additional_services'));
	}

	public function unarchiveAdditionalService($id)
	{
		$this->AdditionalProductModel->unarchive_addserv($id);
		redirect(base_url('archiveAdditionalService'));
	}

	//this function will show everytime the product for additional service will archive.
	public function archiveaddserv()
	{
		$data['archive_mode'] = true;
		$data['archived_addserv'] = $this->AdditionalProductModel->getArchivedAdditional_service();
		$this->load->view('additionalserv/archiveaddserv', $data);
	}
}
