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
}
