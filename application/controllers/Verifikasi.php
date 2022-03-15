<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Karyawan'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['id'] = $_REQUEST['key'];
        $id = $_REQUEST['key'];
        $data['karyawan'] = $this->db->query("SELECT id_karyawan, nama_karyawan, email_karyawan from karyawan WHERE token = '$id'")->row_array();
        $this->load->view('v_verif', $data);
    }

    function proses_verifikasi()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $token = $this->input->post('token');
        $password = $this->input->post('confirm_password');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai'));

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $data['id'] = $token;
            $data['karyawan'] = $this->db->query("SELECT id_karyawan, nama_karyawan, email_karyawan from karyawan WHERE token = '$token'")->row_array();
            $this->load->view('v_verif', $data);
        } else {
            $where = array('id_karyawan' => $id_karyawan);

            $data = array(
                'password_karyawan' => password_hash($password, PASSWORD_DEFAULT),  'status_karyawan' => 1,
            );

            $this->M_Karyawan->update_record($where, $data, 'karyawan');

            $this->session->set_flashdata('sukses', 'Berhasil sign up. Akun sudah aktif');
            redirect('Login/login_karyawan');
        }
    }

    function klien()
    {
        $data['id'] = $_REQUEST['key'];
        $id = $_REQUEST['key'];
        $data['klien'] = $this->db->query("SELECT id_client, nama_client, email_client from client WHERE token = '$id'")->row_array();
        $this->load->view('v_verif_klien', $data);
    }

    function proses_verifikasi_klien()
    {
        $id_klien = $this->input->post('id_klien');
        $token = $this->input->post('token');
        $password = $this->input->post('confirm_password');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai'));

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $data['id'] = $token;
            $data['klien'] = $this->db->query("SELECT id_client, nama_client, email_client from client WHERE token = '$token'")->row_array();
            $this->load->view('v_verif_klien', $data);
        } else {
            $where = array('id_client' => $id_klien);

            $data = array(
                'password_client' => password_hash($password, PASSWORD_DEFAULT),  'status_client' => 1,
            );

            $this->M_Karyawan->update_record($where, $data, 'client');

            $this->session->set_flashdata('sukses', 'Berhasil sign up. Akun sudah aktif');
            redirect('Login/login_klien');
        }
    }
}
