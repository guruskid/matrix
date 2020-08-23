<?php
class Crud_model extends CI_Model{

    ////////LOGIN VALIDATION//////////
    function validate($email='',$password=''){
        $admin_credential   = array('admin_email' => $email, 'admin_password' => MD5($password));
        $user_credential    = array('email' => $email, 'password' => MD5($password));
        
        // Checking login credential for Admin
        $query = $this->db->get_where('admin', $admin_credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('matrix_admin_id', $row->admin_id);
            $this->session->set_userdata('matrix_admin_username', $row->admin_name);
            $this->session->set_userdata('matrix_admin_email', $row->admin_email);
            $this->session->set_userdata('matrix_admin_logged_in', TRUE);
            return 'admin';
        }

        // Checking login credential for User
        $query = $this->db->get_where('members', $user_credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('matrix_user_id', $row->id);
            $this->session->set_userdata('matrix_user_encrypted_id', $row->encrypted_id);
            $this->session->set_userdata('matrix_user_username', $row->fullname);
            $this->session->set_userdata('matrix_user_email', $row->email);
            $this->session->set_userdata('matrix_user_phone', $row->phone);
            $this->session->set_userdata('matrix_user_membership_level', $row->membership_level);
            $this->session->set_userdata('matrix_user_logged_in', TRUE);
            return 'member';
        }

        
    }

    ////////CACHE CONTROL//////////
    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

      ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    //Check if a Phone Number Exisits 
    public function phone_check($phone)
    {
        $this->db->where('phone',
            $phone
        );
        $query = $this->db->get('members');
        return $query->num_rows();
    }

    //Check if a Email Address Exisits 
    public function email_check($email)
    {
        $this->db->where('email',
            $email
        );
        $query = $this->db->get('members');
        return $query->num_rows();
    }

    //Check Email Verification Code 
    public function check_email_verification_code($code){
        $this->db->where('verification_code', $code); 
        $this->db->where('user_email', $this->session->userdata('matrix_user_email')); 
        $query = $this->db->get('email_verification'); 
        return $query->num_rows();
    }

    public function get_user_by_plan($encrypted_id){
        $this->db->where('encrypted_id', $encrypted_id); 
        $query = $this->db->get('plans'); 
        return $query->row_array();
    }

    public function get_plan($encrypted_id){
        $this->db->where('encrypted_id', $encrypted_id); 
        $query = $this->db->get('plans'); 
        return $query->row_array();
    }

    public function check_user_plan($encrypted_id){
        $this->db->where('plan_encrypted_id', $encrypted_id); 
        $query = $this->db->get('activated_plans'); 
        return $query->num_rows();
    }

    public function get_user($id){
        $this->db->where('encrypted_id', $id); 
        $query = $this->db->get('members'); 
        return $query->row_array();
    }



}
