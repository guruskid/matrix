<?php
class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {

    if ($this->session->userdata('matrix_admin_logged_in') == TRUE) {
      redirect(base_url('admin/dashboard'));
    }

    if ($this->session->userdata('matrix_user_logged_in') == TRUE) {
      redirect(base_url('user/dashboard'));
    }

    $page_data['page_title']    = "Sign In";
    $page_data['page_name']     = "Sign In";

    $this->load->view('Layouts/header', $page_data);
    $this->load->view('Pages/login');
    $this->load->view('Layouts/footer');
  }

  function auth()
  {
    $email    = $this->input->post('email', TRUE);
    $password = $this->input->post('password', TRUE);
    $user_status = $this->crud_model->validate($email, $password);

    if ($user_status == 'admin') {
      redirect(base_url('admin/dashboard'));
    } else if ($user_status == 'member') {
      redirect(base_url('user/dashboard'));
    } else {
      $this->session->set_flashdata('flash_error', 'Incorrect Email Address or Password');
      redirect(base_url('login'));
    }
  }
}
