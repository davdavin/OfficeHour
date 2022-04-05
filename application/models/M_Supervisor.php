<?php
class M_Supervisor extends CI_Model
{
    function semua_project($id_karyawan)
    {
        $id_perusahaan = $this->db->query("SELECT id_perusahaan FROM karyawan WHERE id_karyawan = $id_karyawan")->row_array();
        return $this->db->query("SELECT * FROM project WHERE id_perusahaan = '" .  $id_perusahaan['id_perusahaan']  . "'");
    }

    function total_project($id_karyawan)
    {
        $id_perusahaan = $this->db->query("SELECT id_perusahaan FROM karyawan WHERE id_karyawan = $id_karyawan")->row_array();
        return $this->db->query("SELECT count(id_project) as totalProject FROM project WHERE id_perusahaan = '" .  $id_perusahaan['id_perusahaan']  . "'");
    }

    function status_project_berjalan($id_karyawan)
    {
        $id_perusahaan = $this->db->query("SELECT id_perusahaan FROM karyawan WHERE id_karyawan = $id_karyawan")->row_array();
        return $this->db->query("SELECT count(status_project) as totalStatus FROM project WHERE status_project = 'SEDANG BERJALAN' AND id_perusahaan = '" .  $id_perusahaan['id_perusahaan']  . "' ");
    }

    function status_project_selesai($id_karyawan)
    {
        $id_perusahaan = $this->db->query("SELECT id_perusahaan FROM karyawan WHERE id_karyawan = $id_karyawan")->row_array();
        return $this->db->query("SELECT count(status_project) as totalStatus FROM project WHERE status_project = 'SELESAI' AND id_perusahaan = '" .  $id_perusahaan['id_perusahaan']  . "' ");
    }

    function project_detail($id_project, $id_perusahaan)
    {
        return $this->db->query("SELECT * FROM project JOIN karyawan ON karyawan.id_karyawan = project.project_manager WHERE id_project = '$id_project' AND project.id_perusahaan = '$id_perusahaan'");
    }

    function get_karyawan($id_karyawan)
    {
        return $this->db->query("SELECT id_karyawan, nama_karyawan, posisi_karyawan FROM karyawan WHERE id_karyawan = '$id_karyawan'");
    }

    function get_ss($id_karyawan)
    {
        return $this->db->query("SELECT * FROM foto_screenshoot JOIN tugas_project ON tugas_project.id_tugas_project = foto_screenshoot.id_tugas_project WHERE id_karyawan = '$id_karyawan'");
    }

    function tugas_karyawan($id_karyawan)
    {
        return $this->db->query("SELECT * FROM project INNER JOIN anggota_project ON anggota_project.id_project = project.id_project INNER JOIN tugas_project ON tugas_project.id_anggota_project = anggota_project.id_anggota_project  
        WHERE id_karyawan = '$id_karyawan' ORDER BY nama_project ASC");
    }

    function aktivitas_karyawan($id_karyawan)
    {
        return $this->db->query("SELECT nama_project, nama_tugas, tanggal_aktivitas, waktu_mulai, waktu_selesai, status_tugas, bukti FROM aktivitas JOIN tugas_project 
                                ON aktivitas.id_tugas_project = tugas_project.id_tugas_project 
                                JOIN project ON aktivitas.id_project = project.id_project 
                                JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project
                                WHERE anggota_project.id_karyawan = '$id_karyawan'");
    }
}
