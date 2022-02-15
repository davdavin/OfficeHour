<?php
class M_Karyawan extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function profil_karyawan($id_karyawan)
    {
        return $this->db->query("SELECT id_karyawan, nama_karyawan, alamat_karyawan, email_karyawan, posisi_karyawan FROM karyawan WHERE id_karyawan = '$id_karyawan'");
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

    function delete_record($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
