<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectManage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status_login_karyawan') != "login") {
            redirect('Login/login_karyawan');
        }

        $this->load->model(array('M_Karyawan', 'M_Perusahaan', 'M_Project'));
        $this->load->helper('form', 'url');
    }

    function index()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        $data['projectPM'] = $this->M_Karyawan->project_pm($id_karyawan)->result();
        $data['total'] = $this->M_Karyawan->project_pm($id_karyawan)->num_rows();
        $data['totalProject'] = $this->M_Karyawan->project_karyawan($id_karyawan)->num_rows();
        $data['status_project_k'] = $this->M_Karyawan->get_status_project_karyawan($id_karyawan)->result();
        $data['status_project_pm'] = $this->M_Karyawan->get_status_project_pm($id_karyawan)->result();
        $data['projectKaryawan'] = $this->M_Karyawan->project_karyawan($id_karyawan)->result();
        $this->load->view('v_project_manage.php', $data);
    }

    function search_project()
    {
        $postData = $this->input->post();
        $data = $this->M_Project->get_search_project($postData);
        echo json_encode($data);
    }

    function project_detail($id_project)
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $data['idProject'] = $id_project;
        $data['project_detail'] = $this->M_Project->project_detail($id_project, $id_perusahaan)->result();
        $data['total_tugas'] = $this->M_Project->total_tugas_project($id_project, $id_perusahaan)->result();
        $data['total_status_berjalan'] = $this->M_Project->get_total_status_berjalan($id_project, $id_perusahaan)->result();
        $data['total_status_selesai'] = $this->M_Project->get_total_status_selesai($id_project, $id_perusahaan)->result();
        $data['anggota_project'] = $this->M_Project->get_anggota_project($id_project, $id_perusahaan)->result();
        $this->load->view('v_detail_project.php', $data);
    }

    function detail_tugas($id_tugas_project)
    {
        $data['tugas'] = $this->M_Project->detail_tugas($id_tugas_project)->result();
        $this->load->view('v_detail_aktivitas.php', $data);
    }

    function tambah_project()
    {
        $id = $this->M_Perusahaan->get_id_perusahaan($this->session->userdata('id_karyawan'))->row_array();
        $id_perusahaan = $id['id_perusahaan'];
        $data['klien'] = $this->M_Perusahaan->lihat_klien($id_perusahaan)->result();
        $data['message'] = " ";
        $this->load->view('v_tambah_project.php', $data);
    }

    function proses_tambah_project()
    {
        $id = $this->M_Perusahaan->get_id_perusahaan($this->session->userdata('id_karyawan'))->row_array();
        $id_perusahaan = $id['id_perusahaan'];
        $project_name = $this->input->post('nama_project');
        $project_manager = $this->input->post('project_manager');
        $deskripsi = $this->input->post('deskripsi');
        $project_start = $this->input->post('project_start');
        $project_end = $this->input->post('project_end');
        $id_klien = $this->input->post('id_klien');

        if ($project_end > $project_start) {
            $data = array(
                'id_perusahaan' => $id_perusahaan, 'id_client' => $id_klien, 'project_manager' => $project_manager, 'nama_project' => $project_name,
                'deskripsi_project' => $deskripsi, 'tanggal_mulai_project' => $project_start, 'batas_waktu_project' => $project_end, 'status_project' => 'SEDANG BERJALAN'
            );

            $this->M_Project->insert_record($data, 'project');

            $session = array('id_project' => $this->db->insert_id());
            $this->session->set_userdata($session);

            redirect('ProjectManage/asign_anggota_project');
        } else {
            $id = $this->M_Perusahaan->get_id_perusahaan($this->session->userdata('id_karyawan'))->row_array();
            $id_perusahaan = $id['id_perusahaan'];
            $data['klien'] = $this->M_Perusahaan->lihat_klien($id_perusahaan)->result();
            $data['message'] = "Tanggal yang dipilih harus benar. Batas waktu harus lebih dari tanggal mulai dan tanggal mulai";
            $this->load->view('v_tambah_project.php', $data);
        }
    }

    function asign_anggota_project()
    {
        $id = $this->M_Perusahaan->get_id_perusahaan($this->session->userdata('id_karyawan'))->row_array();
        $id_perusahaan = $id['id_perusahaan'];
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan($id_perusahaan)->result();
        $this->load->view('v_add_member.php', $data);
    }

    function asign_anggota_project_baru($id_project)
    {
        $id = $this->M_Perusahaan->get_id_perusahaan($this->session->userdata('id_karyawan'))->row_array();
        $id_perusahaan = $id['id_perusahaan'];
        $data['idProject'] = $id_project;
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan($id_perusahaan)->result();
        $data['anggota_project'] = $this->M_Project->get_anggota_project($id_project, $id_perusahaan)->result();
        $this->load->view('v_add_member_baru.php', $data);
    }

    function proses_tambah_anggota()
    {

        $i = 0; // untuk loopingnya
        $id_project = $this->input->post('id_project');
        $id_karyawan = $this->input->post('id_karyawan');
        if ($id_karyawan[0] !== null) {

            foreach ($id_karyawan as $row) {
                $data = [
                    'id_project' => $id_project,
                    'id_karyawan' => $row,
                ];

                $insert = $this->db->insert('anggota_project', $data);
                if ($insert) {
                    $i++;
                }
            }
        }

        $arr['success'] = true;
        $arr['notif']  = '<div class="alert alert-success">
          <i class="fa fa-check"></i> Data Berhasil Disimpan
        </div>';
        return $this->output->set_output(json_encode($arr));
    }


    function proses_tambah_anggota_baru()
    {
        $i = 0; // untuk loopingnya
        $id_project = $this->input->post('getIdProject');
        $id_karyawan = $this->input->post('id_karyawan');
        if ($id_karyawan[0] !== null) {
            foreach ($id_karyawan as $row) {
                $data = [
                    'id_project' => $id_project,
                    'id_karyawan' => $row,
                ];

                $insert = $this->db->insert('anggota_project', $data);
                if ($insert) {
                    $i++;
                }
            }
        }

        $arr['success'] = true;
        $arr['notif']  = '<div class="alert alert-success">
          <i class="fa fa-check"></i> Data Berhasil Disimpan
        </div>';
        return $this->output->set_output(json_encode($arr));
    }

    function tambah_task()
    {
        $id_project = $this->session->userdata('id_project');
        $data['anggota_project'] = $this->M_Project->tampil_anggota($id_project)->result();
        $this->load->view('v_add_task.php', $data);
    }

    function tambah_task_baru($id_project)
    {
        $data['id_project'] = $id_project;
        $data['anggota_project'] = $this->M_Project->tampil_anggota($id_project)->result();
        $this->load->view('v_add_task_baru.php', $data);
    }

    function proses_tambah_task()
    {
        $id_project = $this->session->userdata('id_project');
        $get_tanggal = $this->db->query("SELECT tanggal_mulai_project, batas_waktu_project FROM project WHERE id_project = '$id_project'")->row_array();

        $i = 0; // untuk loopingnya
        $tugas = $this->input->post('tugas');
        $anggota = $this->input->post('member');
        $batas_waktu = $this->input->post('date');
        if ($tugas[0] !== null) {

            if ($batas_waktu[$i] >= $get_tanggal['tanggal_mulai_project'] && $batas_waktu[$i] <= $get_tanggal['batas_waktu_project']) {
                foreach ($tugas as $row) {
                    $data = array(
                        'nama_tugas' => $row,
                        'id_anggota_project' => $anggota[$i],
                        'batas_waktu' => $batas_waktu[$i]
                    );

                    $insert = $this->db->insert('tugas_project', $data);
                    if ($insert) {
                        $i++;
                    }
                }

                $this->session->unset_userdata('id_project');
                $arr['success'] = true;
                $arr['notif']  = '<div class="alert alert-success">
                                    <i class="fa fa-check"></i> Data Berhasil Disimpan
                                    </div>';
                return $this->output->set_output(json_encode($arr));
            } else {
                $arr['success'] = false;
                return $this->output->set_output(json_encode($arr));
            }
        }
    }

    function proses_tambah_task_baru()
    {
        $id_project = $this->input->post('id_project');
        $get_tanggal = $this->db->query("SELECT tanggal_mulai_project, batas_waktu_project FROM project WHERE id_project = '$id_project'")->row_array();

        $i = 0; // untuk loopingnya
        $tugas = $this->input->post('tugas');
        $anggota = $this->input->post('member');
        $batas_waktu = $this->input->post('date');
        if ($tugas[0] !== null) {

            if ($batas_waktu[$i] >= $get_tanggal['tanggal_mulai_project'] && $batas_waktu[$i] <= $get_tanggal['batas_waktu_project']) {
                foreach ($tugas as $row) {
                    $data = array(
                        'nama_tugas' => $row,
                        'id_anggota_project' => $anggota[$i],
                        'batas_waktu' => $batas_waktu[$i]
                    );

                    $insert = $this->db->insert('tugas_project', $data);
                    if ($insert) {
                        $i++;
                    }
                }

                $this->session->unset_userdata('id_project');
                $arr['success'] = true;
                $arr['notif']  = '<div class="alert alert-success">
                                    <i class="fa fa-check"></i> Data Berhasil Disimpan
                                    </div>';
                return $this->output->set_output(json_encode($arr));
            } else {
                $arr['success'] = false;
                return $this->output->set_output(json_encode($arr));
            }
        }
    }

    function konfirmasi_project_selesai($id_project)
    {
        $id_perusahaan = $this->db->query("SELECT id_perusahaan FROM project WHERE id_project = '$id_project'")->row_array();
        $cekStatus = $this->db->query("SELECT status_project FROM project WHERE id_project = '$id_project'")->row_array();
        $totalTugas = $this->M_Project->total_tugas_project($id_project, $id_perusahaan['id_perusahaan'])->row_array();
        $totalSelesai = $this->M_Project->get_total_status_selesai($id_project, $id_perusahaan['id_perusahaan'])->row_array();

        if ($totalTugas['totalTugas'] == 0 && $totalSelesai['totalStatus'] == 0) {
            $this->session->set_flashdata('gagal', 'Belum ada tugas project pada project ini');
            redirect('ProjectManage/project_detail/' . $id_project);
        } else {
            if ($cekStatus['status_project'] == "SELESAI") {
                $this->session->set_flashdata('sukses', 'Project ini sudah di konfirmasi telah selesai');
                redirect('ProjectManage/project_detail/' . $id_project);
            } else {
                if ($totalTugas['totalTugas'] == $totalSelesai['totalStatus']) {
                    date_default_timezone_set("Asia/Jakarta");
                    $where = array('id_project' => $id_project);
                    $data = array(
                        'tanggal_selesai_project' => date('Y-m-d'), 'status_project' => 'SELESAI'
                    );

                    $this->M_Project->update_record($where, $data, 'project');

                    $this->session->set_flashdata('sukses', 'Berhasil konfirmasi status project telah selesai');
                    redirect('ProjectManage/project_detail/' . $id_project);
                } else {
                    $this->session->set_flashdata('gagal', 'Tidak berhasil melakukan konfirmasi project selesai. Masih ada tugas project yang belum selesai. Mohon diperhatikan kembali');
                    redirect('ProjectManage/project_detail/' . $id_project);
                }
            }
        }
    }

    function konfirmasi_project_tidakselesai($id_project)
    {
        date_default_timezone_set("Asia/Jakarta");
        $where = array('id_project' => $id_project);
        $data = array(
            'tanggal_berhenti_project' => date('Y-m-d'), 'status_project' => 'TIDAK SELESAI'
        );

        $tanggal = date('Y-m-d');
        $status = "DIBATALKAN";
        $keterangan = "BATAL";

        $this->M_Project->update_record($where, $data, 'project');
        $this->M_Project->update_status_tugas($tanggal, $status, $id_project, $keterangan);

        $this->session->set_flashdata('sukses', 'Berhasil status project diubah');
        redirect('ProjectManage/project_detail/' . $id_project);
    }

    function konfirmasi_project_dilanjutkan($id_project)
    {
        $where = array('id_project' => $id_project);
        $data = array(
            'status_project' => 'SEDANG BERJALAN'
        );
        $tanggal = date('Y-m-d');
        $status = "SEDANG BERJALAN";
        $keterangan = "LANJUT";

        $this->M_Project->update_record($where, $data, 'project');
        $this->M_Project->update_status_tugas($tanggal, $status, $id_project, $keterangan);

        $this->session->set_flashdata('sukses', 'Berhasil status project diubah');
        redirect('ProjectManage/project_detail/' . $id_project);
    }
}
