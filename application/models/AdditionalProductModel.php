<?php

class AdditionalProductModel extends CI_Model
{
  public function getAdditionalService()
	{
		$query = $this->db->get('additional_product_tbl');
		return $query->result();
	}

	public function insert_additional_serv($data)
	{
		return $this->db->insert('additional_product_tbl', $data);
	}

	public function edit_additional_serv($id)
	{
	    $query = $this->db->get_where('additional_product_tbl', array('id' => $id));
	    return $query->row();
	}

	public function update_additional_serv($data, $id)
	{
		return $this->db->update('additional_product_tbl', $data, array('id' => $id));
	}

	public function delete_additional_service($id)
	{
		return $this->db->delete('additional_product_tbl', array('id' => $id));
	}

	public function archive_addserv($id)
	{
		$data = array('is_archived' => 1); // Archive the product
		return $this->db->update('additional_product_tbl', $data, array('id' => $id));
	}

	public function unarchive_addserv($id)
	{
	    $data = array('is_archived' => 0); // Unarchive the product
	    return $this->db->update('additional_product_tbl', $data, array('id' => $id));
	}

	public function getArchivedAdditional_service()
	{
	    $this->db->where('is_archived', 1); // Filter archived urns
	    $query = $this->db->get('additional_product_tbl');
	    return $query->result();
	}
}
