<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectManage extends CI_Controller
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
        $this->load->view('v_project_manage.php');
    }
}
