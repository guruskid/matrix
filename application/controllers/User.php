<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


	function __construct(){
		parent::__construct();

		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

		$this->load->driver('cache');
	  }

	public function check_pending_deposit(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
		redirect(base_url(), 'refresh');

		$check = $this->db->get_where('activated_plans', array('user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'), 
		'deposit_status' => 0)); 
		if($check->num_rows() > 0){
			redirect(base_url('user/pending_deposit'), 'refresh');
		}
	}
	public function check_account_verification(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
		redirect(base_url(), 'refresh');
		$email_verification = $this->db->get_where('members', array('encrypted_id' => 
		$this->session->userdata('matrix_user_encrypted_id')))->row()->email_verification; 
		$photo_upload = $this->db->get_where('members', array('encrypted_id' => 
		$this->session->userdata('matrix_user_encrypted_id')))->row()->photo_upload; 
		$payment_settings = $this->db->get_where('members', array('encrypted_id' => 
		$this->session->userdata('matrix_user_encrypted_id')))->row()->payment_settings; 

		if($email_verification == 0 || $photo_upload == 0 || $payment_settings == 0){
			redirect(base_url('user/profile'), 'refresh');
		}

	}

	public function check_account_status(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
		redirect(base_url(), 'refresh');

		$check = $this->db->get_where('members', array('encrypted_id' => 
		$this->session->userdata('matrix_user_encrypted_id')))->row()->account_status;
		if($check == 0){
			redirect(base_url('user/account_status'), 'refresh');
		}
	}

	public function check_deposit_date_expiration(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
		redirect(base_url(), 'refresh');

		$check = $this->db->get_where('activated_plans', array('user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'), 
		'deposit_status' => 0)); 
		if($check->num_rows() > 0){
			if(date('Y-m-d H:i:s') > $check->row()->deposit_date){
				$this->db->where('encrypted_id', $this->session->userdata('matrix_user_encrypted_id')); 
				$this->db->update('members', array('account_status' => 0)); 
				redirect(base_url('user/account_status'), 'refresh');
			}
		}
	}

	

	public function dashboard()	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
		$this->check_pending_deposit();
		$this->check_account_status();
		$this->check_account_verification();
		$page_data['page_title']    = "User Dashboard";
		$page_data['page_name']    	= "Dashboard";

		$this->load->view('Layouts/user_dashboard_header', $page_data);
		$this->load->view('User/navigation', $page_data);
		$this->load->view('User/dashboard');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function support()	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
		$this->check_pending_deposit();
		$this->check_account_status();
		$this->check_account_verification();
		$page_data['page_title']    = "User Support System";
		$page_data['page_name']    	= "Support";

		$this->load->view('Layouts/user_dashboard_header', $page_data);
		$this->load->view('User/navigation', $page_data);
		$this->load->view('User/support');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function profile()	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
		$this->check_account_status();
		$this->check_pending_deposit();
		$page_data['page_title']    = "User Profile";
		$page_data['page_name']    	= "Profile";

		$this->load->view('Layouts/user_dashboard_header', $page_data);
		$this->load->view('User/navigation', $page_data);
		$this->load->view('User/profile');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function pending_deposit()	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			$this->check_account_status();
			$check = $this->db->get_where('activated_plans', array('user_encrypted_id' => $this->session->userdata('matrix_user_encrypted_id'), 
			'deposit_status' => 0)); 
			if($check->num_rows() > 0){
				$page_data['page_title']    = "Pending Deposit";
				$page_data['page_name']    	= "Pending Deposit";
		
				$this->load->view('User/pending_deposit', $page_data);
			}else{
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('user/dashboard'), 'refresh');
			}

	}

	public function account_status(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			$check = $this->db->get_where('members', array('encrypted_id' => 
		$this->session->userdata('matrix_user_encrypted_id')))->row()->account_status;
		if($check == 0){
				$page_data['page_title']    = "Account Blocked";
				$page_data['page_name']    	= "Account Status";
		
				$this->load->view('User/account_status', $page_data);
			}else{
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('user/dashboard'), 'refresh');
			}
		
	}



	public function returns()	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			$this->check_pending_deposit();
			$this->check_account_status();
			$this->check_account_verification();
		$page_data['page_title']    = "User Daily Earnings and Returns";
		$page_data['page_name']    	= "Returns";

		$this->load->view('Layouts/user_dashboard_header', $page_data);
		$this->load->view('User/navigation', $page_data);
		$this->load->view('User/returns');
	}
	
	public function deposits()	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			$this->check_pending_deposit();
			$this->check_account_status();
			$this->check_account_verification();
		$page_data['page_title']    = "User Deposits";
		$page_data['page_name']    	= "Deposits";

		$this->load->view('Layouts/user_dashboard_header', $page_data);
		$this->load->view('User/navigation', $page_data);
		$this->load->view('User/deposits');
		$this->load->view('Layouts/dashboard_footer');
	}
	
	public function withdrawals()	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			$this->check_pending_deposit();
			$this->check_account_status();
			$this->check_account_verification();
		$page_data['page_title']    = "Withdrawals";
		$page_data['page_name']    	= "Withdrawals";

		$this->load->view('Layouts/user_dashboard_header', $page_data);
		$this->load->view('User/navigation', $page_data);
		$this->load->view('User/withdrawals');
		$this->load->view('Layouts/dashboard_footer');
    }


    public function activate_plan($encrypted_id = "")	{
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
            redirect(base_url(), 'refresh');
        if ($encrypted_id == "") {
			$this->session->set_flashdata('flash_error', 'An Error has Occured');
			redirect(base_url('user/plans'), 'refresh');
		} else {
                $data['user_encrypted_id']      =   $this->session->userdata('matrix_user_encrypted_id');
                $data['plan_encrypted_id']      =   $encrypted_id; 
                $data['deposit_date']       	=   date('Y-m-d H:i:s', strtotime('+ 48 hours'));

                $this->db->insert('activated_plans', $data); 
                $insert_id = $this->db->insert_id();

                $encrypted_id	=	random_string('alnum', 250);
                $this->db->where('id', $insert_id);
                $this->db->update('activated_plans', array('encrypted_id' => $encrypted_id));
        
                $this->session->set_flashdata('flash_message', 'Plan Activated Successfully');
                redirect(base_url('user/pending_deposit'), 'refresh');

        }
	}
	
	public function upload_payment_proof(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			
			$data['user_encrypted_id']					=	$this->session->userdata('matrix_user_encrypted_id');
			$data['plan_activation_encrypted_id']		=	$this->input->post('plan_activation_encrypted_id');
			$data['amount']								=	$this->input->post('amount');
			$data['date_of_payment']					=	date('F jS, Y', strtotime($this->input->post('date_of_payment')));
			$data['status']								=	'Pending';
			$data['proof_upload_date']					=	date('F jS, Y h:i:A');

			$this->db->insert('deposit', $data); 
			$insert_id = $this->db->insert_id();

			$encrypted_id	=	random_string('alnum', 250);
			$this->db->where('id', $insert_id);
			$this->db->update('deposit', array('encrypted_id' => $encrypted_id));
	
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/payment_image/' . $insert_id . '.jpg');

			$this->session->set_flashdata('flash_message', 'Payment Proof Submitted Successfully');
			redirect(base_url('user/pending_deposit'), 'refresh');
	}

	public function request_earning_withdrawal($withdrawal_id = ""){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			
        if ($withdrawal_id == "") {
			$this->session->set_flashdata('flash_error', 'An Error has Occured');
			redirect(base_url('user/dashboard'), 'refresh');
		} else {
				$this->db->where('encrypted_id', $withdrawal_id); 
				$this->db->update('earnings_withdrawals', array('status' => "Processing", 'user_request_date' => date('F jS, Y')));
				
				$this->session->set_flashdata('flash_message', 'Withdrawal Request Sent Successfully');
				redirect(base_url('user/withdrawals'), 'refresh');

		}
	}

	public function resend_verification_code(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			$email = $this->session->userdata('matrix_user_email');
		if ($email == "") {
			$this->session->set_flashdata('flash_error', 'An Error has Occured');
			redirect(base_url('user/dashboard'), 'refresh');
		} else {	
			$code				=	'CRYTO-MATRIX-'.strtoupper(random_string('alnum', 5));
			$data['email']		=	$email; 
			$data['time']		=	date('Y-m-d h:i:s');
			$data['code']		=	$code;
			$this->db->insert('email_verification', $data); 

			$fullname = $this->db->get_where('members', array('email' => $email))->row()->fullname; 

			//Sending Email 
			$this->session->set_userdata('code', $code); 
			$this->session->set_userdata('fullname', $fullname); 
			$this->email_model->verification_code($email);

			$array = array('code' => '', 'fullname' => ''); 
			$this->session->unset_userdata($array); 

			$this->session->set_flashdata('flash_message', 'Verification Code Sent Successfully');
			redirect(base_url('user/profile'), 'refresh');
		}
	}

	public function email_verification(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			$code = $this->input->post('code');
		if ($code == "") {
			$this->session->set_flashdata('flash_error', 'An Error has Occured');
			redirect(base_url('user/dashboard'), 'refresh');
		} else {	
			//Check if Code Exists 
			$this->db->where('code', $code); 
			$this->db->where('email', $this->session->userdata('matrix_user_email')); 
			$check = $this->db->get('email_verification'); 

			if($check->num_rows() > 0){ 
				//Check TIme
				$time = $check->row()->time;
				$current_time = date('Y-m-d h:i:s'); 
				$difference = (strtotime($current_time) - strtotime($time))/60; 
				if($difference > 5){
					$this->db->where('code', $code); 
					$this->db->where('email', $this->session->userdata('matrix_user_email')); 
					$this->db->delete('email_verification'); 

					$this->session->set_flashdata('flash_error', 'Email Verification Code has Expired');
					redirect(base_url('user/profile'), 'refresh');
				} else{
					$this->db->where('email', $this->session->userdata('matrix_user_email')); 
					$this->db->update('members', array('email_verification' => 1)); 

					$this->db->where('code', $code); 
					$this->db->where('email', $this->session->userdata('matrix_user_email')); 
					$this->db->delete('email_verification'); 

					$this->session->set_flashdata('flash_message', 'Email Verification Successfully');
					redirect(base_url('user/profile'), 'refresh');
				}
			} else{
				$this->session->set_flashdata('flash_error', 'Invalid Email Verification Code');
				redirect(base_url('user/profile'), 'refresh');
			}

			
		}
	}

	public function upload_payment_details(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
		$address = $this->input->post('address');
		if ($address == "") {
			$this->session->set_flashdata('flash_error', 'An Error has Occured');
			redirect(base_url('user/dashboard'), 'refresh');
		} else {

			$this->db->where('email', $this->session->userdata('matrix_user_email'));
			$this->db->update('members', array('payment_settings' => 1, 'wallet_address' => $address));
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_payment_image/' . $this->session->userdata('matrix_user_id') . '.jpg');
			
			$this->session->set_flashdata('flash_message', 'Payment Setting Updated Successfully');
			redirect(base_url('user/profile'), 'refresh');
		}
	}

	public function upload_profile_photo(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			$this->db->where('email', $this->session->userdata('matrix_user_email'));
			$this->db->update('members', array('photo_upload' => 1));
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $this->session->userdata('matrix_user_id') . '.jpg');

			$this->session->set_flashdata('flash_message', 'Profile Photo Uploaded Successfully');
			redirect(base_url('user/profile'), 'refresh');
		
	}

	public function create_ticket(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$this->session->set_userdata('subject', $subject);
			$this->session->set_userdata('message', $message);
			$array = array('subject' => '', 'message' => '');
			$this->email_model->send_support_ticket(); 
			$this->session->unset_userdata($array); 

			$this->session->set_flashdata('flash_message', 'Ticket Message Sent Successfully');
			redirect(base_url('user/support'), 'refresh');

	}

	public function account_block_message(){
		if ($this->session->userdata('matrix_user_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$this->session->set_userdata('subject', $subject);
			$this->session->set_userdata('message', $message);
			$array = array('subject' => '', 'message' => '');
			$this->email_model->send_support_ticket(); 
			$this->session->unset_userdata($array); 

			$this->session->set_flashdata('flash_message', 'Ticket Message Sent Successfully');
			redirect(base_url('user/account_status'), 'refresh');

	}
}