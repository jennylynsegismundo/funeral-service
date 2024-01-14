<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerViewServiceController extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('NewAddServiceModel');
		$this->load->model('FuneralService_Model');
		$this->load->model('AdditionalProductModel');
    $this->load->model('CustomerViewServiceModel');
	}
  public function viewSchedService()
  {
    $this->load->view('customerdashboard/customerviewschedservice');
  }
  public function exampledashboard()
  {
    $this->load->view('dashboardCustomer');
  }
  //TO VIEW THE PAGE OF DASHBOARD OF CUSTOMER
  public function DashboardOfCustomer()
  {
    $this->load->view('customerdashboard/dashboardofcustomer');
  }
  //to show the page of availble for customer dashboard
  public function customerDashboard()
	{
    $data['new_services'] = $this->CustomerViewServiceModel->getAvailableNewServices();
		$data['other_services'] = $this->CustomerViewServiceModel->getAvailableServices();

    $data['services'] = array_merge($data['other_services'], $data['new_services']);
    // Fetch additional products for each service
    foreach ($data['services'] as $service) {
      if (isset($service->service_id)) {
          $service->associated_products = $this->FuneralService_Model->getDisplayService_Additional_Products($service->service_id);
      } elseif (isset($service->new_service_id)) {
          $service->associated_products = $this->NewAddServiceModel->getDisplayNew_Service_Additional_Products($service->new_service_id);
      }
    }

		$this->load->view('customerdashboard/customerdashboard', $data);
	}
  //to show the page of available casket product in customer dashboard
  public function showCasketInCustomerPage()
  {
    $this->load->model('CustomerViewServiceModel');
    $data['casket'] = $this->CustomerViewServiceModel->getAvailableCasket();
    $this->load->view('customerdashboard/customershowcasket', $data);
  }
  //to show the page of available urn product in customer dashboard
  public function showUrnInCustomerPage()
  {
    $this->load->model('CustomerViewServiceModel');
    $data['urn'] = $this->CustomerViewServiceModel->getAvailableUrn();
    $this->load->view('customerdashboard/customershowurn', $data);
  }
  //to show the page of available additional service in customer dashboard
  public function showAdditionalServInCustomerPage()
  {
    $this->load->model('CustomerViewServiceModel');
    $data['additionalserv'] = $this->CustomerViewServiceModel->getAvailableAdditionalServ();
    $this->load->view('customerdashboard/customershowadditionalservice', $data);
  }

}
