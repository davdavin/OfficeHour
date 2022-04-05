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

    function get_search_project($postData)
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        $response = array();

        if ($postData['search']) {
            //   $this->db->select("*");
            //  $this->db->where("nama_project LIKE '%" . $postData['search'] . "%'");
            //coba
            if ($this->session->userdata('posisi_karyawan') == "Project Manager") {
                $records = $this->db->query("SELECT * FROM project JOIN anggota_project ON anggota_project.id_project = project.id_project 
                WHERE id_karyawan = '$id_karyawan' AND nama_project LIKE '%" . $postData['search'] . "%'")->result();
                //$records = $this->db->get('project')->result();

                foreach ($records as $row) {
                    $response[] = array(
                        'id' => $row->id_project,
                        'label' => $row->nama_project,
                        'nama' => $row->nama_project
                    );
                }
                $records2 = $this->db->query("SELECT * FROM project WHERE project_manager = '$id_karyawan' AND nama_project LIKE '%" . $postData['search'] . "%'")->result();
                //$records = $this->db->get('project')->result();

                foreach ($records2 as $row) {
                    $response[] = array(
                        'id' => $row->id_project,
                        'label' => $row->nama_project,
                        'nama' => $row->nama_project
                    );
                }
                return $response;
            }

            $records = $this->db->query("SELECT * FROM project JOIN anggota_project ON anggota_project.id_project = project.id_project 
                            WHERE id_karyawan = '$id_karyawan' AND nama_project LIKE '%" . $postData['search'] . "%'")->result();
            //$records = $this->db->get('project')->result();

            foreach ($records as $row) {
                $response[] = array(
                    'id' => $row->id_project,
                    'label' => $row->nama_project,
                    'nama' => $row->nama_project
                );
            }
            return $response;
        }
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

    function total_tugas_project($id_project, $id_perusahaan)
    {
        return $this->db->query("SELECT count(id_tugas_project) as totalTugas FROM tugas_project JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project 
                                JOIN project ON project.id_project = anggota_project.id_project WHERE project.id_project = '$id_project' AND id_perusahaan = '$id_perusahaan'");
    }

    function get_total_status_berjalan($id_project, $id_perusahaan)
    {
        return $this->db->query("SELECT count(id_tugas_project) as totalStatus FROM tugas_project JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project 
                                JOIN project ON project.id_project = anggota_project.id_project WHERE project.id_project = '$id_project' AND id_perusahaan = '$id_perusahaan' AND status_tugas = 'SEDANG BERJALAN'");
    }

    function get_total_status_selesai($id_project, $id_perusahaan)
    {
        return $this->db->query("SELECT count(id_tugas_project) as totalStatus FROM tugas_project JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project 
                                JOIN project ON project.id_project = anggota_project.id_project WHERE project.id_project = '$id_project' AND id_perusahaan = '$id_perusahaan' AND status_tugas = 'SELESAI'");
    }

    function get_anggota_project($id_project, $id_perusahaan)
    {
        return $this->db->query("SELECT * FROM tugas_project JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project 
        JOIN project ON project.id_project = anggota_project.id_project JOIN karyawan ON karyawan.id_karyawan = anggota_project.id_karyawan WHERE project.id_project = '$id_project' AND project.id_perusahaan = '$id_perusahaan'");
    }

    function detail_tugas($id_tugas_project)
    {
        return $this->db->query("SELECT * FROM aktivitas JOIN tugas_project ON tugas_project.id_tugas_project = aktivitas.id_tugas_project JOIN anggota_project ON anggota_project.id_anggota_project = tugas_project.id_anggota_project 
                                JOIN karyawan ON karyawan.id_karyawan = anggota_project.id_karyawan JOIN project ON project.id_project = aktivitas.id_project WHERE aktivitas.id_tugas_project = '$id_tugas_project'");
    }

    function get_tanggal_waktu_aktivitas()
    {
        return $this->db->query("SELECT * FROM aktivitas WHERE id_aktivitas = 2");
    }

    function update_status_tugas($tanggal, $status, $id_project)
    {
        $this->db->query("UPDATE tugas_project,project,anggota_project SET tanggal_berhenti_tugas = '$tanggal', status_tugas = '$status' 
                        WHERE project.id_project = '$id_project' AND anggota_project.id_anggota_project = tugas_project.id_anggota_project AND project.id_project = anggota_project.id_project");
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
