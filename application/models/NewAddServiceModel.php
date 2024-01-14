<?php

class NewAddServiceModel extends CI_Model
{
  public function insertServiceProduct($serv_id, $product_id)
  {
    $data = [
        'serv_id' => $serv_id,
        'product_id' => $product_id,
    ];
    return $this->db->insert('service_products', $data);
  }
  public function getServiceProduct()
  {
    $query = $this->db->get('service_products');
		return $query->result();
  }
  ##################################################################################################################
  public function InputNewService($data)
  {
    $this->db->insert('new_add_service', $data);
    return $this->db->insert_id();
  }
  // THE FINAL FUNCTION FOR RETRIEVING/DISPLAY THE ADDITIONAL PRODUCT AND SELECTED SERVICE ID OF IT.
	public function getDisplayNew_Service_Additional_Products($newserviceId)
	{
		$this->db->select('additional_product_tbl.*');
    $this->db->from('new_service_additional_products_tbl');
    $this->db->join('additional_product_tbl', 'additional_product_tbl.id = new_service_additional_products_tbl.Product_ID');
    $this->db->where('new_service_additional_products_tbl.New_Service_ID', $newserviceId);
    return $this->db->get()->result();
	}
  public function updateAssociatedProducts($new_service_id, $associatedProducts)
  {
    // Delete existing associated products for the new service
    $this->db->where('New_Service_ID', $new_service_id);
    $this->db->delete('new_service_additional_products_tbl');
    // Insert updated associated products for the new service
    foreach ($associatedProducts as $productId) {
      $this->InsertNew_Service_Product($new_service_id, $productId);
    }
  }
  // TO GET THE NEW SERVICE ADDITIONAL PRODUCT IN NEW SERVICE
  public function InsertNew_Service_Product($newserviceId, $productId)
	{
		$data = array(
        'New_Service_ID' => $newserviceId,
        'Product_ID' => $productId
    );
    return $this->db->insert('new_service_additional_products_tbl', $data);
	}
  public function getNewService()
  {
    $query = $this->db->get('new_add_service');
    return $query->result();
  }
  public function editNewService($new_service_id)
  {
    $query = $this->db->get_where('new_add_service', array('new_service_id' => $new_service_id));
    return $query->row();
  }
  // update the edit page for new service page
  public function updateNewService($data, $new_service_id)
	{
		return $this->db->update('new_add_service', $data, array('new_service_id' => $new_service_id));
	}
  //delete data from the system and to the database
	public function deleteNewService($new_service_id)
	{
		return $this->db->delete('new_add_service', array('new_service_id' => $new_service_id));
	}
  public function archiveNewService($new_service_id)
	{
	  $data = array('is_archived' => 1); // Archive the casket
	  return $this->db->update('new_add_service', $data, array('new_service_id' => $new_service_id));
	}
	public function unarchiveNewService($new_service_id)
	{
	  $data = array('is_archived' => 0); // Unarchive the casket
	  return $this->db->update('new_add_service', $data, array('new_service_id' => $new_service_id));
	}
	public function getArchivedNewService()
	{
	  $this->db->where('is_archived', 1); // Filter archived caskets
	  $query = $this->db->get('new_add_service');
    return $query->result();
	}
  // to show the selected additional product in edit form
  public function getServiceDetails($newserviceId) {
    $query = $this->db
        ->select('new_add_service.*, GROUP_CONCAT(additional_product_tbl.additional_serv_type SEPARATOR ", ") as additional_products')
        ->from('new_add_service')
        ->join('new_service_additional_products_tbl', 'new_service_additional_products_tbl.New_Service_ID = new_add_service.new_service_id')
        ->join('additional_product_tbl', 'additional_product_tbl.id = new_service_additional_products_tbl.Product_ID')
        ->where('new_add_service.new_service_id', $newserviceId)
        ->group_by('new_add_service.new_service_id');
    return $query->get()->result();
  }

}
