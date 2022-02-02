<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LandingPage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Subscribe'));
    }

    function index()
    {
        $data['paket'] = $this->M_Subscribe->tampil_paket()->result();
        $this->load->view('v_landingpage.php', $data);
    }
}
