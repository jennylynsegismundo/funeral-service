<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('authenticationacc/templatelogin');
	}

	//to recognize the register account in login page
	function logInAcc()
	{
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('username', 'User Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				// $password = sha1($password);

				$this->load->model('User_Model');
				$status = $this->User_Model->checkLoginAcc($password, $username);

				if ($status!=false)
				{
					// Fetch user data including user_id
        	$userData = $this->User_Model->getUserData($username);
					$role = $this->User_Model->getUserRole($username);

					if ($role == 'admin')
					{
						$username = $status->username;
						// $email = $status->email;

						$session_data = array(
							'username' => $username,
							// 'email' => $email,
							'is_admin' => true,
						);

						$this->session->set_userdata('UserLoginSession', $session_data);

						redirect(base_url('AdminDashboard'));
					}
					elseif ($role == 'customer')
					{
						$userId = $userData->user_id; // Fetch the user_id from user data
						$username = $status->username;
						// $email = $status->email;

						$session_data = array(
							'username' => $username,
							// 'email' => $email,
							'is_customer' => true,
						);
						$this->session->set_userdata('UserLoginSession', $session_data);

            redirect(base_url('Customer_Dashboard'));
					}
					else
					{
						//$this->index();
						redirect(base_url('home'));
					}
				}
				else
				{
					$this->index();
				}
			}
			else
			{
				$this->index();
			}
		}
	}

	//to view/load the register page
	function register()
	{
		$this->load->view('authenticationacc/templateregister');
	}

	//for user wants to register an account make it into the database
	function registerAcc()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('cust_name', 'Customer Name', 'required');
			$this->form_validation->set_rules('cust_cont_no', 'Customer Contact Number', 'required|numeric');
			$this->form_validation->set_rules('cust_address', 'User Name', 'required');
			$this->form_validation->set_rules('username', 'User Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required'); // Add validation for role


			if ($this->form_validation->run()==TRUE)
			{
				$cust_name = $this->input->post('cust_name');
				$cust_cont_no = $this->input->post('cust_cont_no');
				$cust_address = $this->input->post('cust_address');
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$role = $this->input->post('role'); // Get the selected role

				$data = array(
					'cust_name' => $cust_name,
					'cust_cont_no' => $cust_cont_no,
					'cust_address' => $cust_address,
					'username' => $username,
					'email' => $email,
					'password' => $password, //sha1($password),
					'role' => $role, // Add role to the data array
					'status' => '1'
				);

				$this->load->model('User_Model');
				$this->User_Model->insert_user($data);
				$this->session->set_flashdata('success', 'Successfully User Created');

				redirect(base_url('home'));
			}
			else {
				$this->register();
			}
		}
	}

	//to view/load the dashboard
	function dashboard()
	{
		$this->load->view('Sidebar/dashboard');
	}
	//once the logout button click this will trigger to back in the log in page
	function logout()
	{
		session_destroy();
		redirect(base_url('home'));
	}
}
