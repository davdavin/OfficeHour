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

        $this->load->model(array('M_Perusahaan', 'M_Karyawan', 'M_Klien'));
        $this->load->helper('form', 'url');
    }

    public  function tampil_menu_utama()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
        $this->load->view('v_dashboard_perusahaan.php', $data);
    }

    public function lihat_karyawan($id_perusahaan)
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan($id_perusahaan)->result();
        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
        $this->load->view('v_lihat_daftar_karyawan.php', $data);
    }

    function proses_tambah_karyawan()
    {
        $this->load->library('form_validation');

        $id_perusahaan = $this->input->post('id_perusahaan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $alamat_karyawan = $this->input->post('alamat_karyawan');
        $email_karyawan = $this->input->post('email_karyawan');
        $password = $this->input->post('password');
        $posisi_karyawan = $this->input->post('posisi_karyawan');
        $status_karyawan = $this->input->post('status');

        $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_karyawan', 'Alamat', 'required');
        $this->form_validation->set_rules('email_karyawan', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('posisi_karyawan', 'Posisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $this->form_validation->set_message('required', '{field} wajib disini atau dipilih. Silahkan diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $hasil['sukses'] = false;
            $hasil['error_nama'] = form_error('nama_karyawan');
            $hasil['error_alamat'] = form_error('alamat_karyawan');
            $hasil['error_email'] = form_error('email_karyawan');
            $hasil['error_password'] = form_error('password');
            $hasil['error_posisi'] = form_error('posisi_karyawan');
            $hasil['error_status'] = form_error('status');
            echo json_encode($hasil);
        } else {
            $data = array(
                'id_perusahaan' => $id_perusahaan, 'nama_karyawan' => $nama_karyawan, 'alamat_karyawan' => $alamat_karyawan, 'email_karyawan' => $email_karyawan,
                'password_karyawan' => password_hash($password, PASSWORD_DEFAULT), 'posisi_karyawan' => $posisi_karyawan, 'status_karyawan' => $status_karyawan
            );

            $this->M_Karyawan->insert_record($data, 'karyawan');
            $hasil['sukses'] = "Behasil tambah karyawan";
            echo json_encode($hasil);
        }
    }

    public function lihat_klien($id_perusahaan)
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['klien'] = $this->M_Perusahaan->lihat_klien($id_perusahaan)->result();
        $this->load->view('v_lihat_daftar_klien.php', $data);
    }

    public function proses_tambah_klien()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $nama_klien = $this->input->post('nama_klien');
        $email_klien = $this->input->post('email_klien');
        $password = $this->input->post('password');

        $data = array(
            'id_perusahaan' => $id_perusahaan, 'nama_client' => $nama_klien, 'password_client' => password_hash($password, PASSWORD_DEFAULT), 'email_client' => $email_klien
        );

        $this->M_Klien->insert_record($data, 'client');
        $this->session->set_flashdata('sukses', 'Berhasil menambahkan klien baru');
        redirect('Dashboard_Perusahaan/lihat_klien/' . $id_perusahaan);
    }
}
