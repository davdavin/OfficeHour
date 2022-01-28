<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectManage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        /*    if($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        } */
    }

    function index()
    {
        $this->load->view('v_project_manage.php');
    }
}