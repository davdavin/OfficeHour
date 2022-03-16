<?php
class M_Klien extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function profile_klien($id_klien)
    {
        return $this->db->query("SELECT * FROM client WHERE id_client = '$id_klien'");
    }

    function tampil_project($id_klien)
    {
        return $this->db->query("SELECT id_project, project.id_perusahaan, nama_project, nama_perusahaan, status_project FROM project JOIN perusahaan ON perusahaan.id_perusahaan = project.id_perusahaan
                                WHERE id_client = '$id_klien'");
    }

    function total_project($id_klien)
    {
        return $this->db->query("SELECT count(id_project) as totalProject FROM project WHERE id_client = '$id_klien'");
    }

    function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_record($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
