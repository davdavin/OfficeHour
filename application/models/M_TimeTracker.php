<?php
class M_TimeTracker extends CI_Model
{
    function aktivitas_karyawan()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        return $this->db->query("SELECT nama_project, nama_tugas, tanggal_aktivitas, waktu_mulai, waktu_selesai, status_tugas, bukti FROM aktivitas JOIN tugas_project 
                                 ON aktivitas.id_tugas_project = tugas_project.id_tugas_project 
                                 JOIN project ON aktivitas.id_project = project.id_project 
                                 JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project
                                 WHERE anggota_project.id_karyawan = '$id_karyawan'");
    }

    function tampil_semua_tugas()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        return $this->db->query("SELECT project.id_project, nama_project, id_tugas_project, nama_tugas, batas_waktu, status_tugas FROM project 
                                INNER JOIN anggota_project ON anggota_project.id_project = project.id_project INNER JOIN tugas_project ON tugas_project.id_anggota_project = anggota_project.id_anggota_project
                                WHERE id_karyawan = '$id_karyawan' ");
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
