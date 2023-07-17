<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
            $this->load->helper('url');
        }

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('M_login');
        $this->M_login->ambil_login($username,$password);
    }

    public function logout()
    {
        $this->session->set_userdata('username', FALSE);
        $this->session->sess_destroy();
        redirect('presensi');
    }

}