<?php

class InventoryModel extends CI_Model
{
  public function insertInventoryProduct($data)
	{
		return $this->db->insert('inventory_tbl', $data);
	}
  public function getInventory_tbl()
  {
    $query = $this->db->get('inventory_tbl');
    return $query->result();
  }
  public function editProductInventory($inventory_id)
  {
    $query = $this->db->get_where('inventory_tbl', array('inventory_id' => $inventory_id));
    return $query->row();
  }
  // update the edit page for product
  public function updateProductInventory($data, $inventory_id)
	{
		return $this->db->update('inventory_tbl', $data, array('inventory_id' => $inventory_id));
	}
}
