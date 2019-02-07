<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class biaya_harian_controller extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		$this->load->model("biaya_harian_model");
	}

	function index(){
		$data['biaya_harian']=$this->biaya_harian_model->getAllBiayaHarian()->result();
		$data['golongan']=$this->biaya_harian_model->getAllGolongan()->result();
		$this->load->view('biaya_harian',$data);
	}

	function addDataBiayaHarian(){
		$idGolongan=$this->input->post('idGolongan');
		$jarak_perjalanan=$this->input->post('jarak_perjalanan');
		$wilayah=$this->input->post('wilayah');
		$jenis_kegiatan=$this->input->post('jenis_kegiatan');
		$nominal_biaya_harian=$this->input->post('nominal_biaya_harian');
		$idBiayaHarian=uniqid();
		$input = array(
			'idBiayaHarian'=>$idBiayaHarian,
			'jarak_perjalanan'=>$jarak_perjalanan,
			'idGolongan'=>$idGolongan,
			'wilayah'=>$wilayah,
			'jenis_kegiatan'=>$jenis_kegiatan,
			'nominal_biaya_harian'=>$nominal_biaya_harian
		);
		$this->biaya_harian_model->addDataBiayaHarian($input);
		$this->session->set_flashdata('message', 'Data Sukses Ditambahkan');
		redirect(base_url('biaya_harian/index'));
	}

	function updateDataBiayaHarian($idBiayaHarian){
		$idGolongan=$this->input->post('idGolongan');
		$jarak_perjalanan=$this->input->post('jarak_perjalanan');
		$wilayah=$this->input->post('wilayah');
		$jenis_kegiatan=$this->input->post('jenis_kegiatan');
		$nominal_biaya_harian=$this->input->post('nominal_biaya_harian');
		$input = array(
			'idGolongan'=>$idGolongan,
			'jarak_perjalanan'=>$jarak_perjalanan,
			'wilayah'=>$wilayah,
			'jenis_kegiatan'=>$jenis_kegiatan,
			'nominal_biaya_harian'=>$nominal_biaya_harian
		);
		$this->biaya_harian_model->updateDataBiayaHarian($input,'idBiayaHarian', $idBiayaHarian);
		$this->session->set_flashdata('message', 'Data Sukses Dirubah');
		redirect(base_url('biaya_harian/index'));
	}

	function removeDataBiayaHarian($idBiayaHarian){
		$this->biaya_harian_model->removeDataBiayaHarian('idBiayaHarian', $idBiayaHarian);
		$this->session->set_flashdata('message', 'Data Sukses Dihabus');
		redirect(base_url('biaya_harian/index'));
	}

	function ajaxDataBiayaHarian(){
		$idGolongan = '';
		$idBiayaHarian = $this->input->post('id');
		$query = $this->db->select('biaya_harian.idGolongan')->from('biaya_harian')->where('idBiayaHarian = "'.$idBiayaHarian.'"')->get()->row();
		if ($query == true ) {
			$idGolongan .= $query->idGolongan;
		}
		echo $idGolongan;
	}
}

?>