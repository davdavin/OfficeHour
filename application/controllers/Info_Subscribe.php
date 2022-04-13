<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_Subscribe extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_perusahaan') != "masa_langganan_habis") {
            redirect('Login/login_perusahaan');
        }

        $this->load->model(array('M_Admin'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->db->query("SELECT id_perusahaan, nama_perusahaan FROM perusahaan WHERE username = '$username'")->result();
        $data['paket'] = $this->M_Admin->tampil_paket()->result();
        $this->load->view('subscribe/v_subscribe.php', $data);
    }

    public function langganan($id_paket) {
        $data['paket'] = $this->M_Subscribe->tampilkan_paket_dipilih($id_paket)->result();
        $this->load->view('subscribe/v_daftar_langganan.php', $data);
    }
}
