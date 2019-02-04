<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class golongan_controller extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		$this->load->model("golongan_model");
	}

	function index(){
		$data['golongan']=$this->golongan_model->getAllGolongan()->result();
		$this->load->view('golongan',$data);
	}

	function addDataGolongan(){
		$nama_golongan=$this->input->post('nama_golongan');
		$idGolongan=uniqid();
		$input = array(
			'idGolongan'=>$idGolongan,
			'nama_golongan'=>$nama_golongan
			);
		$this->golongan_model->addDataGolongan($input);
		$this->session->set_flashdata('message', 'Data Sukses Ditambahkan');
		redirect(base_url('golongan/index'));
	}

	function updateDataGolongan($idGolongan){
		$nama_golongan = $this->input->post('nama_golongan');
		$input = array(
			'nama_golongan'=>$nama_golongan);
		$this->golongan_model->updateDataGolongan($input,'idGolongan', $idGolongan);
		$this->session->set_flashdata('message', 'Data Sukses Dirubah');
		redirect(base_url('golongan/index'));
	}

	function removeDataGolongan($idGolongan){
		$this->golongan_model->removeDataGolongan('idGolongan', $idGolongan);
		$this->session->set_flashdata('message', 'Data Sukses Dihabus');
		redirect(base_url('golongan/index'));
	}

	function ajaxDataGolongan(){
		$nama_golongan = '';
		$idGolongan = $this->input->post('id');
		$query = $this->db->select('golongan.nama_golongan')->from('golongan')->where('idGolongan = "'.$idGolongan.'"')->get()->row();
		if ($query == true ) {
			$nama_golongan .= $query->nama_golongan;
		}
		echo $nama_golongan;
	}
}

?>