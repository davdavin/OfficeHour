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
        $id_tugas_project = $this->input->post('tugas');

        $config['upload_path'] = './screenshoot';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000; //100 MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('gagal', 'Upload gagal');
            redirect('TimeTracker');
        } else {
            $foto = $this->upload->data('file_name');
            $data = array('id_karyawan' => $this->session->userdata('id_karyawan'), 'id_tugas_project' => $id_tugas_project, 'foto' => $foto);

            $this->M_TimeTracker->insert_record($data, 'foto_screenshoot');
            $this->session->set_flashdata('sukses', 'Foto berhasil diinput');
            redirect('TimeTracker');
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
        $time = new DateTime($waktu_mulai);
        $time2 = new DateTime($waktu_selesai);
        $interval = $time2->diff($time);
        $durasi = $interval->format('%H');
        $hari = date('D', strtotime($tanggal_aktivitas));


        /*
         $time = new DateTime($list_aktivitas->waktu_mulai);
                        $time2 = new DateTime($list_aktivitas->waktu_selesai);
                        $interval = $time2->diff($time);
                        $durasi = $interval->format('%H hours, %I minutes, %S seconds'); 
                        echo $durasi;
        */

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
                'error_status' => form_error('status_tugas')
            );
            echo json_encode($hasil);
        } else {
            if ($waktu_mulai >= $waktu_selesai) {
                $hasil['sukses'] = false;
                $hasil['error_selesai'] = "Waktu selesai harus diisi lebih dari waktu mulai";
                echo json_encode($hasil);
            } else {
                //melakukan cek aktivitas agar jam yang sama di tanggal yang sama tidak terinput dua kali
                $cekWaktuAktivitas = $this->db->query("SELECT * FROM aktivitas WHERE id_tugas_project = '$id_tugas_project' AND tanggal_aktivitas = '$tanggal_aktivitas' AND waktu_mulai = '$waktu_mulai' AND waktu_selesai = '$waktu_selesai'")->num_rows();
                if ($cekWaktuAktivitas == 1) {
                    $hasil['sukses'] = false;
                    $hasil['error_message'] = "Tidak bisa mengisi aktivitas pada waktu dan tanggal yang sama";
                    echo json_encode($hasil);
                } else {
                    if ($status == "SELESAI") {
                        $tanggal_selesai_tugas = date('Y-m-d');
                    } else {
                        $tanggal_selesai_tugas = NULL;
                    }
                    $data = array(
                        'id_project' => $id_project, 'id_karyawan' => $this->session->userdata('id_karyawan'), 'id_tugas_project' => $id_tugas_project, 'tanggal_aktivitas' => $tanggal_aktivitas,
                        'waktu_mulai' => $waktu_mulai, 'waktu_selesai' => $waktu_selesai, 'bukti' => $bukti, 'durasi' => $durasi, 'hari' => $hari
                    );
                    $this->M_TimeTracker->insert_record($data, 'aktivitas');
                    $this->M_TimeTracker->update_record(['id_tugas_project' => $id_tugas_project], ['status_tugas' => $status, 'tanggal_selesai_tugas' => $tanggal_selesai_tugas], 'tugas_project');
                    $hasil['sukses'] = "Berhasil upload aktivitas";
                    echo json_encode($hasil);
                }
            }
        }
    }
}
