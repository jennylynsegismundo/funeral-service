<?php

class FuneralService_Model extends CI_Model
{
	// THE FINAL FUNCTION FOR RETRIEVING/DISPLAY THE ADDITIONAL PRODUCT AND SELECTED SERVICE ID OF IT.
	public function getDisplayService_Additional_Products($serviceId)
	{
		$this->db->select('additional_product_tbl.*');
    $this->db->from('service_additional_products_tbl');
    $this->db->join('additional_product_tbl', 'additional_product_tbl.id = service_additional_products_tbl.Product_ID');
    $this->db->where('service_additional_products_tbl.Service_ID', $serviceId);

    return $this->db->get()->result();
	}

	//#################################FOR SERVICE NEW DATABASE#################################################
	public function ServiceDBget()
	{
		$query = $this->db->get('service_tbl');
		return $query->result();
	}
	//################################ FOR SERVICE PRODUCT database ################################################
	public function InsertService_Product($serviceId, $productId)
	{
		$data = array(
        'Service_ID' => $serviceId,
        'Product_ID' => $productId
    );

    return $this->db->insert('service_additional_products_tbl', $data);
	}
	public function getAllProducts()
	{
		$query = $this->db->get('additional_product_tbl');
		return $query->result();
	}
	public function getService_Product($service_id)
	{
		$this->db->where('Service_ID', $service_id);
		$query = $this->db->get('service_additional_products_tbl');
		return $query->result();
	}
	// public function getService_Product()
	// {
	// 	$query = $this->db->get('service_products');
	// 	return $query->result();
	// }
	//#################################FOR SERVICE OLD DATABASE#################################################
	//called the service associated product
	// public function insertServiceAssociatedProducts($association_data)
	// {
  //   // Assuming 'service_associated_products_tbl' is the actual name of your table
  //   return $this->db->insert('service_associated_products_tbl', $association_data);
	// }
	//add service
	public function insertService($data)
	{
		var_dump($data);
		$this->db->insert('funeral_service_tbl', $data);
    return $this->db->insert_id();
	}
	//get data coming from database
	public function getService()
	{
		$query = $this->db->get('funeral_service_tbl');
		return $query->result();
	}

	public function getOtherService()
	{
		$query = $this->db->get('service_tbl');
		return $query->result();
	}
	//edit the each data
	public function editService($service_id)
	{
	  $query = $this->db->get_where('funeral_service_tbl', array('service_id' => $service_id));
	  return $query->row();
	}

	//to update the edit data
	// public function updateService($data, $service_id)
	// {
	// 	return $this->db->update('funeral_service_tbl', $data, array('service_id' => $service_id));
	// }
	//to update the edit data
	public function updateService($data, $service_id, $associatedProducts)
	{
		$this->db->trans_start();
		return $this->db->update('funeral_service_tbl', $data, array('service_id' => $service_id));
		// Delete existing associated products for the service
    $this->deleteServiceProducts($service_id);
		// Insert the updated associated products in service_additional_products_tbl
    foreach ($associatedProducts as $productId) {
        $this->insertServiceProduct($service_id, $productId);
    }
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	// para idelete yung naka dating store na service_id
	public function deleteServiceProducts($service_id)
	{
	  return $this->db->delete('service_additional_products_tbl', array('Service_ID' => $service_id));
	}
	//delete data from the system and to the database
	public function deleteService($service_id)
	{
		return $this->db->delete('funeral_service_tbl', array('service_id' => $service_id));
	}

	public function archiveFuneralServ($service_id)
	{
	    $data = array('is_archived' => 1); // Archive the casket
	    return $this->db->update('funeral_service_tbl', $data, array('service_id' => $service_id));
	}

	public function unarchiveFuneralServ($service_id)
	{
	    $data = array('is_archived' => 0); // Unarchive the casket
	    return $this->db->update('funeral_service_tbl', $data, array('service_id' => $service_id));
	}

	public function getArchivedFuneralServ()
	{
	    $this->db->where('is_archived', 1); // Filter archived caskets
	    $query = $this->db->get('funeral_service_tbl');
	    return $query->result();
	}
############################################################################################################################
}
