<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Perusahaan'));
        $this->load->library(array('form', 'url'));
    }

    function index()
    {
        $this->load->view('v_login.php');
    }

    function login_perusahaan()
    {
        $this->load->view('v_login_perusahaan.php');
    }

    function login_klien()
    {
        $this->load->view('v_login_klien.php');
    }

    function login_karyawan()
    {
        $this->load->view('v_login_karyawan.php');
    }

    function verifikasi_perusahaan()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

