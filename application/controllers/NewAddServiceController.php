<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NewAddServiceController extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('AdditionalProductModel');
    $this->load->model('NewAddServiceModel');
    $this->load->model('FuneralService_Model');
	}
  public function ViewNewServices()
  {
    $data['services'] = $this->NewAddServiceModel->getNewService();

    $archive_mode = $this->input->get('archive_mode'); // Check if archive mode is enabled
    if ($archive_mode) {
        // Load archived caskets
        $data['archived_new_service'] = $this->NewAddServiceModel->getArchivedNewService();
    }
    $data['archive_mode'] = $archive_mode;

    $this->load->view('service/addservice', $data);
  }
  public function EditNewService($new_service_id)
  {
		$data['services'] = $this->NewAddServiceModel->editNewService($new_service_id);
    if ($data['services']) {
      // $data['associated_prods'] = $this->NewAddServiceModel->getDisplayNew_Service_Additional_Products();
      // Fetch the details of the selected service
      $data['selectedServiceDetails'] = $this->NewAddServiceModel->getServiceDetails($new_service_id);
      // Fetch the associated products for the service being edited
      $data['associated_prods'] = $this->NewAddServiceModel->getDisplayNew_Service_Additional_Products($new_service_id);
      $data['new_services'] = $this->NewAddServiceModel->getNewService();
      $data['other_services'] = $this->FuneralService_Model->getOtherService();
      $this->load->view('newservice/editnewservice', $data);
    }
  }
  //update the edit page of new service
  public function updateNewService($new_service_id)
  {
    $this->form_validation->set_rules('new_service_name', 'New Service Name', 'required');
    $this->form_validation->set_rules('new_service_price', 'New Service Price', 'required|numeric');
    $this->form_validation->set_rules('associated_products[]', 'Associated Products', 'required');


    if ($this->form_validation->run())
    {
      $data = [
        'new_service_name' => $this->input->post('new_service_name'),
        'new_service_price' => $this->input->post('new_service_price'),
        // 'associated_products' => $this->input->post('associated_products'),
      ];

      // Retrieve selected associated product names from the form
      $associatedProducts = $this->input->post('associated_products');
      // Update associated products for the service
      $this->NewAddServiceModel->updateNewService($data, $new_service_id);
      // Update associated products in a separate method within your model
      $this->NewAddServiceModel->updateAssociatedProducts($new_service_id, $associatedProducts);
      // Add associated products array to data array
      // $data['associated_products'] = implode(',', $associatedProducts);
      redirect(base_url('funeralservices'));
    }
    else {
        // Handle form validation errors
        // You might want to reload the edit view with error messages
        $this->EditNewService($new_service_id);
    }
  }
  // function to delete the new service in data base and also in system
  public function deleteNewService($new_service_id)
	{
		$this->load->model('NewAddServiceModel');
		$this->NewAddServiceModel->deleteNewService($new_service_id);
		redirect(base_url('funeralservices'));
	}
  //archive the new service
	public function archiveNewService($new_service_id)
	{
	    $this->load->model('NewAddServiceModel');
	    $this->NewAddServiceModel->archiveNewService($new_service_id);
	    redirect(base_url('funeralservices'));
	}
	//unarchive method in new services
	public function unarchiveNewService($new_service_id)
	{
	    $this->load->model('NewAddServiceModel');
	    $this->NewAddServiceModel->unarchiveNewService($new_service_id);
	    redirect(base_url('ArchivedNewService'));
	}
  //method to show the page of archive new service
  public function newserviceArchived()
	{
		$this->load->model('NewAddServiceModel');

    $data['archive_mode'] = true;
		$data['archived_new_service'] = $this->NewAddServiceModel->getArchivedNewService();
		$this->load->view('service/archiveFS', $data);
	}
}
