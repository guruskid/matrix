<?php
class Logout extends CI_Controller{
  function __construct(){
    parent::__construct();
    
  }

    function index(){
      $this->session->sess_destroy();
      $this->session->unset_userdata('logged_in');
      $this->session->set_flashdata('flash_message' , 'Logout Successfully');
      redirect(base_url(), 'refresh');
    }

  
}