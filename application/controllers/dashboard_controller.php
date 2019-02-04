<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_controller extends CI_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model("dashboard_model");
    if ($this->session->userdata('login') != 'yes') {
      redirect(base_url());
    }
  }

  function index() {
    // $data['selesai']    = $this->DashboardModel->ambilSPPDSelesai()->row()->jumlah;
    // $data['belumcair']  = $this->DashboardModel->ambilSPPDBelumCair()->row()->jumlah;
    // $data['sdmpusat']   = $this->DashboardModel->ambilSPPDSDMPusat()->row()->jumlah;
    // $data['sppd']       = $this->DashboardModel->ambilDataSPPD()->result();
    // $this->load->view('dashboard', $data);
    $this->load->view('dashboard');
  }

}
