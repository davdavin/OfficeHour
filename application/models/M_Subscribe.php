<?php
class M_Subscribe extends CI_Model
{
    function tampil_paket()
    {
        return $this->db->query("SELECT * FROM paket");
    }

    function tampilkan_paket_dipilih($id_paket)
    {
        return $this->db->query("SELECT id_paket, nama_paket, harga, maks_orang FROM paket WHERE id_paket = '$id_paket'");
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
