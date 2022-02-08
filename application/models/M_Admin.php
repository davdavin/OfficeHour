<?php
class M_Admin extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function tampil_subscriber()
    {
        $this->db->select('perusahaan.id_perusahaan, nama_perusahaan, nama_paket, harga, tanggal_bayar, status_perusahaan');
        $this->db->from('perusahaan');
        $this->db->join('subscribe', 'perusahaan.id_perusahaan = subscribe.id_perusahaan');
        $this->db->join('paket', 'subscribe.id_paket = paket.id_paket');
        return $this->db->get();
    }

    function tampil_paket()
    {
        return $this->db->query("SELECT * FROM paket");
    }
}
