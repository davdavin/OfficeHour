<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_perusahaan') != "login") {
            redirect('Login/login_perusahaan');
        }

        $this->load->model(array('M_Perusahaan'));
    }

    function profile($id_perusahaan)
    {
        $data['profile_perusahaan'] = $this->M_Perusahaan->pilih_perusahaan($id_perusahaan)->result();
        $this->load->view('v_account_perusahaan.php', $data);
    }
}
