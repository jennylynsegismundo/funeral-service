<?php

class UrnModel extends CI_Model
{
  public function getUrns()
	{
		$query = $this->db->get('urns_tbl');
		return $query->result();
	}

	public function insertUrn($data)
	{
		return $this->db->insert('urns_tbl', $data);
	}

	public function edit_urn($urn_id)
	{
		$query = $this->db->get_where('urns_tbl', array('urn_id' => $urn_id));
	    return $query->row();
	}

	public function update_urn($data, $urn_id)
	{
		return $this->db->update('urns_tbl', $data, array('urn_id' => $urn_id));
	}

	public function delete_urn($urn_id)
	{
		return $this->db->delete('urns_tbl', array('urn_id' => $urn_id));
	}

	public function archive_urn($urn_id)
	{
	    $data = array('is_archived' => 1); // Archive the product
	    return $this->db->update('urns_tbl', $data, array('urn_id' => $urn_id));
	}

	public function unarchive_urn($urn_id)
	{
	    $data = array('is_archived' => 0); // Unarchive the product
	    return $this->db->update('urns_tbl', $data, array('urn_id' => $urn_id));
	}

	public function getArchivedUrn()
	{
	    $this->db->where('is_archived', 1); // Filter archived urns
	    $query = $this->db->get('urns_tbl');
	    return $query->result();
	}
  // Example of a function in your CasketModel or UrnModel
  public function checkUrnExists($urn_id) {
      // Query the caskets table to check if the casket_id exists
      $query = $this->db->get_where('urns_tbl', array('urn_id' => $urn_id));
      return $query->num_rows() > 0; // Returns true if the casket_id exists, false otherwise
  }
}
