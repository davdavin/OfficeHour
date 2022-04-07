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

        $this->load->model(array('M_Project', 'M_Supervisor', 'M_Perusahaan'));
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
        $data['senin'] = $this->db->query("SELECT sum(durasi) AS MinuteDiff from aktivitas WHERE id_project = $id_project AND hari = 'Mon'")->row_array();
        $data['selasa'] = $this->db->query("SELECT sum(durasi) AS MinuteDiff from aktivitas WHERE id_project = $id_project AND hari = 'Tue'")->row_array();
        $data['rabu'] = $this->db->query("SELECT sum(durasi) AS MinuteDiff from aktivitas WHERE id_project = $id_project AND hari = 'Wed'")->row_array();
        $data['kamis'] = $this->db->query("SELECT sum(durasi) AS MinuteDiff from aktivitas WHERE id_project = $id_project AND hari = 'Thu'")->row_array();
        $data['jumat'] = $this->db->query("SELECT sum(durasi) AS MinuteDiff from aktivitas WHERE id_project = $id_project AND hari = 'Fri'")->row_array();
        $data['sabtu'] = $this->db->query("SELECT sum(durasi) AS MinuteDiff from aktivitas WHERE id_project = $id_project AND hari = 'Sat'")->row_array();
        $data['minggu'] = $this->db->query("SELECT sum(durasi) AS MinuteDiff from aktivitas WHERE id_project = $id_project AND hari = 'Sun'")->row_array();
        $this->load->view('v_detail_project_supervisor.php', $data);
    }

    public function daftar_karyawan()
    {
        $data['title'] = 'OfficeHour - Karyawan | Supervisor';
        $id_karyawan = $this->session->userdata('id_karyawan');
        $id_perusahaan = $this->db->query("SELECT id_perusahaan FROM karyawan WHERE id_karyawan = $id_karyawan")->row_array();
        $id = $id_perusahaan['id_perusahaan'];
        $data['graph'] = $this->db->query("SELECT nama_project, sum(durasi) as durasi FROM aktivitas JOIN project ON project.id_project = aktivitas.id_project 
                        WHERE id_perusahaan = '$id' AND status_project = 'SEDANG BERJALAN' GROUP BY nama_project")->result();
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan($this->session->userdata('id_perusahaan'))->result();
        $this->load->view('v_lihat_karyawan_supervisor.php', $data);
    }

    public function aktivitas($id_karyawan)
    {
        $data['title'] = 'OfficeHour - Karyawan | Supervisor';
        $data['grafik_karyawan'] = $this->db->query("SELECT nama_project, sum(durasi) as durasi FROM aktivitas JOIN project ON project.id_project = aktivitas.id_project 
                                    WHERE id_karyawan = '$id_karyawan' GROUP BY nama_project ")->result();
        $data['info'] = $this->M_Supervisor->get_karyawan($id_karyawan)->row_array();
        $data['foto'] = $this->M_Supervisor->get_ss($id_karyawan)->result();
        $data['tugas'] = $this->M_Supervisor->tugas_karyawan($id_karyawan)->result();
        $data['aktivitas'] = $this->M_Supervisor->aktivitas_karyawan($id_karyawan)->result();
        $this->load->view('v_detail_karyawan.php', $data);
    }

    public function export($id_karyawan, $nama_karyawan)
    {
        $conn = new mysqli('localhost', 'root', '');
        mysqli_select_db($conn, 'officehour');
        $sql = "SELECT nama_project, nama_tugas, tanggal_aktivitas, waktu_mulai, waktu_selesai, durasi, bukti FROM aktivitas JOIN tugas_project 
                ON aktivitas.id_tugas_project = tugas_project.id_tugas_project 
                JOIN project ON aktivitas.id_project = project.id_project 
                JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project
                WHERE anggota_project.id_karyawan = '$id_karyawan'";
        $setRec = mysqli_query($conn, $sql);
        $columnHeader = '';
        $columnHeader = "Project" . "\t" . "Tugas" . "\t" . "Tanggal Aktivitas" . "\t" . "Waktu Mulai" . "\t" . "Waktu Selesai" . "\t" . "Durasi" . "\t" . "Keterangan" . "\t";
        $setData = '';
        while ($rec = mysqli_fetch_row($setRec)) {
            $rowData = '';
            foreach ($rec as $value) {
                $value = '"' . $value . '"' . "\t";
                $rowData .= $value;
            }
            $setData .= trim($rowData) . "\n";
        }
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=Aktivitas_" . $nama_karyawan . ".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo ucwords($columnHeader) . "\n" . $setData . "\n";
    }
}
