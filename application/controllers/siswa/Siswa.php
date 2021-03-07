<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
		$this->load->model('/admin/PembayaranModel');
		
    }

    public function index(){
        $this->CsHelper->siswaSession();
        $title = 'Daftar Pembayaran';
		$pembayaran =  $this->PembayaranModel->getListPembayaran();
		$data = [
			'content' => '/admin/v-pembayaran',
			'title' => $title,
			'pembayaran' => $pembayaran
		];
		$this->load->view('/template/mainContent', $data);
    }


}