<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TimeTracker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_karyawan') != "login") {
            redirect('Login/login_karyawan');
        }

        $this->load->model(array('M_Karyawan', 'M_TimeTracker'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['aktivitas'] = $this->M_TimeTracker->aktivitas_karyawan()->result();
        $data['tugas_project'] = $this->M_TimeTracker->tampil_semua_tugas()->result();
        $this->load->view('v_timetracker.php', $data);
    }

    function foto_ss()
    {
        //masih belum bisa

        $config['upload_path'] = './screenshoot';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000; //100 MB         

        $this->load->library('upload', $config);
        foreach ($_FILES['foto']['name'] as $filename) {
            echo $filename . '<br/>';
            /*    $file = pathinfo($filename, PATHINFO_EXTENSION);
            if ($file != 'gif' || $file != 'jpg' || $file != 'png') {
                $this->session->set_flashdata('gagal', 'Upload gagal');
                redirect('TimeTracker');
            } else {
                echo $filename . '<br/>';
            }*/
            $foto = $this->upload->data($filename);
            echo $foto;
            // if (!$this->upload->do_upload('foto[]')) {
            //     $this->session->set_flashdata('gagal', 'Upload gagal');
            //     redirect('Konten');
            // } else {
            //     foreach ($_FILES['foto']['name'] as $filename) {
            //         echo $filename.'<br/>';}

        }
    }

    function proses_input_aktivitas()
    {
        $id_project = $this->input->post('id_project');
        $id_tugas_project = $this->input->post('id_tugas_project');
        $tanggal_aktivitas = $this->input->post('tanggal_aktivitas');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $bukti = $this->input->post('bukti');
        $status = $this->input->post('status_tugas');

        $this->form_validation->set_rules('tanggal_aktivitas', 'Tanggal', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu', 'required');
        $this->form_validation->set_rules('waktu_selesai', 'Waktu', 'required');
        $this->form_validation->set_rules('bukti', 'Bukti', 'required');
        $this->form_validation->set_rules('status_tugas', 'Status', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');

        if ($this->form_validation->run() == FALSE) {
            $hasil = array(
                'sukses' => false,
                'error_tanggal' => form_error('tanggal_aktivitas'),
                'error_mulai' => form_error('waktu_mulai'),
                'error_selesai' => form_error('waktu_selesai'),
                'error_bukti' => form_error('bukti'),
                'erro_status' => form_error('status_tugas')
            );
            echo json_encode($hasil);
        } else {
            $data = array(
                'id_project' => $id_project, 'id_karyawan' => $this->session->userdata('id_karyawan'), 'id_tugas_project' => $id_tugas_project, 'tanggal_aktivitas' => $tanggal_aktivitas,
                'waktu_mulai' => $waktu_mulai, 'waktu_selesai' => $waktu_selesai, 'bukti' => $bukti
            );
            $this->M_TimeTracker->insert_record($data, 'aktivitas');
            $this->M_TimeTracker->update_record(['id_tugas_project' => $id_tugas_project], ['status_tugas' => $status], 'tugas_project');
            $hasil['sukses'] = "Berhasil upload aktivitas";
            echo json_encode($hasil);
        }
    }
}
