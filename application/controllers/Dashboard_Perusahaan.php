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
    }

    function index()
    {
        $this->load->view('v_dashboard_perusahaan.php');
    }
}
