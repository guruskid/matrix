<?php

class User extends CI_Model {
        
        public function __construct()
        {
                $this->load->database();
        }

        private $email_code;

        public function create()
        {
                $email = $this->input->post('email');
                $data = array(
                        'fullname'   => $this->input->post('name'),
                        'email'      => $email,
                        'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'email_code' =>rand(1111,9999),
                        'verified'   =>0
                );
                return $this->db->insert('users',$data);  /*for registering user without sending email to user's account */
                /*
                $result = $this->db->insert('users',$data);
                if($this->db->affected_rows() === 1){
                        $this->set_session($email);
                        $this->send_validation_email();
                        return $email;
                }else{
                        //Notify the admin by email the registration isn't working
                        //but this should never occur
                        $this->email->from('website@cryptomax.com','Error from user Registration');
                        $this->email->to('kofesto@gmail.com');
                        $this->email->subject('Problem creating user');
                        if(isset($email)){
                                $this->email->message('Unable to register user with the email of '.$email.' to the system');
                        }
                        $this->email->send();
                        return false;
                }*/
        }

        public function validate_email($email,$email_code)
        {
                $sql = "SELECT email, email_code FROM users WHERE email = '$email'";
                $result = $this->db->query($sql);
                $row = $result->row();
                if($result->num_rows() === 1 && $row->email){
                        if(md5((string)$row->date_created) == $email_code){
                                $result = $this->activate_account($email);
                                if($result){
                                        return true;
                                }
                        }
                }
        }

        private function set_session($email)
        {
                $sql = "SELECT user_id,date_created FROM users WHERE email = '$email'";
                $result = $this->db->query($sql);
                $row = $result->row();

                $sess_data = array(
                        'user_id'   => $row->user_id,
                        'fullname'  => $row->fullname,
                        'email'     => $row->email,
                        'logged_in' =>0
                );
                $this->email_code = md5((string)$row->date_created);
                $this->session->set_userdata($sess_data);
        }

        private function send_validation_email()
        {
                $email = $this->session->userdata('email');
                $email_code = $this->email_code;

                $this->email->set_mailtype('html');
                $this->email->from('no-reply@cryptomatrix.com','Crypto Matrix');
                $this->email->to('kofestotech@gmail.com');
                $this->email->subject('Email verification from cryptomatrix');

                $message = '<!DOCTYPE html><html><head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            </head><body>';
                $message .= '<p>Dear '.$this->session->userdata('fullname').'</p>';
                $message .= '<p>Thank you for signing up at Cryptomatrix! please <strong><a href="'.base_url().'register/validate_email/'.$email.'/'.$email_code.'">Click here</a></strong> to activate your account. After activation you can login';
                $message .= '<p>Thank you</p>';
                $message .= '<p>The Team at Cryptomatrix </p>';
                $message .= '</body></html>';

                $this->email->message($message);
                $this->email->send();
        }

        private function activate_account($email_address)
        {
                $sql = "UPDATE users SET verified = 1 WHERE email ='".$email_address."'";
                $this->db->query($sql);
                if ($this->db->affected_rows() ===1) {
                        return true;
                }
        }

        public function login($email,$password)
        {
                $this->db->where('email',$email);
                // $this->db->where('password',$password);
                $query  =   $this->db->get('users');

                $row = $query->row();
                return $row ? password_verify($password, $row->password) : false;
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}