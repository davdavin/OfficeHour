<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignUp extends CI_Controller
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
        $this->load->view('v_signup.php');
    }

    function subscribe()
    {
        $this->load->view('v_subscribe.php');
    }
}
