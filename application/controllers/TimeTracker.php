<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TimeTracker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_karyawan') != "login") {
            redirect('Login/login_karyawan');
        }

        $this->load->model(array('M_Karyawan'));
    }

    function index()
    {
        $this->session->userdata('nama_karyawan');
        // $data['aktivitas']
        $this->load->view('v_timetracker.php');
    }
}
