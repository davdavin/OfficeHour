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
    }

    function index()
    {
        $this->load->view('v_timetracker.php');
    }
}
