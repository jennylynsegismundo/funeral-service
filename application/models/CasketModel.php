<?php

class CasketModel extends CI_Model
{
  // TO INSERT CASKET
  public function Insert_Casket($data)
  {
    return $this->db->insert('casket_tbl', $data);
  }
  // TO GET/FETCH THE CASKET TABLE
  public function Get_Casket()
  {
    $query = $this->db->get('casket_tbl');
		return $query->result();
  }
  // TO EDIT THE CASKET
  public function EditCasket($casket_id)
  {
    $query = $this->db->get_where('casket_tbl', array('casket_id' => $casket_id));
	  return $query->row();
  }
  // UPDATE CASKET
  public function UpdateCasket($data, $casket_id)
  {
    return $this->db->update('casket_tbl', $data, array('casket_id' => $casket_id));
  }
  // DELETE CASKET
  public function DeleteCasket($casket_id)
	{
		return $this->db->delete('casket_tbl', array('casket_id' => $casket_id));
	}
  // ARCHIVE CASKET
	public function ArchiveCasket($casket_id)
	{
	  $data = array('is_archived' => 1);
	  return $this->db->update('casket_tbl', $data, array('casket_id' => $casket_id));
	}
  // UNARCHIVE CASKET
	public function UnarchiveCasket($casket_id)
	{
	  $data = array('is_archived' => 0);
	  return $this->db->update('casket_tbl', $data, array('casket_id' => $casket_id));
	}
  // TO SHOW THE WHICH CASKET ARE SELECTED AS ARCHIVE
	public function getArchivedCasket()
	{
	  $this->db->where('is_archived', 1); // Filter archived caskets
	  $query = $this->db->get('casket_tbl');
	  return $query->result();
	}
  // Example of a function in your CasketModel or UrnModel
  public function checkCasketExists($casket_id) {
      // Query the caskets table to check if the casket_id exists
      $query = $this->db->get_where('casket_tbl', array('casket_id' => $casket_id));
      return $query->num_rows() > 0; // Returns true if the casket_id exists, false otherwise
  }

}
