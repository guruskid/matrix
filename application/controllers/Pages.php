<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/pages/index
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	public function index()
	{
		if ($this->session->userdata('matrix_admin_logged_in') == TRUE) {
			redirect(base_url('admin/dashboard'));
		  }
	  
		  if ($this->session->userdata('matrix_user_logged_in') == TRUE) {
			redirect(base_url('user/dashboard'));
		  }
		  
		$this->load->view('Layouts/header');
		$this->load->view('Pages/index');
		$this->load->view('Layouts/footer');
	}
	public function contact()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/contact');
		$this->load->view('Layouts/footer');
	}
	
	public function register()
	{
		$data['title'] = 'Crypto Matrix - Register an Account';
		$this->form_validation->set_rules('name','Fullname','required');
		$this->form_validation->set_rules('email','email','required|is_unique[users.email]|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		if ($this->form_validation->run()=== FALSE) {
			$this->load->view('Layouts/header');
		    $this->load->view('Pages/register');
		    $this->load->view('Layouts/footer');
		}else {
			$email = $this->input->post('email');
			$this->user->create();
			$this->load->view('Layouts/header');
			$this->load->view('Pages/register_success',$email);
			$this->load->view('Layouts/footer');
		}
		
	}
	public function faq()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/faq');
		$this->load->view('Layouts/footer');
	}
	public function terms()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/terms');
		$this->load->view('Layouts/footer');
	}
	public function plan()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/plan');
		$this->load->view('Layouts/footer');
	}
	public function recover()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/contact');
		$this->load->view('Layouts/footer');
	}
	public function forget()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/forget');
		$this->load->view('Layouts/footer');
	}
	public function about()
	{
		$this->load->view('Layouts/header');
		$this->load->view('Pages/about');
		$this->load->view('Layouts/footer');
	}
}
