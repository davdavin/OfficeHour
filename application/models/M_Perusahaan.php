<?php
class M_Perusahaan extends CI_Model
{
    function tampil_perusahaan()
    {
        return $this->db->query("SELECT * FROM perusahaan");
    }

    function pilih_perusahaan($id_perusahaan)
    {
        return $this->db->query("SELECT * FROM perusahaan WHERE id_perusahaan = '$id_perusahaan'");
    }

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
