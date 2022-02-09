<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Admin', 'M_Subscribe', 'M_Perusahaan'));
    }

    function index()
    {
        $this->load->view('v_login_admin.php');
    }

    public function verifikasi_admin()
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

    public function dashboard()
    {
        if ($this->session->userdata('status_login_admin') != "login") {
            redirect('Admin');
        } else {
            $data['subscriber'] = $this->M_Admin->tampil_subscriber()->result();
            $this->load->view('v_halaman_utama_admin.php', $data);
        }
    }

    public function paket()
    {
        if ($this->session->userdata('status_login_admin') != "login") {
            redirect('Admin');
        } else {
            $data['paket'] = $this->M_Admin->tampil_paket()->result();
            $this->load->view('v_paket_subscribe.php', $data);
        }
    }

    public function proses_konfirmasi_pembayaran()
    {
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Admin');
    }
}
