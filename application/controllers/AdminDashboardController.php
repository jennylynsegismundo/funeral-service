<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboardController extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
	}
  //TO VIEW THE PAGE OF ADMIN PAGE
  public function Admindashboardview()
  {
    $this->load->view('templatedashboard');
  }
  //TO VIEW THE SERVICE Page
  public function ServiceView()
  {
    $this->load->view('service');
  }
  //TO VIEW THE PAGE OF ADD ADDITIONAL SERVICE
  public function AddadditionalServiceView()
  {
    $this->load->view('additionalserv/addAdditionalservice');
  }
  //TO VIEW THE PAGE OF ADD CASKET PRODUCT
  public function AddCasketView()
  {
    $this->load->view('casket/addCasket');
  }
  //TO VIEW THE PAGE OF ADD URN PRODUCT
  public function AddUrnView()
  {
    $this->load->view('urn/addUrn');
  }
  // ######################################################################################################################################################
  // VIEW THE TABLE OF CUSTOMER
  public function ViewCustomerDetails()
  {
    $data['customer_account'] = $this->User_Model->getCustomerAccount();
    $archive_mode = $this->input->get('archive_mode');
		if ($archive_mode) {
				$data['archived_customer_accs'] = $this->User_Model->getArchivedCustomerAcc();
		}
		$data['archive_mode'] = $archive_mode;
    $this->load->view('customer_account/viewcustomeraccount', $data);
  }
  // CUSTOMER ACCOUNT EDIT
  public function Edit_Customer_Acc($user_id)
  {
    $data['edit_account'] = $this->User_Model->EditCustomerAcc($user_id);
    $this->load->view('customer_account/editcustomeracc', $data);
  }
  // TO UPDATE CUSTOMER DETAILS
  public function Update_Customer_Acc($user_id)
  {
    $this->form_validation->set_rules('cust_name', 'Casket Name', 'required');
		$this->form_validation->set_rules('cust_cont_no', 'Casket Description', 'required');
		$this->form_validation->set_rules('cust_address', 'Casket Price', 'required');
    $this->form_validation->set_rules('username', 'Casket Price', 'required');
    $this->form_validation->set_rules('email', 'Casket Price', 'required');
    $this->form_validation->set_rules('password', 'Casket Price', 'required');

		if ($this->form_validation->run())
		{
				$data = [
					'cust_name' => $this->input->post('cust_name'),
					'cust_cont_no' => $this->input->post('cust_cont_no'),
					'cust_address' => $this->input->post('cust_address'),
          'username' => $this->input->post('username'),
          'email' => $this->input->post('email'),
          'password' => $this->input->post('password'),
				];
				$this->User_Model->UpdateCustomerAcc($data, $user_id);
				redirect(base_url('CustomersAccount'));
		}
		else
		{
			$this->Edit_Customer_Acc($user_id);
		}
  }
  // TO DELETE CASKET IN THE DATABASE AND IN SYSTEM
  public function Delete_Customer_Acc($user_id)
  {
		$this->User_Model->DeleteCustomerAcc($user_id);
		redirect(base_url('CustomersAccount'));
  }
  // TO ARCHIVE THE CASKET
  public function Archive_Customer_Acc($user_id)
  {
    $this->User_Model->ArchiveCustomerAcc($user_id);
    redirect(base_url('CustomersAccount'));
  }
  // TO UNARCHIVE THE CASKET
  public function Unarchive_CustomerAcc($user_id)
  {
    $this->User_Model->UnarchiveCustomerAcc($user_id);
    redirect(base_url('archive_casket'));
  }
  // TO VIEW THE ARCHIVE CASKET (DATA TABLE)
  public function View_Archive_CustomerAcc()
  {
    $data['archive_mode'] = true;
    $data['archived_customer_accs'] = $this->User_Model->getArchivedCustomerAcc();
    $this->load->view('customer_account/archivecustomeracc', $data);
  }
}
