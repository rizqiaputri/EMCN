<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AkunController extends CI_Controller {

	public function index()
	{
		$index['data'] = $this->AkunModel->getData();
        $index['nav']  = 'Akun';
        $index['sub']  = 'Data Akun';
        $index['content'] = 'akun/akun_view';   
		$this->load->view('Template', $index);
	}

	public function tambahData()
	{
		$index['nav'] = 'Akun';
        $index['sub'] = 'Tambah Akun';
        $index['content'] = 'akun/tambah_view';   
		$this->load->view('Template', $index);
	}

	public function simpanData()
	{
		$config = array(
			array(
				'field'=>'kode_akun',
				'label'=>'Kode Akun',
				'rules'=>'required|numeric|is_unique[akun.no_akun]',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong',
					'numeric'=>'%s hanya berupa angka',
					'is_unique'=>"".$_POST['kode_akun']." sudah tersimpan"
				)
				),
			array(
				'field'=>'nama_akun',
				'label'=>'Nama Akun',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong'
				)
			)
		);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>','</li></div>');
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('notif_text', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
			Data Akun Gagal Disimpan
			</div>');
			redirect('AkunController/tambahData');
		}
		else{
			$nomor = $this->input->post('kode_akun');
			$nama  = $this->input->post('nama_akun');
			$header = substr($nomor, 0, 1);
			$this->AkunModel->simpanData($nomor, $nama, $header);
			$this->session->set_flashdata('notif_text', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Sukses!</h4>
			Data Akun Berhasil Disimpan
			</div>');
			redirect('AkunController/tambahData');
		}
	}

	public function getDataEdit()
	{
		$nomor = $this->uri->segment(3);
		$index['data'] = $this->AkunModel->getDataEdit($nomor);
		$index['nav']  = 'Akun';
        $index['sub']  = 'Edit Akun';
        $index['content'] = 'akun/edit_view';   
		$this->load->view('Template', $index);
	}

	public function updateData()
	{
		$config = array(
			array(
				'field'=>'kode_akun',
				'label'=>'Kode Akun',
				'rules'=>'required|numeric',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong',
					'numeric'=>'%s hanya berupa angka'
				)
				),
			array(
				'field'=>'nama_akun',
				'label'=>'Nama Akun',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong'
				)
			)
		);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>','</li></div>');
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('notif_text', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
			Data Akun Gagal Disimpan
			</div>');
		}
		else{
			$nomor = $this->input->post('kode_akun');
			$nama  = $this->input->post('nama_akun');
			$this->AkunModel->updateData($nomor, $nama);
			redirect('AkunController');
		}
	}

	public function hapusData()
	{
		$nomor = $this->uri->segment(3);
		$this->AkunModel->hapusData($nomor);
		redirect('AkunController');
	}
}
