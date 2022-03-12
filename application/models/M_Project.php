<?php
class M_Project extends CI_Model
{
    function tampil_anggota($id_project)
    {
        return $this->db->query("SELECT id_anggota_project, nama_karyawan FROM anggota_project JOIN karyawan 
                                ON anggota_project.id_karyawan = karyawan.id_karyawan WHERE id_project = '$id_project'");
    }

    function tampil_project($id_perusahaan)
    {
        return $this->db->query("SELECT * FROM project JOIN karyawan ON project.project_manager = karyawan.id_karyawan 
                                JOIN client ON project.id_client = client.id_client WHERE karyawan.id_perusahaan = '$id_perusahaan'");
    }

    function tampil_anggota_project($id_perusahaan)
    {
        return $this->db->query("SELECT anggota_project.id_project, nama_karyawan, nama_tugas FROM anggota_project INNER JOIN karyawan ON anggota_project.id_karyawan = karyawan.id_karyawan 
                                INNER JOIN tugas_project ON tugas_project.id_anggota_project = anggota_project.id_anggota_project WHERE id_perusahaan = '$id_perusahaan' ");
    }

    function project_detail($id_project, $id_perusahaan)
    {
        return $this->db->query("SELECT * FROM project JOIN karyawan ON karyawan.id_karyawan = project.project_manager WHERE id_project = '$id_project' AND project.id_perusahaan = '$id_perusahaan'");
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
