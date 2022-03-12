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

    function tambah_project()
    {
        $id = $this->M_Perusahaan->get_id_perusahaan($this->session->userdata('id_karyawan'))->row_array();
        $id_perusahaan = $id['id_perusahaan'];
        $data['klien'] = $this->M_Perusahaan->lihat_klien($id_perusahaan)->result();
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

        $data = array(
            'id_perusahaan' => $id_perusahaan, 'id_client' => $id_klien, 'project_manager' => $project_manager, 'nama_project' => $project_name,
            'deskripsi_project' => $deskripsi, 'tanggal_mulai_project' => $project_start, 'tanggal_selesai_project' => $project_end, 'status_project' => 'SEDANG BERJALAN'
        );

        $this->M_Project->insert_record($data, 'project');

        $session = array('id_project' => $this->db->insert_id());
        $this->session->set_userdata($session);

        //   redirect('ProjectManage/asign_anggota_project/?id=' . $this->db->insert_id());
        redirect('ProjectManage/asign_anggota_project');
    }

    function asign_anggota_project()
    {
        $id = $this->M_Perusahaan->get_id_perusahaan($this->session->userdata('id_karyawan'))->row_array();
        $id_perusahaan = $id['id_perusahaan'];
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan($id_perusahaan)->result();
        $this->load->view('v_add_member.php', $data);
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

    function tambah_task()
    {
        $id_project = $this->session->userdata('id_project');
        $data['anggota_project'] = $this->M_Project->tampil_anggota($id_project)->result();
        $this->load->view('v_add_task.php', $data);
    }

    function proses_tambah_task()
    {
        $i = 0; // untuk loopingnya
        $tugas = $this->input->post('tugas');
        $anggota = $this->input->post('member');
        $batas_waktu = $this->input->post('date');
        if ($tugas[0] !== null) {
            foreach ($tugas as $row) {
                $data = array(
                    'nama_tugas' => $row,
                    'id_anggota_project' => $anggota[$i],
                    'batas_waktu' => $batas_waktu[$i],
                    'status_tugas' => 'SEDANG BERJALAN'
                );

                $insert = $this->db->insert('tugas_project', $data);
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
}
