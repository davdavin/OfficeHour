<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forget_client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Klien'));
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['token'] = $_REQUEST['key'];
        $token = $_REQUEST['key'];
        $data['client'] = $this->db->query("SELECT id_client, email_client from client WHERE token = '$token'")->row_array();
        $this->load->view('v_forget_client', $data);
    }

    function ganti_pass_client()
    {
        $password = $this->input->post('password');
        $email_client =$this->input->post('email' );
        $where = array('email_client' => $email_client);
        $data = array(
            'password_client' => password_hash($password, PASSWORD_DEFAULT),
        );
        $this->M_Klien->update_record($where, $data, 'client');

            $this->session->set_flashdata('sukses', 'Berhasil ubah password baru. Silahkan login');
            redirect('Login/login_klien');
    }
}