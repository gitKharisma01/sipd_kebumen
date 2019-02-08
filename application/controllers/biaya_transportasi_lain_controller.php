<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class biaya_transportasi_lain_controller extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		$this->load->model("biaya_transportasi_lain_model");
		if ($this->session->userdata('login') != 'yes') {
			redirect(base_url());
		}
	}

	function index(){
		$data['biaya_transportasi_lain']=$this->biaya_transportasi_lain_model->getAllBiayaTransportasiLain()->result();
		$data['golongan']=$this->biaya_transportasi_lain_model->getAllGolongan()->result();
		$data['transportasi']=$this->biaya_transportasi_lain_model->getAllTransportasi()->result();
		$this->load->view('biaya_transportasi_lain',$data);
	}

	function addDataBiayaTransportasiLain(){
		$idGolongan=$this->input->post('idGolongan');
		$idTransportasi=$this->input->post('idTransportasi');
		$kelas_transportasi=$this->input->post('kelas_transportasi');
		$idBiayaTransportasiLain=uniqid();
		$input = array(
			'idBiayaTransportasiLain'=>$idBiayaTransportasiLain,
			'idGolongan'=>$idGolongan,
			'idTransportasi'=>$idTransportasi,
			'kelas_transportasi'=>$kelas_transportasi
		);
		$this->biaya_transportasi_lain_model->addDataBiayaTransportasiLain($input);
		$this->session->set_flashdata('message', 'Data Sukses Ditambahkan');
		redirect(base_url('biaya_transportasi_lain/index'));
	}

	function updateDataBiayaTransportasiLain($idBiayaTransportasiLain){
		$idGolongan=$this->input->post('idGolongan');
		$idTransportasi=$this->input->post('idTransportasi');
		$kelas_transportasi=$this->input->post('kelas_transportasi');
		$input = array(
			'idGolongan'=>$idGolongan,
			'idLokasiTransportasi'=>$idTransportasi,
			'kelas_transportasi'=>$kelas_transportasi
		);
		$this->biaya_transportasi_lain_model->updateDataBiayaTransportasiLain($input,'idBiayaTransportasiLain', $idBiayaTransportasiLain);
		$this->session->set_flashdata('message', 'Data Sukses Dirubah');
		redirect(base_url('biaya_transportasi_lain/index'));
	}

	function removeDataBiayaTransportasiLain($idBiayaTransportasiLain){
		$this->biaya_transportasi_lain_model->removeDataBiayaTransportasiLain('idBiayaTransportasiLain', $idBiayaTransportasiLain);
		$this->session->set_flashdata('message', 'Data Sukses Dihabus');
		redirect(base_url('biaya_transportasi_lain/index'));
	}

	function ajaxDataBiayaTransportasiLain(){
		$nama_transportasi = '';
		$idBiayaTransportasiMobil = $this->input->post('id');
		$query = $this->db->select('transportasi.nama_transportasi')->from('biaya_transportasi_lain')->join('transportasi','transportasi.idTransportasi=biaya_transportasi_lain.idTransportasi')->where('idBiayaTransportasiLain = "'.$idBiayaTransportasiMobil.'"')->get()->row();
		if ($query == true ) {
			$nama_transportasi .= $query->nama_transportasi;
		}
		echo $nama_transportasi;
	}
}

?>