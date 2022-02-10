<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_perusahaan') != "login") {
            redirect('Login/login_perusahaan');
        }

        $this->load->model(array('M_Perusahaan', 'M_Karyawan'));
        $this->load->helper('form', 'url');
    }

    public  function tampil_menu_utama()
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $this->load->view('v_dashboard_perusahaan.php', $data);
    }

    public function lihat_karyawan($id_perusahaan)
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan($id_perusahaan)->result();
        $this->load->view('v_lihat_daftar_karyawan.php', $data);
    }

    public function proses_tambah_karyawan()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $alamat_karyawan = $this->input->post('alamat_karyawan');
        $email_karyawan = $this->input->post('email_karyawan');
        $password = $this->input->post('password');
        $posisi_karyawan = $this->input->post('posisi_karyawan');
        $status_karyawan = $this->input->post('status');

        $data = array(
            'id_perusahaan' => $id_perusahaan, 'nama_karyawan' => $nama_karyawan, 'alamat_karyawan' => $alamat_karyawan, 'email_karyawan' => $email_karyawan,
            'password_karyawan' => password_hash($password, PASSWORD_DEFAULT), 'posisi_karyawan' => $posisi_karyawan, 'status_karyawan' => $status_karyawan
        );

        $this->M_Karyawan->insert_record($data, 'karyawan');
        $this->session->set_flashdata('sukses', 'Berhasil tambah karyawan');
        redirect('Dashboard_Perusahaan/lihat_karyawan/' . $id_perusahaan);
    }
}
