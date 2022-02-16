<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_perusahaan') != "login") {
            redirect('Login/login_perusahaan');
        }

        $this->load->model(array('M_Perusahaan'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function profile($id_perusahaan)
    {
        $data['profile_perusahaan'] = $this->M_Perusahaan->pilih_perusahaan($id_perusahaan)->result();
        $this->load->view('v_account_perusahaan.php', $data);
    }

    function update_profile()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');

        $this->form_validation->set_rules('nama_perusahaan', 'Nama', 'required');
        if ($this->input->post('username') == $this->session->userdata('username_perusahaan')) {
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[perusahaan.username]');
        }
        $this->form_validation->set_rules('email_perusahaan', 'Email', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi. Silahkan diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');

        if ($this->form_validation->run() == FALSE) {
            $data['profile_perusahaan'] = $this->M_Perusahaan->pilih_perusahaan($id_perusahaan)->result();
            $this->load->view('v_account_perusahaan.php', $data);
        } else {
            $where = array('id_perusahaan' => $id_perusahaan);
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'username' => $this->input->post('username'),
                'email_perusahaan' => $this->input->post('email_perusahaan')
            );
            $session = array(
                'username' => $this->input->post('username_perusahaan')
            );
            $this->session->set_userdata($session);
            $this->M_Perusahaan->update_record($where, $data, 'perusahaan');
            $this->session->set_flashdata('sukses', 'Update berhasil');
            redirect('Account_Perusahaan/profile/' . $id_perusahaan);
        }
    }

    function update_password()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
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
            $cek_pass = $this->M_Perusahaan->cek_login('perusahaan', ['id_perusahaan' => $id_perusahaan])->row_array();
            if (password_verify($pass_lama, $cek_pass['password'])) {
                $where = array('id_perusahaan' => $id_perusahaan);
                $data = array(
                    'password' => password_hash($pass_baru, PASSWORD_DEFAULT),
                );
                $this->M_Perusahaan->update_record($where, $data, 'perusahaan');
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
