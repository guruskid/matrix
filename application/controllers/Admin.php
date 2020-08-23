<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	function __construct(){
		parent::__construct();

		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

		$this->load->driver('cache');
	  }

	public function dashboard()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$page_data['page_title']    = "Admin Dashboard";
		$page_data['page_name']    	= "Dashboard";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/dashboard');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function user_profile($encrypted_id="")	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/plans'), 'refresh');
		} else {
		$page_data['page_title']    = "Admin Dashboard";
		$page_data['page_name']    	= "View User";
		$data['user']		=	$this->crud_model->get_user($encrypted_id);
		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/user_profile', $data);
		$this->load->view('Layouts/dashboard_footer');
		}
	}

	public function topup($encrypted_id="", $user_id="")	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "" || $user_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/plans'), 'refresh');
		} else {
			$data['plan_activation_encrypted_id']	=	$encrypted_id; 
			$data['amount']							=	$this->input->post('amount'); 
			$data['date']							=	date('F jS, Y h:i:A'); 

			$this->db->insert('topup', $data);

			//Insert Notice 
			$data1['user_encrypted_id']		=	$user_id;
			$data1['description']			=	"Top Up of $" . $data['amount'] . "  has been added to your account by Admin.";
			$data1['date']					=	date('F jS, Y h:i:A');
			$this->db->insert('notices', $data1);

			$this->session->set_flashdata('flash_message', 'Topup Was Successfull');
			redirect(base_url('admin/user_profile/'.$user_id), 'refresh');
		}
	}

	public function withdrawal_requests()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$page_data['page_title']    = "Withdrawal Requests";
		$page_data['page_name']    	= "Withdrawals";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/withdrawal_requests');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function users()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$page_data['page_title']    = "Registered Users";
		$page_data['page_name']    	= "Users";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/users');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function deposits()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$page_data['page_title']    = "Deposits";
		$page_data['page_name']    	= "Deposits";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/deposits');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function payment()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$page_data['page_title']    = "Payment";
		$page_data['page_name']    	= "Payment";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/payment');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function returns()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$page_data['page_title']    = "Returns";
		$page_data['page_name']    	= "Returns";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/returns');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function daily_earnings_selector()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			$plan_id	=	$this->input->post('plan_id');
			$date		=	$this->input->post('date');
			$month		=	$this->input->post('month');
			$year		=	$this->input->post('year');
	
			redirect(base_url('admin/manage_daily_earnings/'.$plan_id.'/'.$date.'/'.$month.'/'.$year), 'refresh');
	}

	public function plans()	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$page_data['page_title']    = "Investment Plans";
		$page_data['page_name']    	= "Plans";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/plans');
		$this->load->view('Layouts/dashboard_footer');
	}

	public function view_users($encrypted_id="")	{
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
		if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/plans'), 'refresh');
		} else {
			
			$plan_name = $this->db->get_where('plans', array('encrypted_id' => $encrypted_id))->row()->name;
			$page_data['page_title']    = " View Users for ".$plan_name." Plan";
			$page_data['page_name']    	= "Plans";

			$data['plan_user']			=	$this->crud_model->get_user_by_plan($encrypted_id);

			$this->load->view('Layouts/admin_dashboard_header', $page_data);
			$this->load->view('Admin/navigation', $page_data);
			$this->load->view('Admin/view_users', $data);
		}
	}

	

	public function add_plan(){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$data['name']				=	$this->input->post('name');
		$data['daily_earning']		=	$this->input->post('daily_earning');
		$data['amount']				=	$this->input->post('investment_amount');
		$data['days']				=	$this->input->post('maturity');

		$this->db->insert('plans', $data);
		$insert_id = $this->db->insert_id();

		$encrypted_id	=	random_string('alnum', 250);
		$this->db->where('id', $insert_id);
		$this->db->update('plans', array('encrypted_id' => $encrypted_id));

		$this->session->set_flashdata('flash_message', 'Membership Plan Created Successfully');
		redirect(base_url('admin/plans'), 'refresh');
	}

	public function restart_payment_counter($encrypted_id="", $user=""){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
		if($encrypted_id == "" || $user == ""){
			$this->session->set_flashdata('flash_error', 'An Error has Occured');
			redirect(base_url('admin/dashboard'), 'refresh');
		} else{
			$this->db->where('encrypted_id', $encrypted_id); 
			$this->db->update('activated_plans', array('deposit_date' => date('Y-m-d H:i:s', strtotime('+ 48 hours')))); 
			
			$this->session->set_flashdata('flash_message', 'Payment Counter Restarted Successfully');
			redirect(base_url('admin/user_profile/'.$user), 'refresh');
		}
	}

	public function update_plan($encrypted_id =""){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/plans'), 'refresh');
			} else {
				$data['name']				=	$this->input->post('name');
				$data['daily_earning']		=	$this->input->post('daily_earning');
				$data['amount']				=	$this->input->post('investment_amount');
				$data['days']				=	$this->input->post('maturity');

				$this->db->where('encrypted_id', $encrypted_id);
				$this->db->update('plans', $data);

				$this->session->set_flashdata('flash_message', 'Membership Plan Updated Successfully');
				redirect(base_url('admin/plans'), 'refresh');
			}
	}

	public function deactivate_user_plan($plan_id=""){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($plan_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/plans'), 'refresh');
			} else {

				//Calculate User Daily Earnings
				$total = 0; 
				$topup_total = 0; 

				$earnings = $this->db->get_where('returns', array('plan_activation_encrypted_id' => $plan_id))->result_array(); 
				foreach($earnings as $earnings){
					$total = $total + $earnings['daily_earning'];
				}
				$topup = $this->db->get_where('topup', array('plan_activation_encrypted_id' => $plan_id))->result_array(); 
				foreach($topup as $topup){
					$topup_total = $topup_total + $topup['amount'];
				}

				//Insert Total earnigns into withdrawal table 
				$user_plan_id 		=		$this->db->get_where('activated_plans', array('encrypted_id' => $plan_id))->row()->plan_encrypted_id;
				$user_encrypted_id 		=		$this->db->get_where('activated_plans', array('encrypted_id' => $plan_id))->row()->user_encrypted_id;
				$user_capital 		=		$this->db->get_where('plans', array('encrypted_id' => $user_plan_id))->row()->amount;

				$data['plan_activation_encrypted_id']		=	$plan_id; 
				$data['amount']								=	$total + $user_capital+$topup_total; 
				$data['date_initiated']						=	date('F jS Y h:i:A'); 
				$data['type']								=	'Returns'; 
				$data['user_encrypted_id']					=	$user_encrypted_id;
				$data['status']								=	'Pending';

				$this->db->insert('earnings_withdrawals', $data); 
				$insert_id = $this->db->insert_id();

				$encrypted_id	=	random_string('alnum', 250);
				$this->db->where('id', $insert_id);
				$this->db->update('earnings_withdrawals', array('encrypted_id' => $encrypted_id));

				$this->db->where('encrypted_id', $plan_id); 
				$this->db->update('activated_plans', array('status' => 0)); 

				$this->session->set_flashdata('flash_message', 'Membership Plan Deactivated Successfully');
				redirect(base_url('admin/view_users/'.$user_plan_id), 'refresh');
			}
	}

	public function daily_earnings($plan_id, $d, $m, $y){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

		$data['plan']             =   $this->crud_model->get_plan($plan_id);
		$data['date']             	=   $d;
		$data['month']             	=   $m;
		$data['year']             	=   $y;

		$plan_name = $this->db->get_where('plans', array('encrypted_id' => $plan_id))->row()->name;

		$page_data['page_title']    = "Daily Earnings and Returns for ". $plan_name." Plan";
		$page_data['page_name']    	= "Returns";

		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/daily_earnings', $data);
	}
	
	public function manage_daily_earnings($plan_id, $d, $m, $y){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			if($_POST)
			{	
				$members   =   $this->db->get_where('activated_plans', array('plan_encrypted_id' => $plan_id, 'status'=>1))->result_array();
				foreach ($members as $row)
				{
					$earning_status  =   'Processed';

					$user_capital = $this->db->get_where('plans', array('encrypted_id' => $plan_id))->row()->amount;
					$plan_return = 	$this->db->get_where('plans', array('encrypted_id' => $plan_id))->row()->daily_earning;

					$user_daily_return = $user_capital * ($plan_return/100);
	
					$this->db->where('plan_activation_encrypted_id' , $row['encrypted_id']);
					$this->db->where('date' , $this->input->post('date'));
					$this->db->update('returns' , array('status' => $earning_status, 'daily_earning' => $user_daily_return));
				}
			
				$this->session->set_flashdata('flash_message' , 'Daily Plan Activated Successfully');
				redirect(base_url('admin/manage_daily_earnings/'.$plan_id.'/'.$d.'/'.$m.'/'.$y), 'refresh');
			}
	

		$data['plan']            	=   $this->crud_model->get_plan($plan_id);
		$data['date']             	=   $d;
		$data['month']             	=   $m;
		$data['year']             	=   $y;

		$plan_name = $this->db->get_where('plans', array('encrypted_id' => $plan_id))->row()->name;

		$page_data['page_title']    = "Daily Earnings and Returns for ". $plan_name." Plan";
		$page_data['page_name']    	= "Returns";
		
		$this->load->view('Layouts/admin_dashboard_header', $page_data);
		$this->load->view('Admin/navigation', $page_data);
		$this->load->view('Admin/manage_daily_earnings', $data);
		
	}
	

	public function create_btc_payment(){ 
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			$data['wallet_address']		=	$this->input->post('wallet_address'); 
			
			$this->db->insert('btc_payment', $data); 
			$insert_id = $this->db->insert_id();

			$encrypted_id	=	random_string('alnum', 250);
			$this->db->where('id', $insert_id);
			$this->db->update('btc_payment', array('encrypted_id' => $encrypted_id));
			
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/btc_image/' . $insert_id . '.jpg');
			$this->session->set_flashdata('flash_message', 'Bitcoin Payment Details Created Successfully');
			redirect(base_url('admin/payment'), 'refresh');
	}

	public function create_bank_payment(){ 
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');

			$data['account_name']		=	$this->input->post('account_name'); 
			$data['account_number']		=	$this->input->post('account_number'); 
			$data['bank_name']			=	$this->input->post('bank_name'); 
			$data['account_type']		=	$this->input->post('account_type'); 

			$this->db->insert('bank_payment', $data); 
			$insert_id = $this->db->insert_id();

			$encrypted_id	=	random_string('alnum', 250);
			$this->db->where('id', $insert_id);
			$this->db->update('bank_payment', array('encrypted_id' => $encrypted_id));

			$this->session->set_flashdata('flash_message', 'Bank Payment Details Created Successfully');
			redirect(base_url('admin/payment'), 'refresh');
	}

	public function block_user($encrypted_id=""){ 
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/dashboard'), 'refresh');
			} else {
				$this->db->where('encrypted_id', $encrypted_id); 
				$this->db->update('members', array('account_status' => 0));
					
				//Insert Notice 
					$data['user_encrypted_id']		=	$encrypted_id;
					$data['description']			=	"User Account has Been Blocked by Admin";
					$data['date']					=	date('F jS, Y h:i:A');
					$this->db->insert('notices', $data);

				$this->session->set_flashdata('flash_message', 'User Account Blocked Successfully');
				redirect(base_url('admin/user_profile/'.$encrypted_id), 'refresh');
			}
	}
	public function unblock_user($encrypted_id=""){ 
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/dashboard'), 'refresh');
			} else {
				$this->db->where('encrypted_id', $encrypted_id); 
				$this->db->update('members', array('account_status' => 1));
					
				//Insert Notice 
					$data['user_encrypted_id']		=	$encrypted_id;
					$data['description']			=	"User Account has Been Unblocked by Admin";
					$data['date']					=	date('F jS, Y h:i:A');
					$this->db->insert('notices', $data);

				$this->session->set_flashdata('flash_message', 'User Account Unblocked Successfully');
				redirect(base_url('admin/user_profile/'.$encrypted_id), 'refresh');
			}
	}
	

	public function remove_bank_details($encrypted_id=""){ 
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/payment'), 'refresh');
			} else {
				$this->db->where('encrypted_id', $encrypted_id); 
				$this->db->delete('bank_payment');
				
				$this->session->set_flashdata('flash_message', 'Bank Payment Details Deleted Successfully');
				redirect(base_url('admin/payment'), 'refresh');
			}
	}
	
	public function remove_btc_details($encrypted_id=""){ 
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/payment'), 'refresh');
			} else {
				$this->db->where('encrypted_id', $encrypted_id); 
				$this->db->delete('btc_payment');
				
				$this->session->set_flashdata('flash_message', 'Bitcoint Payment Details Deleted Successfully');
				redirect(base_url('admin/payment'), 'refresh');
			}
	}

	public function approve_deposit($encrypted_id=""){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/deposits'), 'refresh');
			} else {
				
				//Get Details 
				$user_encrypted_id = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->user_encrypted_id;
				$plan_activation_encrypted_id = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->plan_activation_encrypted_id;
				$plan_encrypted_id = $this->db->get_where('activated_plans', array('encrypted_id' => $plan_activation_encrypted_id))->row()->plan_encrypted_id;
				$plan_name = $this->db->get_where('plans', array('encrypted_id' => $plan_encrypted_id))->row()->name;
				$amount = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->amount;
				$date_of_payment = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->date_of_payment;
				$user_capital = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->capital;
				$user_email = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->email;
				$user_fullname = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->fullname;
				$plan_maturity_days = $this->db->get_where('plans', array('encrypted_id' => $plan_encrypted_id))->row()->days;
				//Increase Capital 
				$new_capital = $user_capital + $amount;
				$this->db->where('encrypted_id', $user_encrypted_id);
				$this->db->update('members', array('capital' => $new_capital));

				//Update Deposit 
				$this->db->where('encrypted_id', $encrypted_id);
				$this->db->update('deposit', array('status' => "Approved"));

				//Update User Deposit Status 
				$this->db->where('encrypted_id', $plan_activation_encrypted_id);
				$this->db->update('activated_plans', array('deposit_status' => 1, 'date_deactivated' =>date('Y-m-d', strtotime('+ '.$plan_maturity_days.''.' days')), 'date_activated' => date('Y-m-d')));

				//Send Mail 
				$this->session->set_userdata('plan_name', $plan_name);
				$this->session->set_userdata('amount', $amount);
				$this->session->set_userdata('user_fullname', $user_fullname);

				$this->email_model->deposit_success_mail($user_email);

				$array = array('plan_name' => '', 'amount' => '', 'user_fullname' => '');
				$this->session->unset_userdata($array);

				//Insert Notice 
				$data['user_encrypted_id']		=	$user_encrypted_id;
				$data['description']			=	"Direct Deposit of $" . $amount . " paid on " . $date_of_payment . " has been Approved";
				$data['date']					=	date('F jS, Y h:i:A');
				$this->db->insert('notices', $data);

				$this->session->set_flashdata('flash_message', 'Deposit Approved Successfully');
				redirect(base_url('admin/deposits'), 'refresh');
					
			}
	}
	
	public function decline_deposit($encrypted_id=""){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/deposits'), 'refresh');
			} else {
				//Get Details 
				$user_encrypted_id = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->user_encrypted_id;
				$plan_activation_encrypted_id = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->plan_activation_encrypted_id;
				$plan_encrypted_id = $this->db->get_where('activated_plans', array('encrypted_id' => $plan_activation_encrypted_id))->row()->plan_encrypted_id;
				$plan_name = $this->db->get_where('plans', array('encrypted_id' => $plan_encrypted_id))->row()->name;
				$amount = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->amount;
				$date_of_payment = $this->db->get_where('deposit', array('encrypted_id' => $encrypted_id))->row()->date_of_payment;
				$user_capital = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->capital;
				$user_email = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->email;
				$user_fullname = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->fullname;


				//Update Deposit 
				$this->db->where('encrypted_id', $encrypted_id);
				$this->db->update('deposit', array('status' => "Declined"));

				//Update User Deposit Status 
				$this->db->where('encrypted_id', $plan_activation_encrypted_id);
				$this->db->update('activated_plans', array('deposit_status' => 1));

				//Send Mail 
				$this->session->set_userdata('plan_name', $plan_name);
				$this->session->set_userdata('amount', $amount);
				$this->session->set_userdata('user_fullname', $user_fullname);

				$this->email_model->deposit_decline_mail($user_email);

				$array = array('plan_name' => '', 'amount' => '', 'user_fullname' => '');
				$this->session->unset_userdata($array);

				//Insert Notice 
				$data['user_encrypted_id']		=	$user_encrypted_id;
				$data['description']			=	"Direct Deposit of $" . $amount . " paid on " . $date_of_payment . " has been Declined";
				$data['date']					=	date('F jS, Y h:i:A');
				$this->db->insert('notices', $data);

				$this->session->set_flashdata('flash_message', 'Deposit Delined Successfully');
				redirect(base_url('admin/deposits'), 'refresh');

				
			}
	}
	
	public function approve_withdrawal($encrypted_id=""){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/dashboard'), 'refresh');
			} else {
				//Get Details 
				$user_encrypted_id = $this->db->get_where('earnings_withdrawals', array('encrypted_id' => $encrypted_id))->row()->user_encrypted_id;
				$plan_activation_encrypted_id = $this->db->get_where('earnings_withdrawals', array('encrypted_id' => $encrypted_id))->row()->plan_activation_encrypted_id;
				$plan_encrypted_id = $this->db->get_where('activated_plans', array('encrypted_id' => $plan_activation_encrypted_id))->row()->plan_encrypted_id; 
				$plan_name = $this->db->get_where('plans', array('encrypted_id' => $plan_encrypted_id))->row()->name;
				$amount = $this->db->get_where('earnings_withdrawals', array('encrypted_id' => $encrypted_id))->row()->amount;
				$user_fullname = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->fullname;
				$user_email = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->email;

				//Update Deposit 
				$this->db->where('encrypted_id', $encrypted_id);
				$this->db->update('earnings_withdrawals', array('status' => "Approved", 'processed_date' => date('F jS, Y h:i:A')));


				//Send Mail 
				$this->session->set_userdata('plan_name', $plan_name);
				$this->session->set_userdata('amount', $amount);
				$this->session->set_userdata('user_fullname', $user_fullname);

				$this->email_model->withdrawal_success_mail($user_email);

				$array = array('plan_name' => '', 'amount' => '', 'user_fullname' => '');
				$this->session->unset_userdata($array);

				//Insert Notice 
				$data['user_encrypted_id']		=	$user_encrypted_id;
				$data['description']			=	"Withdrawal of  $" . $amount . " was Successfully";
				$data['date']					=	date('F jS, Y h:i:A');
				$this->db->insert('notices', $data);

				$this->session->set_flashdata('flash_message', 'Withdrawal Request Approved Successfully');
				redirect(base_url('admin/withdrawal_requests'), 'refresh');
				
			}
	}
	
	public function decline_withdrawal($encrypted_id=""){
		if ($this->session->userdata('matrix_admin_logged_in') != TRUE)
			redirect(base_url(), 'refresh');
			if ($encrypted_id == "") {
				$this->session->set_flashdata('flash_error', 'An Error has Occured');
				redirect(base_url('admin/dashboard'), 'refresh');
			} else {
				//Get Details 
				$user_encrypted_id = $this->db->get_where('earnings_withdrawals', array('encrypted_id' => $encrypted_id))->row()->user_encrypted_id;
				$plan_activation_encrypted_id = $this->db->get_where('earnings_withdrawals', array('encrypted_id' => $encrypted_id))->row()->plan_activation_encrypted_id;
				$plan_encrypted_id = $this->db->get_where('activated_plans', array('encrypted_id' => $plan_activation_encrypted_id))->row()->plan_encrypted_id; 
				$plan_name = $this->db->get_where('plans', array('encrypted_id' => $plan_encrypted_id))->row()->name;
				$amount = $this->db->get_where('earnings_withdrawals', array('encrypted_id' => $encrypted_id))->row()->amount;
				$user_fullname = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->fullname;
				$user_email = $this->db->get_where('members', array('encrypted_id' => $user_encrypted_id))->row()->email;

				//Update Deposit 
				$this->db->where('encrypted_id', $encrypted_id);
				$this->db->update('earnings_withdrawals', array('status' => "Pending", 'user_request_date' => ""));


				//Send Mail 
				$this->session->set_userdata('plan_name', $plan_name);
				$this->session->set_userdata('amount', $amount);
				$this->session->set_userdata('user_fullname', $user_fullname);

				$this->email_model->withdrawal_decline_mail($user_email);

				$array = array('plan_name' => '', 'amount' => '', 'user_fullname' => '');
				$this->session->unset_userdata($array);

				//Insert Notice 
				$data['user_encrypted_id']		=	$user_encrypted_id;
				$data['description']			=	"Withdrawal of  $" . $amount . " was Declined";
				$data['date']					=	date('F jS, Y h:i:A');
				$this->db->insert('notices', $data);

				$this->session->set_flashdata('flash_message', 'Withdrawal Request Delined Successfully');
				redirect(base_url('admin/withdrawal_requests'), 'refresh');
				
			}
	}
	

}
