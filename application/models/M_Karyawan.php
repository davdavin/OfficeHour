<?php
class M_Karyawan extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function profil_karyawan($id_karyawan)
    {
        return $this->db->query("SELECT * FROM karyawan WHERE id_karyawan = '$id_karyawan'");
    }

    function project_karyawan($id_karyawan)
    {
        return $this->db->query("SELECT * FROM project JOIN anggota_project ON anggota_project.id_project = project.id_project 
                                WHERE id_karyawan = '$id_karyawan'");
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
