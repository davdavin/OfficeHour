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

        $this->load->model(array('M_Karyawan', 'M_Perusahaan'));
        $this->load->helper('form', 'url');
    }

    function index()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
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


        redirect('ProjectManage/asign_anggota_project' . '');
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
        $a = $this->input->post('id_karyawan');
        if ($a[0] !== null) {
            foreach ($a as $row) {
                $data = [
                    'first_name' => $row,
                ];

                $insert = $this->db->insert('biodata', $data);
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
        $this->load->view('v_add_task.php');
    }

    function proses_tambah_task()
    {
        $i = 0; // untuk loopingnya
        $a = $this->input->post('first_name');
        $b = $this->input->post('member');
        $c = $this->input->post('date');
        if ($a[0] !== null) {
            foreach ($a as $row) {

                $data = array(

                    'nama_tugas' => $row,
                    'id_anggota_project' => $b[$i],
                    'batas_waktu' => $c[$i],
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
