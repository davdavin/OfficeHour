<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Perusahaan'));
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

        $where = array(
            'username' => $username,
            'password' => $password
        );

        $cek_login = $this->M_Perusahaan->cek_login('perusahaan', $where)->num_rows();

        if ($cek_login == 1) {
            $session = array(
                'status_login_perusahaan' => 'login'
            );

            $session_data = $this->M_Perusahaan->cek_login('perusahaan', $where)->row_array();

            $this->session->set_userdata($session);
            $this->session->set_userdata($session_data);
            redirect('Dashboard_Perusahaan');
        } else {
            $this->session->set_flashdata('gagal', 'Username atau password salah');
            redirect('Login/login_perusahaan');
        }
    }

    function logout_perusahaan()
    {
        $this->session->sess_destroy();
        redirect('Login/login_perusahaan');
    }

    function logout_klien()
    {
        $this->session->sess_destroy();
        redirect('Login/login_klien');
    }

    function logout_karyawan()
    {
        $this->session->sess_destroy();
        redirect('Login/login_karyawan');
    }
}
