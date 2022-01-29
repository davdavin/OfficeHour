<?php
class M_Subscribe extends CI_Model
{
    function tampil_paket()
    {
        return $this->db->query("SELECT * FROM paket");
    }

    function tampilkan_paket_dipilih($id_paket)
    {
        return $this->db->query("SELECT id_paket, nama_paket, harga FROM paket WHERE id_paket = '$id_paket'");
    }

    function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
