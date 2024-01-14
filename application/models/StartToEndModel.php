<?php

class StartToEndModel extends CI_Model
{
  // TO SHOW ALL DATA IN START TO END TABLE DATABASE
  public function getStart_to_End()
  {
    $query = $this->db->get('start_to_end');
		return $query->result();
  }
  // TO INSERT DATA IN START TO END DATABASE
  public function insertStart_to_end($data)
  {
    return $this->db->insert('start_to_end', $data);
  }
  // TO FETCH THE DATA OF TWO DATABASE TABLE (SERVICE_SCHED_TBL & START_TO_END)
  public function getServiceSchedule_Start_to_End()
  {
    $this->db->select('start_to_end.start_to_end_id, start_to_end.sched_id, service_sched_tbl.schedule_title, service_sched_tbl.start_date, service_sched_tbl.end_date');
    $this->db->from('start_to_end');
    $this->db->join('service_sched_tbl', 'start_to_end.sched_id = service_sched_tbl.sched_id');
    $query = $this->db->get();
    return $query->result();
  }
  public function editStartToEnd($start_to_end_id)
  {
    $query = $this->db->get_where('start_to_end', array('start_to_end_id' => $start_to_end_id));
	  return $query->row();
  }
}
