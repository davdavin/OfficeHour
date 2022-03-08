<?php
class M_Project extends CI_Model
{
    function tampil_anggota($id_project)
    {
        return $this->db->query("SELECT id_anggota_project, nama_karyawan FROM anggota_project JOIN karyawan 
                                ON anggota_project.id_karyawan = karyawan.id_karyawan WHERE id_project = '$id_project'");
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
