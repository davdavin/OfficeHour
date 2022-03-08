<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_perusahaan') != "login") {
            redirect('Login/login_perusahaan');
        }

        $this->load->model(array('M_Perusahaan', 'M_Karyawan', 'M_Klien'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    public  function tampil_menu_utama()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
        $this->load->view('v_dashboard_perusahaan.php', $data);
    }

    public function lihat_karyawan($id_perusahaan)
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan($id_perusahaan)->result();
        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
        $this->load->view('v_lihat_daftar_karyawan.php', $data);
    }

    function proses_tambah_karyawan()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $email_karyawan = $this->input->post('email_karyawan');
        $posisi_karyawan = ucwords($this->input->post('posisi_karyawan'));
        $token = md5($_POST['email_karyawan']) . rand(10, 9999);

        $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
        $this->form_validation->set_rules('email_karyawan', 'Email', 'required|valid_email|is_unique[karyawan.email_karyawan]');
        $this->form_validation->set_rules('posisi_karyawan', 'Posisi', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus diisi email');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $hasil = array(
                'sukses' => false,
                'error_nama' => form_error('nama_karyawan'),
                'error_email' => form_error('email_karyawan'),
                'error_posisi' => form_error('posisi_karyawan'),
                'error_status' => form_error('status')
            );
            echo json_encode($hasil);
        } else {
            $data = array(
                'id_perusahaan' => $id_perusahaan, 'nama_karyawan' => $nama_karyawan, 'email_karyawan' => $email_karyawan,
                'posisi_karyawan' => $posisi_karyawan, 'status_karyawan' => 0, 'token' => $token
            );

            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'officehourcompany@gmail.com',      // Email gmail
                'smtp_pass'   => 'UpH12345',              // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);
            // Email dan nama pengirim
            $this->email->from('officehourcompany@gmail.com', 'OfficeHour.Company');
            // Email penerima
            $this->email->to($email_karyawan);
            // Subject
            $this->email->subject('Thank You for Your Feedback.');
            // Isi
            $link = "<a href='localhost/OfficeHour/Verifikasi/?key=" . $token . "'>Click and Verify Email</a>";
            $this->email->message("Dear \n" . $nama_karyawan . "\n You are receiving this because you have an OfficeHour account associated with this email address.

                Please click the link below to verify your account. \n" . $link);
            $this->email->send();

            $this->M_Karyawan->insert_record($data, 'karyawan');
            $hasil['sukses'] = "Behasil tambah karyawan";
            echo json_encode($hasil);

            /*    if ($this->email->send()) {
                       $this->load->library('email', $config);

                    // Email dan nama pengirim
                    $this->email->from('officehourcompany@gmail.com', 'OfficeHour.Company');

                    // Email penerima
                    $this->email->to($getEmail);

                    // Subject
                    $this->email->subject('Log in to your Office Hour Accont.');

                    // Isi
                 //   $this->email->message("Name: ".$getName.",\n Email: ".$getEmail.",\nFeedback: ".$getFeedback);

                    

                    echo 'Kirim';
            } else {
                echo 'Error! email tidak dapat dikirim.';
            } */
        }
    }

    public function proses_edit_karyawan()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $id_karyawan = $this->input->post('id_karyawan');
        $posisi_karyawan = $this->input->post('posisi_karyawan');
        $status_karyawan = $this->input->post('status_karyawan');

        $where = array('id_karyawan' => $id_karyawan);
        $data = array(
            'posisi_karyawan' => $posisi_karyawan, 'status_karyawan' => $status_karyawan
        );

        $this->M_Karyawan->update_record($where, $data, 'karyawan');
        $this->session->set_flashdata('sukses', 'Update data berhasil');
        redirect('Dashboard_Perusahaan/lihat_karyawan/' . $id_perusahaan);
    }

    public function hapus_karyawan($id_karyawan)
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $where = array('id_karyawan' => $id_karyawan);
        $this->M_Karyawan->delete_record($where, 'karyawan');
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('Dashboard_Perusahaan/lihat_karyawan/' . $id_perusahaan);
    }

    public function lihat_klien($id_perusahaan)
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['klien'] = $this->M_Perusahaan->lihat_klien($id_perusahaan)->result();
        $this->load->view('v_lihat_daftar_klien.php', $data);
    }

    public function tambah_klien()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $nama_klien = $this->input->post('nama_klien');
        $email_klien = $this->input->post('email_klien');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('nama_klien', 'Nama', 'required');
        $this->form_validation->set_rules('email_klien', 'Email', 'required|valid_email|is_unique[client.email_client]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} wajib diisi email');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_klien'),
                'error_email' => form_error('email_klien'),
                'error_password' => form_error('password')
            );
            echo json_encode($respon);
        } else {
            $data = array(
                'id_perusahaan' => $id_perusahaan, 'nama_client' => $nama_klien, 'password_client' => password_hash($password, PASSWORD_DEFAULT), 'email_client' => $email_klien
            );

            $this->M_Klien->insert_record($data, 'client');
            $respon['sukses'] = "Berhasil tambah klien";
            echo json_encode($respon);
        }
    }
}
