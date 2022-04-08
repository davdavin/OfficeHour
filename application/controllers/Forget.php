<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forget extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Karyawan'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['token'] = $_REQUEST['key'];
        $token = $_REQUEST['key'];
        $data['karyawan'] = $this->db->query("SELECT id_karyawan, email_karyawan from karyawan WHERE token = '$token'")->row_array();
        $this->load->view('v_forget_karyawan', $data);
    }

    function ganti_pass(){
        $password = $this->input->post('password');
        $email_karyawan =$this->input->post('email' );
        $where = array('email_karyawan' => $email_karyawan);
        $data = array(
            'password_karyawan' => password_hash($password, PASSWORD_DEFAULT),
        );
        $this->M_Karyawan->update_record($where, $data, 'karyawan');

            $this->session->set_flashdata('sukses', 'Berhasil ubah password baru. Silahkan login');
            redirect('Login/login_karyawan');
    }
}
