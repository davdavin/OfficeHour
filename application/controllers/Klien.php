<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status_login_klien') != "login") {
            redirect('Login/login_klien');
        }
        $this->load->model(array('M_Klien', 'M_Project'));
        $this->load->helper('form', 'url');
    }

    function index()
    {
        $id_klien = $this->session->userdata('id_klien');
        $data['title'] = 'OfficeHour - Klien';
        $data['list_project'] = $this->M_Klien->tampil_project($id_klien)->result();
        $data['total_project'] = $this->M_Klien->total_project($id_klien)->row_array();
        $this->load->view('klien/v_halaman_utama_klien.php', $data);
    }

    function project_detail($id_project, $id_perusahaan)
    {
        $data['title'] = 'OfficeHour - Klien | Project';
        $data['project_detail'] = $this->M_Project->project_detail($id_project, $id_perusahaan)->result();
        $data['total_tugas'] = $this->M_Project->total_tugas_project($id_project, $id_perusahaan)->result();
        $data['total_status_berjalan'] = $this->M_Project->get_total_status_berjalan($id_project, $id_perusahaan)->result();
        $data['total_status_selesai'] = $this->M_Project->get_total_status_selesai($id_project, $id_perusahaan)->result();
        $data['anggota_project'] = $this->M_Project->get_anggota_project($id_project, $id_perusahaan)->result();
        $this->load->view('klien/v_detail_project_klien.php', $data);
    }
}
