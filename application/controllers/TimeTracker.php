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

        $this->load->model(array('M_Karyawan', 'M_TimeTracker'));
    }

    function index()
    {
        $data['aktivitas'] = $this->M_TimeTracker->aktivitas_karyawan()->result();
        $data['tugas_project'] = $this->M_TimeTracker->tampil_semua_tugas()->result();
        $this->load->view('v_timetracker.php', $data);
    }

    function proses_input_aktivitas()
    {
    }
}
