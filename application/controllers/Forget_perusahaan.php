<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forget_perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Perusahaan'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['token'] = $_REQUEST['key'];
        $token = $_REQUEST['key'];
        $data['perusahaan'] = $this->db->query("SELECT id_perusahaan, email_perusahaan from perusahaan WHERE token = '$token'")->row_array();
        $this->load->view('v_forget_perusahaan', $data);
    }

    function ganti_pass_perusahaan()
    {
        $password = $this->input->post('password');
        $email_perusahaan =$this->input->post('email' );
        $where = array('email_perusahaan' => $email_perusahaan);
        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT),
        );
        $this->M_Perusahaan->update_record($where, $data, 'perusahaan');

            $this->session->set_flashdata('sukses', 'Berhasil ubah password baru. Silahkan login');
            redirect('Login/login_perusahaan');
    }
}