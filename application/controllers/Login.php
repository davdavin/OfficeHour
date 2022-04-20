<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Perusahaan', 'M_Karyawan', 'M_Klien'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('v_login.php');
    }

    function login_perusahaan()
    {
        $this->load->view('v_login_perusahaan.php');
    }

    function login_klien()
    {
        $this->load->view('v_login_klien.php');
    }

    function login_karyawan()
    {
        $this->load->view('v_login_karyawan.php');
    }

    function verifikasi_perusahaan()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $tanggal = date('Y-m-d');

        $cek_login = $this->M_Perusahaan->cek_login('perusahaan', ['username' => $username])->row_array();
        if ($cek_login) {

            //cek status
            if ($cek_login['status_perusahaan'] == 1) {
                //cek password
                if (password_verify($password, $cek_login['password'])) {
                    $session = array(
                        'id_perusahaan' => $cek_login['id_perusahaan'],
                        'username_perusahaan' => $cek_login['username'],
                        'status_login_perusahaan' => 'login',
                    );

                    $this->session->set_userdata($session);
                    redirect('Dashboard_Perusahaan/tampil_menu_utama');
                } else {
                    $this->session->set_flashdata('gagal', 'Password salah');
                    redirect('Login/login_perusahaan');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Akun belum aktif');
                redirect('Login/login_perusahaan');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Username salah');
            redirect('Login/login_perusahaan');
        }
    }

    function forgot_password()
    {
        $email = $this->input->post('email');


        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus diisi email');
        if ($this->form_validation->run() == FALSE) {
            $hasil = array(
                'sukses' => false,
                'error_email' => form_error('email')
            );
            echo json_encode($hasil);
        } else {
            $cekEmail = $this->db->query("SELECT email_karyawan FROM karyawan WHERE email_karyawan = '$email'")->row_array();
            if ($cekEmail) {
                $ambilToken = $this->db->query("SELECT token FROM karyawan WHERE email_karyawan = '$email'")->row_array();
                $token = $ambilToken['token'];
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
                $this->email->to($email);
                // Subject
                $this->email->subject('Sign Up Akun');
                // Isi
                $link = "<a href='localhost/OfficeHour/Forget/?key=" . $token . "'>Click and Verify Email</a>";
                $this->email->message("Halo ntuk melakukan pergantian password klik link berikut . \n" . $link);

                /*        $this->M_Karyawan->insert_record($data, 'karyawan');
            $hasil['sukses'] = "Behasil tambah karyawan";
            echo json_encode($hasil); */

                if ($this->email->send()) {
                    $hasil['sukses'] = "Email Terkirim";
                    echo json_encode($hasil);
                } else {
                    echo 'Error! email tidak dapat dikirim.';
                }
            } else {
                $hasil['sukses'] = false;
                $hasil['error_email'] = "Email salah";
                echo json_encode($hasil);
            }
        }
    }

    function forgot_password_perusahaan()
    {

        $email = $this->input->post('email');


        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus diisi email');
        if ($this->form_validation->run() == FALSE) {
            $hasil = array(
                'sukses' => false,
                'error_email' => form_error('email')
            );
            echo json_encode($hasil);
        } else {
            $cekEmail = $this->db->query("SELECT email_perusahaan FROM perusahaan WHERE email_perusahaan = '$email'")->row_array();
            if ($cekEmail) {
                $ambilToken = $this->db->query("SELECT token FROM perusahaan WHERE email_perusahaan = '$email'")->row_array();
                $token = $ambilToken['token'];
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
                $this->email->to($email);
                // Subject
                $this->email->subject('Sign Up Akun');
                // Isi
                $link = "<a href='localhost/OfficeHour/Forget_perusahaan/?key=" . $token . "'>Click and Verify Email</a>";
                $this->email->message("Halo ntuk melakukan pergantian password klik link berikut . \n" . $link);

                /*        $this->M_Karyawan->insert_record($data, 'karyawan');
            $hasil['sukses'] = "Behasil tambah karyawan";
            echo json_encode($hasil); */

                if ($this->email->send()) {
                    $hasil['sukses'] = "Email Terkirim";
                    echo json_encode($hasil);
                } else {
                    echo 'Error! email tidak dapat dikirim.';
                }
            } else {
                $hasil['sukses'] = false;
                $hasil['error_email'] = "Email salah";
                echo json_encode($hasil);
            }
        }
    }

    function forgot_password_client()
    {

        $email = $this->input->post('email');


        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus diisi email');
        if ($this->form_validation->run() == FALSE) {
            $hasil = array(
                'sukses' => false,
                'error_email' => form_error('email')
            );
            echo json_encode($hasil);
        } else {
            $cekEmail = $this->db->query("SELECT email_client FROM client WHERE email_client = '$email'")->row_array();
            if ($cekEmail) {
                $ambilToken = $this->db->query("SELECT token FROM client WHERE email_client = '$email'")->row_array();
                $token = $ambilToken['token'];
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
                $this->email->to($email);
                // Subject
                $this->email->subject('Sign Up Akun');
                // Isi
                $link = "<a href='localhost/OfficeHour/Forget_client/?key=" . $token . "'>Click and Verify Email</a>";
                $this->email->message("Halo ntuk melakukan pergantian password klik link berikut . \n" . $link);

                /*        $this->M_Karyawan->insert_record($data, 'karyawan');
            $hasil['sukses'] = "Behasil tambah karyawan";
            echo json_encode($hasil); */

                if ($this->email->send()) {
                    $hasil['sukses'] = "Email Terkirim";
                    echo json_encode($hasil);
                } else {
                    echo 'Error! email tidak dapat dikirim.';
                }
            } else {
                $hasil['sukses'] = false;
                $hasil['error_email'] = "Email salah";
                echo json_encode($hasil);
            }
        }
    }

    function verifikasi_karyawan()
    {
        $email_karyawan = $this->input->post('email');
        $password = $this->input->post('password');

        $cek_login_karyawan = $this->M_Karyawan->cek_login('karyawan', ['email_karyawan' => $email_karyawan])->row_array();

        if ($cek_login_karyawan) {
            if ($cek_login_karyawan['status_karyawan'] == 1) {
                if (password_verify($password, $cek_login_karyawan['password_karyawan'])) {
                    $session = array(
                        'id_karyawan' => $cek_login_karyawan['id_karyawan'],
                        'id_perusahaan' => $cek_login_karyawan['id_perusahaan'],
                        'nama_karyawan' => $cek_login_karyawan['nama_karyawan'],
                        'posisi_karyawan' => $cek_login_karyawan['posisi_karyawan'],
                        'status_login_karyawan' => 'login'
                    );

                    if ($cek_login_karyawan['posisi_karyawan'] == "Supervisor") {
                        $this->session->set_userdata($session);
                        redirect('Supervisor');
                    } else {
                        $this->session->set_userdata($session);
                        redirect('TimeTracker');
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'Password salah');
                    redirect('Login/login_karyawan');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Akun karyawan tidak aktif');
                redirect('Login/login_karyawan');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Email salah');
            redirect('Login/login_karyawan');
        }
    }

    function verifikasi_klien()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $cek_login = $this->M_Klien->cek_login('client', ['email_client' => $email])->row_array();

        if ($cek_login) {
            if ($cek_login['status_client'] == 1) {
                if (password_verify($password, $cek_login['password_client'])) {
                    $session = array(
                        'id_klien' => $cek_login['id_client'],
                        'nama_klien' => $cek_login['nama_client'],
                        'status_login_klien' => 'login'
                    );

                    $this->session->set_userdata($session);
                    redirect('Klien');
                } else {
                    $this->session->set_flashdata('gagal', 'Password salah');
                    redirect('Login/login_klien');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Akun anda belum aktif');
                redirect('Login/login_klien');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Email anda salah. Mohon untuk dicek kembali.');
            redirect('Login/login_klien');
        }
    }

    function logout_perusahaan()
    {
        $this->session->sess_destroy();
        redirect('Login/login_perusahaan');
    }

    function logout_klien()
    {
        $this->session->sess_destroy();
        redirect('Login/login_klien');
    }

    function logout_karyawan()
    {
        $this->session->sess_destroy();
        redirect('Login/login_karyawan');
    }
}
