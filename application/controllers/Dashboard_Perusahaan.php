<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_perusahaan') != "login") {
            redirect('Login/login_perusahaan');
        }

        $this->load->model(array('M_Perusahaan'));
    }

    function tampil_menu_utama()
    {
        $username = $this->session->userdata('username');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $this->load->view('v_dashboard_perusahaan.php', $data);
    }
}
