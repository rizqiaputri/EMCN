<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanController extends CI_Controller {

	public function index()
	{
		$index['data'] = $this->BahanModel->getData();
        $index['nav']  = 'Bahan';
        $index['sub']  = 'Data Bahan';
        $index['content'] = 'bahan/bahan_view';   
		$this->load->view('Template', $index);
	}

	public function tambahData()
	{
		$index['nav'] = 'Bahan';
        $index['sub'] = 'Tambah Bahan';
        $index['content'] = 'bahan/tambah_view';   
		$this->load->view('Template', $index);
	}

	public function simpanData()
	{
		$config = array(
			array(
				'field'=>'nama_bahan',
				'label'=>'Nama Bahan',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong',
				)
				),
			array(
				'field'=>'satuan',
				'label'=>'Satuan Bahan',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong'
				)
				),
			array(
				'field'=>'jenis',
				'label'=>'Jenis Bahan',
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
			Data Bahan Gagal Disimpan
			</div>');
			redirect('BahanController/tambahData');
		}
		else{
            $nama  = $this->input->post('nama_bahan');
            $satuan  = $this->input->post('satuan');
            $jenis  = $this->input->post('jenis');
			$this->BahanModel->simpanData($nama, $satuan, $jenis);
			$this->session->set_flashdata('notif_text', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Sukses!</h4>
			Data Bahan Berhasil Disimpan
			</div>');
			redirect('BahanController/tambahData');
		}
	}

	public function getDataEdit()
	{
		$nomor = $this->uri->segment(3);
		$index['data'] = $this->BahanModel->getDataEdit($nomor);
		$index['nav']  = 'Bahan';
        $index['sub']  = 'Edit Bahan';
        $index['content'] = 'bahan/edit_view';   
		$this->load->view('Template', $index);
	}

	public function updateData()
	{
		$config = array(
			array(
				'field'=>'nama_bahan',
				'label'=>'Nama Bahan',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong',
				)
				),
			array(
				'field'=>'satuan',
				'label'=>'Satuan Bahan',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong'
				)
				),
			array(
				'field'=>'jenis',
				'label'=>'Jenis Bahan',
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
			Data Bahan Gagal Disimpan
			</div>');
		}
		else{
			$id  = $this->input->post('kode_bahan');
			$nama  = $this->input->post('nama_bahan');
            $satuan  = $this->input->post('satuan');
            $jenis  = $this->input->post('jenis');
			$this->BahanModel->updateData($id, $nama, $satuan, $jenis);
			redirect('BahanController');
		}
	}

	public function hapusData()
	{
		$nomor = $this->uri->segment(3);
		$this->BahanModel->hapusData($nomor);
		redirect('BahanController');
	}
}
