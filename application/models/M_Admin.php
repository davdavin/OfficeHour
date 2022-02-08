<?php
class M_Admin extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function tampil_paket()
    {
        return $this->db->query("SELECT * FROM paket");
    }
}
