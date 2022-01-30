<?php
class M_Perusahaan extends CI_Model
{
    function tampil_perusahaan()
    {
        return $this->db->query("SELECT * FROM perusahaan");
    }


    function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
