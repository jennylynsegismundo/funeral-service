<?php

class ScheduleModel extends CI_Model
{
  // TO FETCH THE SERVICE AND PRODUCT
  public function getServiceandProduct()
  {
    $this->db->select('fs.service_id, fs.service_name, fs.price AS service_price, ap.additional_serv_type, ap.additional_price');
    $this->db->from('funeral_service_tbl fs');
    $this->db->join('service_products sp', 'fs.service_id = sp.serv_id');
    $this->db->join('additional_product_tbl ap', 'sp.product_id = ap.id');

    $query = $this->db->get();
    return $query->result_array();
  }
  public function addSchedule($data)
  {
    return $this->db->insert('service_sched_tbl', $data);
  }
  // //to fetch the data in database to view in scheduler datatable
  // public function getServiceSched()
  // {
  //   $query = $this->db->get('service_sched_tbl');
  //   return $query->result();
  // }
  // Fetch the schedule data along with the status attribute
  public function getSchedule()
  {
    // $this->db->select('*'); // Select all fields
    // $query = $this->db->get('service_sched_tbl');
    // return $query->result();

    $query = $this->db->query("SELECT * FROM service_sched_tbl WHERE status = 'Scheduled'");
    return $query->result();
  }
  //TO VIEW THE COMPLETE SCHEDULE
  public function getCompleteSched()
  {
    $query = $this->db->query("SELECT * FROM service_sched_tbl WHERE status = 'Completed'");
    return $query->result();
  }
  //TO VIEW THE SCHEDULED STATUS
  public function viewstatusScheduled()
  {
    $query = $this->db->query("SELECT * FROM service_sched_tbl WHERE status = 'In Progress'");
    return $query->result();
  }
  //to insert completed service data into the new table.
  // public function insertCompletedService($data)
  // {
  //   return $this->db->insert('completed_sched_serv_tbl', $data);
  // }
  // Fetch schedule details based on schedule ID
  public function getScheduleDetails($sched_id)
  {
    $this->db->where('sched_id', $sched_id);
    $query = $this->db->get('service_sched_tbl');
    return $query->row(); // Return a single row (schedule details)
  }
  //to select which sched_id will choose to edit the schedule date
  public function editSchedule($sched_id)
  {
    $query = $this->db->get_where('service_sched_tbl', array('sched_id' => $sched_id));
    return $query->row();
  }
  //to updated the selected edit data in schedule
  public function updateSchedule($data, $sched_id)
  {
    return $this->db->update('service_sched_tbl', $data, array('sched_id' => $sched_id));
  }
  //FUNCTION FOR INSERTING BIRTH CERTIFICATE IMAGE
  public function insertCertificate($data)
  {
    return $this->db->insert('service_sched_tbl', $data);
  }
}
