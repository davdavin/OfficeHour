<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_Klien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_klien') != "login") {
            redirect('Login/login_klien');
        }

        $this->load->model(array('M_Klien'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function profile($id_klien)
    {
        $data['title'] = 'OfficeHour - Klien | Profile';
        $data['profil'] = $this->M_Klien->profile_klien($id_klien)->result();
        $this->load->view('klien/v_account_klien.php', $data);
    }

    function update_profile()
    {
        $id_klien = $this->input->post('id_klien');
        $profil = $this->M_Klien->profile_klien($id_klien)->row_array();

        $this->form_validation->set_rules('nama_klien', 'Nama', 'required');
        if ($this->input->post('email_klien') == $profil['email_client']) {
            $this->form_validation->set_rules('email_klien', 'Email', 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email_klien', 'Email', 'required|valid_email|is_unique[client.email_client]');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi. Silahkan diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_klien'),
                'error_email' => form_error('email_klien')
            );
            echo json_encode($respon);
        } else {
            $where = array('id_client' => $id_klien);
            $data = array(
                'nama_client' => $this->input->post('nama_klien'),
                'email_client' => $this->input->post('email_klien')
            );
            $session = array(
                'nama_klien' => $this->input->post('nama_klien')
            );
            $this->session->set_userdata($session);
            $this->M_Klien->update_record($where, $data, 'client');
            $respon['sukses'] = "Berhasil update";
            echo json_encode($respon);
        }
    }

    function update_password()
    {
        $id_klien = $this->session->userdata('id_klien');
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
            $cek_pass = $this->M_Klien->cek_login('client', ['id_client' => $id_klien])->row_array();
            if (password_verify($pass_lama, $cek_pass['password_client'])) {
                $where = array('id_client' => $id_klien);
                $data = array(
                    'password_client' => password_hash($pass_baru, PASSWORD_DEFAULT),
                );
                $this->M_Klien->update_record($where, $data, 'client');
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
