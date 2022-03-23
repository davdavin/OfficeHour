<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Untuk upload excel
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
require_once('./vendor/autoload.php');
//------

class Dashboard_Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_login_perusahaan') != "login") {
            redirect('Login/login_perusahaan');
        }

        $this->load->model(array('M_Perusahaan', 'M_Karyawan', 'M_Klien', 'M_Project'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    public  function tampil_menu_utama()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
        $data['total_klien'] = $this->M_Perusahaan->lihat_klien($id_perusahaan)->num_rows();
        $data['list_project'] = $this->M_Project->tampil_project($id_perusahaan)->result();
        $data['list_anggota_project'] = $this->M_Project->tampil_anggota_project($id_perusahaan)->result();
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

    public function lihat_karyawan_gagal($id_perusahaan)
    {
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['karyawan'] = $this->M_Perusahaan->lihat_karyawan_gagal($id_perusahaan)->result();
        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
        $this->load->view('v_gagal_kirim.php', $data);
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
            $this->email->subject('Sign Up Akun');
            // Isi
            $link = "<a href='localhost/OfficeHour/Verifikasi/?key=" . $token . "'>Click and Verify Email</a>";
            $this->email->message("Halo \n" . $nama_karyawan . "\n Anda menerima surel ini dikarenakan anda sudah terdaftar sebagai karyawan di dalam OfficeHour.

            Untuk melakukan aktivasi akun mohon untuk klik link berikut ini. \n" . $link);

            /*        $this->M_Karyawan->insert_record($data, 'karyawan');
            $hasil['sukses'] = "Behasil tambah karyawan";
            echo json_encode($hasil); */

            if ($this->email->send()) {
                $this->M_Karyawan->insert_record($data, 'karyawan');
                $hasil['sukses'] = "Behasil tambah karyawan";
                echo json_encode($hasil);
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }

    function Upload_Massal()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $username = $this->session->userdata('username_perusahaan');
        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
        $this->load->view('v_mass_upload.php', $data);
    }

    public function proses_upload_massal()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');

        $db = new DataSource();
        $conn = $db->getConnection();

        $allowedFileType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];

        if (in_array($_FILES["file"]["type"], $allowedFileType)) {

            $targetPath = 'uploads/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadSheet = $Reader->load($targetPath);
            $excelSheet = $spreadSheet->getActiveSheet();
            $spreadSheetAry = $excelSheet->toArray();
            $sheetCount = count($spreadSheetAry);

            for ($i = 0; $i <= $sheetCount; $i++) {
                $name = "";
                if (isset($spreadSheetAry[$i][0])) {
                    $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                }
                $description = "";
                if (isset($spreadSheetAry[$i][1])) {
                    $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                }
                $posisi = "";
                if (isset($spreadSheetAry[$i][2])) {
                    $posisi = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
                }

                $token = md5($description) . rand(10, 9999);

                $cekEmail = $this->db->query("SELECT email_karyawan FROM karyawan WHERE email_karyawan = '$description'")->row_array();
                // $isi = 1;
                if (!empty($name) || !empty($description) || !empty($posisi)) {
                    if ($description == $cekEmail['email_karyawan']) {
                        $query = "insert into karyawan(nama_karyawan,email_karyawan,posisi_karyawan,id_perusahaan,token,terkirim) values(?,?,?,?,?,?)";
                        $paramType = "ssssss";
                        $paramArray = array(
                            $name,
                            $description,
                            $posisi,
                            $id_perusahaan,
                            $token,
                            0

                        );
                        $insertId = $db->insert($query, $paramType, $paramArray);
                        // redirect('Dashboard_Perusahaan/Upload_Massal');

                        //   return $this->output->set_output($data['hasil']);

                        /*         $id_perusahaan = $this->session->userdata('id_perusahaan');
                        $username = $this->session->userdata('username_perusahaan');
                        $data['info_perusahaan'] = $this->M_Perusahaan->informasi_perusahaan($username)->result();
                        $data['total_karyawan'] = $this->M_Perusahaan->jumlah_karyawan($id_perusahaan)->result();
                        $this->load->view('v_mass_upload.php', $data);
*/
                        //                $data['hasil'] = json_encode($variabel);
                        // redirect('Dashboard_Perusahaan/Upload_Massal');

                        //   echo $description . ' email ini sudah digunakan' . '<br>';
                        // redirect('Dashboard_Perusahaan/lihat_karyawan_gagal/' . $this->session->userdata('id_perusahaan'));
                    } else {
                        $query = "insert into karyawan(nama_karyawan,email_karyawan,posisi_karyawan,id_perusahaan,token,terkirim) values(?,?,?,?,?,?)";
                        $paramType = "ssssss";
                        $paramArray = array(
                            $name,
                            $description,
                            $posisi,
                            $id_perusahaan,
                            $token,
                            1
                        );
                        $insertId = $db->insert($query, $paramType, $paramArray);
                        // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                        // $result = mysqli_query($conn, $query);

                        //mail
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
                        $this->email->to($description);
                        // Subject
                        $this->email->subject('Thank You for Your Feedback.');
                        // Isi
                        $link = "<a href='localhost/OfficeHour/Verifikasi/?key=" . $token . "'>Click and Verify Email</a>";
                        $this->email->message("Halo \n" . $name . "\n Anda menerima surel ini dikarenakan anda sudah terdaftar sebagai karyawan di dalam OfficeHour.

                        Untuk melakukan aktivasi akun mohon untuk klik link berikut ini \n" . $link);

                        if (!empty($insertId)) {
                            $type = "success";
                            $message = "Berhasil Upload";
                            // echo $message;
                            // $this->session->set_flashdata('sukses', 'Berhasil input karyawan');
                            // redirect('Dashboard_Perusahaan/Upload_Massal');
                            // redirect('Dashboard_Perusahaan/lihat_karyawan_gagal/' . $this->session->userdata('id_perusahaan'));
                        } else {
                            $type = "error";
                            $message = "Tidak Berhasil Upload";
                            $this->session->set_flashdata('gagal', 'Tidak berhasil input karyawan');
                            // echo $message;
                            redirect('Dashboard_Perusahaan/Upload_Massal');
                        }
                    }
                }
            }
        } else {
            $type = "error";
            $message = "Tipe tidak sesuai. Upload file excel";
            echo $message;
        }
        redirect('Dashboard_Perusahaan/lihat_karyawan_gagal/' . $this->session->userdata('id_perusahaan'));
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

    public function hapus_karyawan_gagal($id_karyawan)
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $where = array('id_karyawan' => $id_karyawan);
        $this->M_Karyawan->delete_record($where, 'karyawan');
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('Dashboard_Perusahaan/lihat_karyawan_gagal/' . $id_perusahaan);
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
        $token = md5($email_klien) . rand(10, 9999);


        $this->form_validation->set_rules('nama_klien', 'Nama', 'required');
        $this->form_validation->set_rules('email_klien', 'Email', 'required|valid_email|is_unique[client.email_client]');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} wajib diisi email');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_klien'),
                'error_email' => form_error('email_klien')
            );
            echo json_encode($respon);
        } else {
            $data = array(
                'id_perusahaan' => $id_perusahaan, 'nama_client' => $nama_klien, 'email_client' => $email_klien, 'token' => $token
            );

            $nama_perusahaan = $this->db->query("SELECT nama_perusahaan FROM perusahaan WHERE id_perusahaan = '$id_perusahaan'")->row_array();

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
            $this->email->to($email_klien);
            // Subject
            $this->email->subject('Sign Up Akun');
            // Isi
            $link = "<a href='localhost/OfficeHour/Verifikasi/klien/?key=" . $token . "'>Verifikasi Email</a>";
            $this->email->message("Halo \n" . $nama_klien . "\n Anda menerima email ini dikarenakan anda sudah terdaftar sebagai klien dari perusahaan " . $nama_perusahaan['nama_perusahaan'] .
                " Untuk melakukan aktivasi akun mohon untuk klik link berikut ini. \n" . $link);

            if ($this->email->send()) {
                $this->M_Klien->insert_record($data, 'client');
                $respon['sukses'] = "Berhasil tambah klien";
                echo json_encode($respon);
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
        }
    }
}
