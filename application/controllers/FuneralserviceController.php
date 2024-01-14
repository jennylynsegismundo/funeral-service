<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FuneralserviceController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('NewAddServiceModel');
		$this->load->model('FuneralService_Model');
		$this->load->model('AdditionalProductModel');
	}
	//to view/load the manage funeral service
	public function funeral_service()
	{
		//fetch funeral service with associated products
		// $data['service_with_products'] = $this->FuneralService_Model->getServiceWithAssociatedProducts();
    // Load casket data
    $data['other_services'] = $this->FuneralService_Model->getService();
		$data['new_service'] = $this->NewAddServiceModel->getNewService();

		$data['services'] = array_merge($data['other_services'], $data['new_service']);
		// var_dump($data['services']);
		// Loop through services and fetch associated products for each service
		foreach ($data['services'] as $service) {
	    if (isset($service->service_id)) {
	        $service->associated_products = $this->FuneralService_Model->getDisplayService_Additional_Products($service->service_id);
	    } elseif (isset($service->new_service_id)) {
	        $service->associated_products = $this->NewAddServiceModel->getDisplayNew_Service_Additional_Products($service->new_service_id);
	    }
		}

    $archive_mode = $this->input->get('archive_mode'); // Check if archive mode is enabled
    if ($archive_mode) {
        // Load archived caskets
        $data['archived_service'] = $this->FuneralService_Model->getArchivedFuneralServ();
    }
    $data['archive_mode'] = $archive_mode;
		$this->load->view('Sidebar/managefuneralservice', $data);
	}
	//VIEW ADD Service
	public function AddServiceView()
	{
		$data['additional_products'] = $this->AdditionalProductModel->getAdditionalService();
		$data['other_services'] = $this->FuneralService_Model->getOtherService();
		$data['new_services'] = $this->NewAddServiceModel->getNewService();

		$this->load->view('service/addservice', $data);
	}
	// to store the added service
	public function store_service()
	{
	  if ($this->input->post('new_service_name') && $this->input->post('new_service_price'))
		{
		 	// Condition to handle adding a new service
		  $this->form_validation->set_rules('new_service_name', 'New Service', 'required');
		  $this->form_validation->set_rules('new_service_price', 'New Price', 'required|numeric');
		  $this->form_validation->set_rules('associated_prod_id[]', 'Associated Products', 'required');

		  if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('AddService');
			}
			else {
				$serviceData = [
		      'new_service_name' => $this->input->post('new_service_name'),
		      'new_service_price' => $this->input->post('new_service_price'),
		    ];
				// Retrieve selected associated product IDs from the form
        $associatedProducts = $this->input->post('associated_prod_id');
        $insertedServiceId = $this->NewAddServiceModel->InputNewService($serviceData);

        // Insert associated products into service_product table for the new service
        if ($insertedServiceId && !empty($associatedProducts)) {
            foreach ($associatedProducts as $productId) {
                $this->NewAddServiceModel->InsertNew_Service_Product($insertedServiceId, $productId);
            }
        }
        // Redirect or load view based on the insertion result for adding a new service
        if ($insertedServiceId) {
            $this->session->set_flashdata('success', 'Service Successfully added.');
            redirect(base_url('funeralservices')); // Redirect to success page
        } else {
            $this->AddServiceView(); // Load error view
        }
		  }
		} else {
	    $this->form_validation->set_rules('service_name', 'Service Name', 'required');
	    $this->form_validation->set_rules('price', 'Price', 'required|numeric');
	    $this->form_validation->set_rules('associated_prod_id[]', 'Associated Products', 'required');

	    if ($this->form_validation->run() == FALSE) {
	     // Form validation failed, load the view with errors
	     $this->load->view('AddService');
	    } else {
	      // Form validation succeeded, process the data
	      $serviceData = [
	         'service_name' => $this->input->post('service_name'),
	         'price' => $this->input->post('price'),
	         // Add other form fields to be inserted into funeral_service_tbl
	      ];

	      // Retrieve selected associated product names from the form
	      $associatedProducts = $this->input->post('associated_prod_id');
	      $insertedServiceId = $this->FuneralService_Model->insertService($serviceData);

	      // Insert associated products into service_product table
	      if ($insertedServiceId && !empty($associatedProducts)) {
	        foreach ($associatedProducts as $productId) {
	         $this->FuneralService_Model->InsertService_Product($insertedServiceId, $productId);
	      	}
	      }
				//
	      // // Redirect or load view based on the insertion result
	      if ($insertedServiceId) {
					$this->session->set_flashdata('success', 'Service Successfully added.');
	        redirect(base_url('funeralservices')); // Redirect to success page
	      } else {
	        $this->AddServiceView(); // Load error view
	      }
	   	}
	  }
	}
	//edit the service
	public function edit($service_id)
	{
		$data['services'] = $this->FuneralService_Model->editService($service_id);
		if ($data['services'])
		{
			$data['new_services'] = $this->NewAddServiceModel->getNewService();
			$data['other_services'] = $this->FuneralService_Model->getOtherService();
			$serv_id = $data['services']->service_id;
			// Retrieve all products na galing sa 'additional_product_tbl' sa database
      $data['all_products'] = $this->FuneralService_Model->getAllProducts();
			// ito ay para lumabas yung pinili lang na product na galing sa 'additional_product_tbl'
			$data['additional_prods'] = $this->FuneralService_Model->getService_Product($service_id);
			$this->load->view('service/editservice', $data);
		}
	}
	//update the edit service
	public function update($service_id)
	{
		$this->form_validation->set_rules('service_name', 'Service Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');
		// $this->form_validation->set_rules('associated_products', 'Associated Products', 'required');
		$this->form_validation->set_rules('associated_products[]', 'Associated Products', 'required');

		if ($this->form_validation->run())
		{
			$data = [
				'service_name' => $this->input->post('service_name'),
				'price' => $this->input->post('price'),
				// 'associated_products' => $this->input->post('associated_products'),
			];
			// Kunin ang mga napiling IDs ng kaugnay na produkto mula sa form
			$associatedProducts = $this->input->post('associated_products[]');
			// I-update ang serbisyo sa funeral_service_tbl at mga kaugnay na produkto sa service_additional_products_tbl
			$result = $this->FuneralService_Model->updateService($data, $service_id, $associatedProducts);
			if ($result) {
				// I-redirect o i-load ang view base sa resulta ng update
				redirect(base_url('funeralservices'));
			} else {
				// I-load ang error view
				$this->edit($service_id);
			}
		}
	}
	//delete the service
	public function delete($service_id)
	{
		$this->FuneralService_Model->deleteService($service_id);
		redirect(base_url('funeralservices'));
	}
	//archive the funeral service
	public function archiveFuneralServ($service_id)
	{
	    $this->FuneralService_Model->archiveFuneralServ($service_id);
	    redirect(base_url('funeralservices'));
	}
	//unarchive method in funeral service
	public function unarchiveFuneralServ($service_id)
	{
	    $this->FuneralService_Model->unarchiveFuneralServ($service_id);
	    redirect(base_url('archiveFuneralService'));
	}
	//method to show the page of funeral service
	public function archiveFuneralservicePage()
	{
    $data['archive_mode'] = true;
    $data['archived_service'] = $this->FuneralService_Model->getArchivedFuneralServ();
		$data['archived_new_service'] = $this->NewAddServiceModel->getArchivedNewService();

		$data['services'] = array_merge($data['archived_service'], $data['archived_new_service']);
		foreach ($data['services'] as $service) {
	    if (isset($service->service_id)) {
	        $service->associated_products = $this->FuneralService_Model->getDisplayService_Additional_Products($service->service_id);
	    } elseif (isset($service->new_service_id)) {
	        $service->associated_products = $this->NewAddServiceModel->getDisplayNew_Service_Additional_Products($service->new_service_id);
	    }
		}
		$this->load->view('service/archiveFS', $data);
	}
}
