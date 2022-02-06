<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Admin'));
    }

    function index()
    {
        $this->load->view('v_login_admin.php');
    }

    function verifikasi_admin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => $password
        );

        $cek_login = $this->M_Admin->cek_login('akun_admin', $where)->num_rows();

        if ($cek_login == 1) {
            $session = array(
                'username' => $username,
                'status_login_admin' => 'login'
            );

            $this->session->set_userdata($session);
            redirect('Admin/dashboard');
        } else {
            $this->session->set_flashdata('gagal', 'Username atau password salah');
            redirect('Admin');
        }
    }

    function dashboard()
    {
        if ($this->session->userdata('status_login_admin') != "login" /* && $this->session->userdata('username') == null*/) {
            redirect('Admin');
        } else {
            $this->load->view('v_halaman_utama_admin.php');
        }
    }

    function logout()
    {
        unset($_SESSION['status_login_admin']);
        unset($_SESSION['username']);
        //    $this->session->sess_destroy('status_login_admin');
        redirect('Admin');
    }
}
