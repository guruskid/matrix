<?php
class Email_model extends CI_Model
{

    function withdrawal_decline_mail($user_email){
        if ($this->config->item('protocol') == "smtp") {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            // $config['mailtype'] = $this->config->item('smtp_mailtype');
            // $config['charset'] = $this->config->item('utf-8');
            // $config['mailtype'] = $this->config->item('html');
            $config['starttls']  = $this->config->item('starttls');
            $config['newline']  = $this->config->item('newline');

            $this->email->initialize($config);
        }

        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

        $fromemail  = "noreply@cryptomatrix.co";
        $fromname   = "Crypto Matrix Team";
        $subject    = "Withdrawal Failure";

        $message = $this->load->view('Email/withdrawal_decline','',true);

        $this->email->to($user_email);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            return false;
            show_error($this->email->print_debugger());
        } else {
            return true;
        }
    }

    function withdrawal_success_mail($user_email){
        if ($this->config->item('protocol') == "smtp") {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            // $config['mailtype'] = $this->config->item('smtp_mailtype');
            // $config['charset'] = $this->config->item('utf-8');
            // $config['mailtype'] = $this->config->item('html');
            $config['starttls']  = $this->config->item('starttls');
            $config['newline']  = $this->config->item('newline');

            $this->email->initialize($config);
        }

        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

        $fromemail  = "noreply@cryptomatrix.co";
        $fromname   = "Crypto Matrix Team";
        $subject    = "Withdrawal Success";

        $message = $this->load->view('Email/withdrawal_success','',true);

        $this->email->to($user_email);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            return false;
            show_error($this->email->print_debugger());
        } else {
            return true;
        }
    }

    function deposit_success_mail($user_email){
        if ($this->config->item('protocol') == "smtp") {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            // $config['mailtype'] = $this->config->item('smtp_mailtype');
            // $config['charset'] = $this->config->item('utf-8');
            // $config['mailtype'] = $this->config->item('html');
            $config['starttls']  = $this->config->item('starttls');
            $config['newline']  = $this->config->item('newline');

            $this->email->initialize($config);
        }

        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

        $fromemail  = "noreply@cryptomatrix.co";
        $fromname   = "Crypto Matrix Team";
        $subject    = "Deposit Success";

        $message = $this->load->view('Email/deposit_success','',true);

        $this->email->to($user_email);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            return false;
            show_error($this->email->print_debugger());
        } else {
            return true;
        }
    }

    function deposit_decline_mail($user_email){
        if ($this->config->item('protocol') == "smtp") {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            // $config['mailtype'] = $this->config->item('smtp_mailtype');
            // $config['charset'] = $this->config->item('utf-8');
            // $config['mailtype'] = $this->config->item('html');
            $config['starttls']  = $this->config->item('starttls');
            $config['newline']  = $this->config->item('newline');

            $this->email->initialize($config);
        }

        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

        $fromemail  = "noreply@cryptomatrix.co";
        $fromname   = "Crypto Matrix Team";
        $subject    = "Deposit Declined";

        $message = $this->load->view('Email/deposit_decline','',true);

        $this->email->to($user_email);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            return false;
            show_error($this->email->print_debugger());
        } else {
            return true;
        }
    }

    function verification_code($user_email){
        if ($this->config->item('protocol') == "smtp") {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            // $config['mailtype'] = $this->config->item('smtp_mailtype');
            // $config['charset'] = $this->config->item('utf-8');
            // $config['mailtype'] = $this->config->item('html');
            $config['starttls']  = $this->config->item('starttls');
            $config['newline']  = $this->config->item('newline');

            $this->email->initialize($config);
        }

        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

        $fromemail  = "noreply@cryptomatrix.co";
        $fromname   = "Crypto Matrix Team";
        $subject    = "Verification Code";

        $message = $this->load->view('Email/verification_code','',true);

        $this->email->to($user_email);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            return false;
            show_error($this->email->print_debugger());
        } else {
            return true;
        }
    }

    function send_support_ticket(){
        if ($this->config->item('protocol') == "smtp") {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            // $config['mailtype'] = $this->config->item('smtp_mailtype');
            // $config['charset'] = $this->config->item('utf-8');
            // $config['mailtype'] = $this->config->item('html');
            $config['starttls']  = $this->config->item('starttls');
            $config['newline']  = $this->config->item('newline');

            $this->email->initialize($config);
        }

        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

        $fromemail  = $this->session->userdata('matrix_user_email');
        $fromname   = $this->session->userdata('matrix_user_username');
        $subject    = $this->session->userdata('subject');

        $message    = $this->session->userdata('message');

        $this->email->to('support@cryptomatrix.co');
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            return false;
            show_error($this->email->print_debugger());
        } else {
            return true;
        }
    }
   
}
