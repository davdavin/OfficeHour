<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_karyawan') != "login") {
            redirect('Login/login_karyawan');
        }

        $this->load->model(array('M_Karyawan'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function index()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        $data['profil_karyawan'] = $this->M_Karyawan->profil_karyawan($id_karyawan)->result();
        $this->load->view('v_account_karyawan.php', $data);
    }

    function update_profile()
    {
        $id_karyawan = $this->input->post('id_karyawan');

        $profil = $this->M_Karyawan->profil_karyawan($id_karyawan)->row_array();

        $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
        if ($this->input->post('email_karyawan') == $profil['email_karyawan']) {
            $this->form_validation->set_rules('email_karyawan', 'Email', 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email_karyawan', 'Email', 'required|valid_email|is_unique[karyawan.email_karyawan]');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi. Silahkan diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_karyawan'),
                'error_email' => form_error('email_karyawan')
            );
            echo json_encode($respon);
        } else {
            $where = array('id_karyawan' => $id_karyawan);
            $data = array(
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'email_karyawan' => $this->input->post('email_karyawan')
            );
            $session = array(
                'nama_karyawan' => $this->input->post('nama_karyawan')
            );
            $this->session->set_userdata($session);
            $this->M_Karyawan->update_record($where, $data, 'karyawan');
            $respon['sukses'] = "Berhasil update";
            echo json_encode($respon);
        }
    }

    function update_password()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        $pass_lama = $this->input->post('currentpass');
        $pass_baru = $this->input->post('newpass');

        $this->form_validation->set_rules('currentpass', 'Password', 'required|trim');
        $this->form_validation->set_rules('newpass', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('confirmpass', 'Konfirmasi Password', 'required|matches[newpass]', array('matches' => '%s tidak sesuai'));

        $this->form_validation->set_message('required', '{field} wajib diisi. Silahkan diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_currentpass' => form_error('currentpass'),
                'error_newpass' => form_error('newpass'),
                'error_retype' => form_error('confirmpass')
            );
            echo json_encode($respon);
        } else {
            $cek_pass = $this->M_Karyawan->cek_login('karyawan', ['id_karyawan' => $id_karyawan])->row_array();
            if (password_verify($pass_lama, $cek_pass['password_karyawan'])) {
                $where = array('id_karyawan' => $id_karyawan);
                $data = array(
                    'password_karyawan' => password_hash($pass_baru, PASSWORD_DEFAULT),
                );
                $this->M_Karyawan->update_record($where, $data, 'karyawan');
                $respon['sukses'] = 'Berhasil ganti password';
                echo json_encode($respon);
            } else {
                $respon = array(
                    'sukses' => false,
                    'error_currentpass' => 'Password anda salah'
                );
                echo json_encode($respon);
            }
        }
    }
}
