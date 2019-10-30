<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukController extends CI_Controller {

	public function index()
	{
		$index['data'] = $this->ProdukModel->getData();
        $index['nav']  = 'Produk';
        $index['sub']  = 'Data Produk';
        $index['content'] = 'produk/produk_view';   
		$this->load->view('Template', $index);
	}

	public function tambahData()
	{
		$index['nav'] = 'Produk';
        $index['sub'] = 'Tambah Produk';
        $index['content'] = 'produk/tambah_view';   
		$this->load->view('Template', $index);
	}

	public function simpanData()
	{
		$config = array(
			array(
				'field'=>'nama_produk',
				'label'=>'Nama Produk',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong',
				)
				),
			array(
				'field'=>'ukuran',
				'label'=>'Ukuran Produk',
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
			Data Produk Gagal Disimpan
			</div>');
			redirect('ProdukController/tambahData');
		}
		else{
            $nama   = $this->input->post('nama_produk');
            $ukuran  = $this->input->post('ukuran');
			$this->ProdukModel->simpanData($nama, $ukuran);
			$this->session->set_flashdata('notif_text', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Sukses!</h4>
			Data Produk Berhasil Disimpan
			</div>');
			redirect('ProdukController/tambahData');
		}
	}

	public function getDataEdit()
	{
		$nomor = $this->uri->segment(3);
		$index['data'] = $this->ProdukModel->getDataEdit($nomor);
		$index['nav']  = 'Produk';
        $index['sub']  = 'Edit Produk';
        $index['content'] = 'produk/edit_view';   
		$this->load->view('Template', $index);
	}

	public function updateData()
	{
		$config = array(
			array(
				'field'=>'nama_produk',
				'label'=>'Nama Produk',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'%s tidak boleh kosong',
				)
				),
			array(
				'field'=>'ukuran',
				'label'=>'Ukuran Produk',
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
			Data Produk Gagal Disimpan
			</div>');
		}
		else{
			$id     = $this->input->post('kode_produk');	
			$nama   = $this->input->post('nama_produk');
            $ukuran  = $this->input->post('ukuran');
			$this->ProdukModel->updateData($id, $nama, $ukuran);
			redirect('ProdukController');
		}
	}

	public function hapusData()
	{
		$nomor = $this->uri->segment(3);
		$this->ProdukModel->hapusData($nomor);
		redirect('ProdukController');
	}
}
