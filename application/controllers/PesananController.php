<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesananController extends CI_Controller {

    public function getDetail()
    {
        $kd = $this->uri->segment(3);
		$index['data'] = $this->PesananModel->getDetail($kd);
		$index['nav']  = 'Pesanan';
        $index['sub']  = 'Detail Pesanan';
        $index['content'] = 'pesanan/detail_view';   
		$this->load->view('Template', $index);
    }

    public function lihatPesanan()
    {
        $index['pesanan'] = $this->PesananModel->getData();
        $index['nav']  = 'Pesanan';
        $index['sub']  = 'Lihat Pesanan';
        $index['content'] = 'pesanan/lihat_view';   
		$this->load->view('Template', $index);   
    }

    public function simpanPesanan()
    {
        if(!empty($this->cart->contents()))
        {
            $nama = $this->input->post('nama');
            $selesai = $this->input->post('selesai');

            $pesanan = $this->PesananModel->simpanPesanan($nama,$selesai);
            if($pesanan)
            {
                $this->cart->destroy();
                $this->session->set_flashdata('error_text', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                Pesanan berhasil disimpan!
                </div>');
                redirect('PesananController/index');
            } else{
                $this->session->set_flashdata('error_text', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
                Tidak dapat menyimpan pesanan!
                </div>');
                redirect('PesananController/index');
            }
        }else{
            $this->session->set_flashdata('error_text', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
			Tidak dapat menyimpan pesanan!
			</div>');
            redirect('PesananController/index');
        }
    }

	public function index()
	{
		$index['pakaian'] = $this->ProdukModel->getData();
        $index['nav']  = 'Pesanan';
        $index['sub']  = 'Tambah Pesanan';
        $index['content'] = 'pesanan/tambah_view';   
		$this->load->view('Template', $index);
    }

    public function tambahPesanan()
    {
        $pakaian = $this->input->post('produk');
        $jumlah  = $this->input->post('jumlah');
        $harga   = $this->input->post('harga');

        $data = array('id'=>$pakaian,
                      'name'=>"none",
                      'qty'=>$jumlah,
                      'price'=>$harga
                    );
        $this->cart->insert($data);
        redirect('PesananController/index');
    }

    public function hapus()
	{
		$data = array('rowid'=>$this->uri->segment(3),
					   'qty'=>0);
		$this->cart->update($data);
        redirect('PesananController/index');
  }
    
}
