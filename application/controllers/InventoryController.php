<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryController extends CI_Controller
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
		$this->load->model('AdditionalProductModel');
	}
	//TO VIEW THE ADMIN INVENTORY
	public function InventoryManagementView()
	{
		$this->load->model('InventoryModel');
		$data['inventoryprod'] = $this->InventoryModel->getInventory_tbl();

		$this->load->view('Sidebar/adminInventory', $data);
	}
	//TO ADD PRODUCT FOR INVENTORY
	public function AddProductInventory()
	{
		$data['casket_products'] = $this->CasketModel->Get_Casket();
		$data['urn_products'] = $this->UrnModel->getUrns();
		$data['additional_products'] = $this->AdditionalProductModel->getAdditionalService();
		$this->load->view('inventory/addproduct', $data);
	}
	//store the add product in inventory
	public function storeinInventory()
	{
		$this->form_validation->set_rules('inventory_name', 'Product Name', 'required');
		$this->form_validation->set_rules('inventory_stock', 'Quantity in Stock', 'required');
		$this->form_validation->set_rules('unit_price', 'Unit Price', 'required|numeric');
		$this->form_validation->set_rules('inventory_category', 'Category', 'required');
		$this->form_validation->set_rules('date_restock', 'Date Restock', 'required');

		if ($this->form_validation->run())
		{
			$data = [
				'inventory_name' => $this->input->post('inventory_name'),
				'inventory_stock' => $this->input->post('inventory_stock'),
				'unit_price' => $this->input->post('unit_price'),
				'inventory_category' => $this->input->post('inventory_category'),
				'date_restock' => $this->input->post('date_restock'),
			];

			$this->load->model('InventoryModel');
			$this->InventoryModel->insertInventoryProduct($data);
			redirect(base_url('Inventory'));
		}
		else {
			$this->AddProductInventory();
		}
	}
	//edit of product
	public function editProductInventory($inventory_id)
	{
		$this->load->model('InventoryModel');
		$data['products'] = $this->InventoryModel->editProductInventory($inventory_id);
		if ($data['products'])
		{
			$this->load->model('FuneralService_Model');
			$data['caskets'] = $this->FuneralService_Model->getCaskets();
			$this->load->model('FuneralService_Model');
			$data['urns'] = $this->FuneralService_Model->getUrns();
			$this->load->model('FuneralService_Model');
			$data['additional_prods'] = $this->FuneralService_Model->getAssociatedProduct();
			$this->load->view('inventory/editProduct', $data);
		}
	}
	public function updateProductInventory($inventory_id)
	{
		$this->form_validation->set_rules('inventory_name', 'Product Name', 'required');
		$this->form_validation->set_rules('inventory_stock', 'Quantity in Stock', 'required');
		$this->form_validation->set_rules('unit_price', 'Unit Price', 'required|numeric');
		$this->form_validation->set_rules('inventory_category', 'Category', 'required');
		$this->form_validation->set_rules('date_restock', 'Date Restock', 'required');

		if ($this->form_validation->run())
		{
			$data = [
				'inventory_name' => $this->input->post('inventory_name'),
				'inventory_stock' => $this->input->post('inventory_stock'),
				'unit_price' => $this->input->post('unit_price'),
				'inventory_category' => $this->input->post('inventory_category'),
				'date_restock' => $this->input->post('date_restock'),
			];

			$this->load->model('InventoryModel');
      $this->NewAddServiceModel->updateProductInventory($data, $inventory_id);
      redirect(base_url('Inventory'));
		}
		else {
			$this->editProductInventory($inventory_id);
		}
	}
}
