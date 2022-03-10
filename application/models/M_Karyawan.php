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
        /* if ($this->session->userdata('posisi_karyawan') == "Project Manager") {
            $baris = $this->db->query("SELECT count(nama_project) as baris FROM project, anggota_project WHERE anggota_project.id_project <> project.id_project 
            AND anggota_project.id_project = project.id_project AND project_manager = '$id_karyawan' OR id_karyawan = '$id_karyawan'")->row_array();

            if ($baris['baris'] == 0) {
                return $this->db->query("SELECT id_project, nama_project, status_project FROM project WHERE project_manager = '$id_karyawan'");
            } else {
                return $this->db->query("SELECT project.id_project, nama_project, status_project FROM project, anggota_project WHERE anggota_project.id_project <> project.id_project 
            AND anggota_project.id_project = project.id_project AND project_manager = '$id_karyawan' OR id_karyawan = '$id_karyawan'");
            }


           
        } else {
            return $this->db->query("SELECT * FROM project JOIN anggota_project ON anggota_project.id_project = project.id_project 
            WHERE anggota_project.id_karyawan = '$id_karyawan'");
        } */

        return $this->db->query("SELECT project.id_project, nama_project, status_project FROM project INNER JOIN anggota_project ON anggota_project.id_project = project.id_project
            WHERE anggota_project.id_karyawan = '$id_karyawan'");
    }

    function project_pm($id_karyawan)
    {
        return $this->db->query("SELECT id_project, nama_project, status_project FROM project WHERE project_manager = '$id_karyawan'");
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
