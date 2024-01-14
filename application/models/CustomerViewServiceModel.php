<?php

class CustomerViewServiceModel extends CI_Model
{
  //to get the available funeral services inside of database
  public function getAvailableServices()
  {
      // Query your database to retrieve non-archived services
      $this->db->where('is_archived', 0); // Filter non-archived services
      $query = $this->db->get('funeral_service_tbl'); // Modify this to fit your data structure
      return $query->result();
  }
  //to get the available funeral services inside of database
  public function getAvailableNewServices()
  {
      // Query your database to retrieve non-archived services
      $this->db->where('is_archived', 0); // Filter non-archived services
      $query = $this->db->get('new_add_service'); // Modify this to fit your data structure
      return $query->result();
  }
  //to get the available casket products inside of database
  public function getAvailableCasket()
  {
    // Query your database to retrieve non-archived services
    $this->db->where('is_archived', 0); // Filter non-archived services
    $query = $this->db->get('casket_tbl'); // Modify this to fit your data structure
    return $query->result();
  }
  //to get the available urn products inside of database
  public function getAvailableUrn()
  {
    // Query your database to retrieve non-archived services
    $this->db->where('is_archived', 0); // Filter non-archived services
    $query = $this->db->get('urns_tbl'); // Modify this to fit your data structure
    return $query->result();
  }
  //to get the available additional service inside of database
  public function getAvailableAdditionalServ()
  {
    // Query your database to retrieve non-archived services
    $this->db->where('is_archived', 0); // Filter non-archived services
    $query = $this->db->get('additional_product_tbl'); // Modify this to fit your data structure
    return $query->result();
  }
}
