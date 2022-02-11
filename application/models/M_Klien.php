<?php
class M_Klien extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
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
