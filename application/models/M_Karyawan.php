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
        if ($this->session->userdata('posisi_karyawan') == "Project Manager") {
            return $this->db->query("SELECT project.id_project, nama_project, status_project FROM project, anggota_project WHERE anggota_project.id_project <> project.id_project 
            AND anggota_project.id_project = project.id_project AND project_manager = '$id_karyawan' OR id_karyawan = '$id_karyawan'");


            /*    return $this->db->query("SELECT nama_project, status_project FROM project LEFT JOIN anggota_project ON anggota_project.id_project = project.id_project
            WHERE project.id_karyawan = '$id_karyawan' OR anggota_project.id_karyawan = '$id_karyawan' GROUP BY nama_project"); */
        } else {
            return $this->db->query("SELECT * FROM project JOIN anggota_project ON anggota_project.id_project = project.id_project 
            WHERE anggota_project.id_karyawan = '$id_karyawan'");
        }
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
