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

        $this->load->model(array('M_Karyawan'));
    }

    function index()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        $data['projectKaryawan'] = $this->M_Karyawan->project_karyawan($id_karyawan)->result();
        $this->load->view('v_project_manage.php', $data);
    }

    function tambah_project()
    {
        $this->load->view('v_tambah_project.php');
    }

    function proses_tambah_project()
    {


        redirect('ProjectManage/asign_anggota_project' . '');
    }

    function asign_anggota_project()
    {
        $this->load->view('v_add_member.php');
    }

    function proses_tambah_anggota()
    {
        $i = 0; // untuk loopingnya
        $a = $this->input->post('first_name');
        $b = $this->input->post('last_name');
        if ($a[0] !== null) {
            foreach ($a as $row) {
                $data = [
                    'first_name' => $row,
                    'last_name' => $b[$i],
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
        $b = $this->input->post('last_name');
        if ($a[0] !== null) {
            foreach ($a as $row) {
                $data = [
                    'first_name' => $row,
                    'last_name' => $b[$i],
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
}
