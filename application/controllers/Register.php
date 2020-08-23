<?php
class Register extends CI_Controller{
  function __construct(){
    parent::__construct();
    
  }

    function index(){

       if ($this->session->userdata('crypto_atlas_admin_logged_in') == TRUE){
			redirect(base_url('admin/dashboard'));
		  }

        $page_data['page_title']    = "Register New Account";
        $page_data['page_name']     = "Register";

        $this->load->view('Template/header', $page_data);
        $this->load->view('Pages/register');
        $this->load->view('Template/footer');
    }

    public function check_phone(){
		
      $phone=$this->input->post('phone');
      
        $phone_check 			=		$this->crud_model->phone_check($phone);		
        if($phone_check == 0){
          echo "Phone Number is Available";        
        }else{
          echo "Phone Number has been taken";
        }
    }

    

    public function confirm_registration(){
      $email                =   $this->input->post('email');
      $data['fullname']     =   $this->input->post('fullname');
      $data['email']        =   $this->input->post('email');
      $data['password']     =   md5($this->input->post('password'));
      $data['date_joined']  =   date('F jS Y h:i:A');

      //Check if Email Address Exits 
      $email_check 			=		$this->crud_model->email_check($email);		
      if($email_check == 0){
        $this->db->insert('members', $data); 
        $insert_id = $this->db->insert_id();
        $encrypted_id	=	random_string('alnum', 250);
        $this->db->where('id', $insert_id);
        $this->db->update('members', array('encrypted_id' => $encrypted_id));
  
        $this->session->set_flashdata('flash_message', 'Account Created Successfully, Please Check your Email');
        redirect(base_url('login'), 'refresh');
      } else{
        $this->session->set_flashdata('flash_error', 'User with Email Address Already Exists');
        redirect(base_url('register'), 'refresh');
      }

     
    }
  
}