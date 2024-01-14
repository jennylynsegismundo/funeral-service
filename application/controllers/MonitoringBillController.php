<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MonitoringBillController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('NewAddServiceModel');
		$this->load->model('FuneralService_Model');
		$this->load->model('AdditionalProductModel');
    $this->load->model('CustomerViewServiceModel');
	}
	//to view/load the monitoring bill page
	function monitoring_bill()
	{
		$this->load->view('Sidebar/monitoringbill');
	}
	public function ViewTheBillDetails()
	{
		$this->load->view('billing/viewbilldetails');
	}
}
