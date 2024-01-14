<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class StartToEndController extends CI_Controller
{
  // PURPOSE TO CALLED THE MODEL AND OTHER LIBRARIES
  public function __construct()
  {
    parent::__construct();
    $this->load->model('StartToEndModel'); // Load the model
  }
  // TO DISPLAY THE DATA TABLE OF START TO END TRANSACTION/RECORD
  public function ViewStartToEnd()
  {
    $data['start_to_ends'] = $this->StartToEndModel->getStart_to_End();
    $this->load->view('StartToEnd/viewStartToEnd', $data);
  }
  // THE PAGE TO VIEW/SHOW ALL END SERVICE RECORD
  public function ViewEndServiceRecord()
  {
    $data['start_to_ends'] = $this->StartToEndModel->getStart_to_End();
    $this->load->view('StartToEnd/endservicerecord', $data);
  }
}
