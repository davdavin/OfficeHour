<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscribe extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Subscribe', 'M_Perusahaan'));
        $this->load->helper(array('form', 'url'));
    }

    function form_subscribe($id_paket)
    {
        $data['paket'] = $this->M_Subscribe->tampilkan_paket_dipilih($id_paket)->result();
        $this->load->view('v_subscribe.php', $data);
    }

    function proses_subscribe()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[25]|is_unique[perusahaan.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_message('required', '{field} wajib disini. Silahkan diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');

        $baris = $this->M_Perusahaan->tampil_perusahaan()->num_rows();
        $id_perusahaan = 'PRSH' . $baris + 1;
        $id_paket = $this->input->post('id_paket');
        $nama_paket = $this->input->post('paket');
        $nama_perusahaan = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        /*       date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
*/
        if ($this->form_validation->run() == FALSE) {
            $data['paket'] = $this->M_Subscribe->tampilkan_paket_dipilih($id_paket)->result();
            $this->load->view('v_subscribe.php', $data);
        } else {
            $this->db->trans_start();

            $data_perusahaan = array(
                'id_perusahaan' => $id_perusahaan, 'nama_perusahaan' => $nama_perusahaan, 'username' => $username, 'password' => $password,
                'email_perusahaan' => $email, 'status_perusahaan' => 0
            );

            $this->M_Perusahaan->insert_record($data_perusahaan, 'perusahaan');

            $data_susbcribe = array(
                'id_perusahaan' => $id_perusahaan, 'id_paket' => $id_paket
            );

            $this->M_Subscribe->insert_record($data_susbcribe, 'subscribe');

            $this->db->trans_complete();
            $this->session->set_flashdata('sukses', 'Berhasil subscribe. Paket yang dipilih adalah ' . $nama_paket . ' Silahkan login dengan akun anda');
            redirect('Login/login_perusahaan');
        }
    }
}
