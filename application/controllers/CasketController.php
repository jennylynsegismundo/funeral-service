<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CasketController extends CI_Controller
{
  // TO LOAD THE MODEL AND THE OTHER LIBRARIES

  //TO VIEW THE CASKET PAGE (DATA TABLE)
  public function View_Casket()
  {
    $this->load->model('CasketModel');
		$data['casket'] = $this->CasketModel->Get_Casket();
		$archive_mode = $this->input->get('archive_mode');
		if ($archive_mode) {
				$data['archived_caskets'] = $this->CasketModel->getArchivedCasket();
		}
		$data['archive_mode'] = $archive_mode;
		$this->load->view('casket/casketview', $data);
  }
  //TO ADD CASKET IN SYSTEM (FORM)
  public function Add_Casket()
  {
    $this->load->view('casket/addcasket');
  }
  //TO STORE CASKET IN DATABASE
  public function Store_Casket()
  {
    $this->form_validation->set_rules('casket_name', 'Casket Name', 'required');
		$this->form_validation->set_rules('description', 'Casket Description', 'required');
		$this->form_validation->set_rules('casket_price', 'Casket Price', 'required|numeric');
		if ($this->form_validation->run())
		{
			$data = [
			  'casket_name' => $this->input->post('casket_name'),
				'description' => $this->input->post('description'),
				'casket_price' => $this->input->post('casket_price'),
			];

			$this->load->model('CasketModel');
			$this->CasketModel->Insert_Casket($data);
			redirect(base_url('casket'));
		}
		else
		{
			$this->Add_Casket();
		}
  }
  //TO EDIT CASKET DETAILS
  public function Edit_Casket($casket_id)
  {
    $this->load->model('CasketModel');
		$data ['casket'] = $this->CasketModel->EditCasket($casket_id);
		$this->load->view('casket/editcasket', $data);
  }
  // TO UPDATE IN THE DATABASE THE EDIT CASKET DETAILS
  public function Update_Casket($casket_id)
  {
    $this->form_validation->set_rules('casket_name', 'Casket Name', 'required');
		$this->form_validation->set_rules('description', 'Casket Description', 'required');
		$this->form_validation->set_rules('casket_price', 'Casket Price', 'required|numeric');
		if ($this->form_validation->run())
		{
				$data = [
					'casket_name' => $this->input->post('casket_name'),
					'description' => $this->input->post('description'),
					'casket_price' => $this->input->post('casket_price'),
				];
				$this->load->model('CasketModel');
				$this->CasketModel->UpdateCasket($data, $casket_id);
				redirect(base_url('casket'));
		}
		else
		{
			$this->Edit_Casket($casket_id);
		}
  }
  // TO DELETE CASKET IN THE DATABASE AND IN SYSTEM
  public function Delete_Casket($casket_id)
  {
    $this->load->model('CasketModel');
		$this->CasketModel->DeleteCasket($casket_id);
		redirect(base_url('casket'));
  }
  // TO ARCHIVE THE CASKET
  public function Archive_Casket($casket_id)
  {
    $this->load->model('CasketModel');
    $this->CasketModel->ArchiveCasket($casket_id);
    redirect(base_url('casket'));
  }
  // TO UNARCHIVE THE CASKET
  public function Unarchive_Casket($casket_id)
  {
    $this->load->model('CasketModel');
    $this->CasketModel->UnarchiveCasket($casket_id);
    redirect(base_url('archive_casket'));
  }
  // TO VIEW THE ARCHIVE CASKET (DATA TABLE)
  public function View_Archive_Casket()
  {
    $this->load->model('CasketModel');
    $data['archive_mode'] = true;
    $data['archived_caskets'] = $this->CasketModel->getArchivedCasket();
    $this->load->view('casket/archivecasket', $data);
  }
}
