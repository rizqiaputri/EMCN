<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeuanganController extends CI_Controller {

	public function getKartu()
	{
		$pesanan = $this->uri->segment(3);
		$produk = $this->uri->segment(4);
		$index['produksi'] = $this->KeuanganModel->getDataProduksi($pesanan, $produk);
		$index['nav']  = 'Kartu Harga Pokok Pesanan';
        $index['sub']  = 'Kartu Harga Pokok Pesanan';
        $index['content'] = 'keuangan/kartupesanan_view';   
		$this->load->view('Template', $index);
	}

	public function kartuhppesananView()
	{
		$index['pesanan'] = $this->KeuanganModel->getPesanan();
		$index['nav']  = 'Harga Pokok Pesanan';
        $index['sub']  = 'Laporan Harga Pokok Pesanan';
        $index['content'] = 'keuangan/hppesanan_view';   
		$this->load->view('Template', $index);
	}

	public function hpproduksiPer()
	{
		$periode = $this->input->get('periode');
		// $bulan   = date('m', strtotime($periode));
		$tahun   = date('Y', strtotime($periode));
		$index['beli']  = $this->KeuanganModel->getPembelian($tahun);
		$index['btkl']  = $this->KeuanganModel->getBTKL($tahun);
		$index['bop']  = $this->KeuanganModel->getBOP($tahun);
		$index['nav']  = 'Harga Pokok Produksi';
        $index['sub']  = 'Laporan Harga Pokok Produksi';
        $index['content'] = 'keuangan/hpproduksi_view';   
		$this->load->view('Template', $index);
	}

	public function hpproduksiView()
	{
		$index['nav']  = 'Harga Pokok Produksi';
        $index['sub']  = 'Harga Pokok Produksi';
        $index['content'] = 'keuangan/hpproduksi_view';   
		$this->load->view('Template', $index);
	}
	
	public function bukbesPer()
	{
		$akun = $this->input->get('akun');
		$periode = $this->input->get('periode');
		$bulan   = date('m', strtotime($periode));
		$tahun   = date('Y', strtotime($periode));
		$index['akun'] = $this->KeuanganModel->getAkun();
		$index['nav']  = 'Buku Besar';
        $index['sub']  = 'Buku Besar';
		$index['saldo'] = $this->KeuanganModel->getSaldo($akun, $bulan, $tahun);
		$index['buku']  = $this->KeuanganModel->getBukuBesar($akun, $bulan, $tahun);
		$index['akun'] = $this->KeuanganModel->getAkun();
		$index['nav']  = 'Buku Besar';
        $index['sub']  = 'Buku Besar';
        $index['content'] = 'keuangan/bukbes_view';   
		$this->load->view('Template', $index);
	}

	public function bukbesView()
	{
		$index['akun'] = $this->KeuanganModel->getAkun();
		$index['nav']  = 'Buku Besar';
        $index['sub']  = 'Buku Besar';
        $index['content'] = 'keuangan/bukbes_view';   
		$this->load->view('Template', $index);
	}
	
	public function jurnalView()
	{
		$index['jurnal'] = $this->KeuanganModel->getJurnal();
		$index['nav']  = 'Jurnal Umum';
        $index['sub']  = 'Jurnal';
        $index['content'] = 'keuangan/jurnal_view';   
		$this->load->view('Template', $index);
	}

	public function jurnalPer()
	{
		$periode = $this->input->get('periode');
		$index['periode'] = $this->input->get('periode');
		$index['jurnal'] = $this->KeuanganModel->getJurnalPer($periode);
		$index['nav']  = 'Jurnal Umum';
        $index['sub']  = 'Jurnal';
        $index['content'] = 'keuangan/jurnal_view';   
		$this->load->view('Template', $index);
	}
}
