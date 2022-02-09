<?php
class M_Admin extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function tampil_subscriber()
    {
        $this->db->select('perusahaan.id_perusahaan, nama_perusahaan, subscribe.id_subscribe, nama_paket, harga, tanggal_bayar, status_perusahaan, status_bayar');
        $this->db->from('perusahaan');
        $this->db->join('subscribe', 'perusahaan.id_perusahaan = subscribe.id_perusahaan');
        $this->db->join('paket', 'subscribe.id_paket = paket.id_paket');
        return $this->db->get();
    }

    public function tampil_paket()
    {
        return $this->db->query("SELECT * FROM paket");
    }
}
