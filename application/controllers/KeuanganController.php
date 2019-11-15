<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeuanganController extends CI_Controller {

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
