<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //$this->load->model(array('M_Login'));
    }

    function index()
    {
        $this->load->view('v_login.php');
    }

    function verifikasi()
    {
        redirect('TimeTracker');
    }

    function logout()
    {
    }
}
