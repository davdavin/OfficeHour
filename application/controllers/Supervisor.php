<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_karyawan') != "login") {
            redirect('Login/login_karyawan');
        }

        $this->load->model(array('M_Project', 'M_Supervisor'));
    }

    function index()
    {
        $data['title'] = 'OfficeHour - Karyawan | Supervisor';
        $data['totalProject'] = $this->M_Supervisor->total_project($this->session->userdata('id_karyawan'))->row_array();
        $data['status_berjalan'] = $this->M_Supervisor->status_project_berjalan($this->session->userdata('id_karyawan'))->row_array();
        $data['status_selesai'] = $this->M_Supervisor->status_project_selesai($this->session->userdata('id_karyawan'))->row_array();
        $data['project'] = $this->M_Supervisor->semua_project($this->session->userdata('id_karyawan'))->result();
        $this->load->view('v_halaman_utama_supervisor.php', $data);
    }

    function project_detail($id_project)
    {
        $data['title'] = 'OfficeHour - Karyawan | Supervisor';
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $data['idProject'] = $id_project;
        $data['project_detail'] = $this->M_Project->project_detail($id_project, $id_perusahaan)->result();
        $data['total_tugas'] = $this->M_Project->total_tugas_project($id_project, $id_perusahaan)->result();
        $data['total_status_berjalan'] = $this->M_Project->get_total_status_berjalan($id_project, $id_perusahaan)->result();
        $data['total_status_selesai'] = $this->M_Project->get_total_status_selesai($id_project, $id_perusahaan)->result();
        $data['anggota_project'] = $this->M_Project->get_anggota_project($id_project, $id_perusahaan)->result();
        $data['jam'] = $this->db->query("SELECT TIMESTAMPDIFF(hour, waktu_mulai , waktu_selesai) AS MinuteDiff from aktivitas WHERE id_aktivitas = 2")->row_array();
        $this->load->view('v_detail_project_supervisor.php', $data);
    }
}
