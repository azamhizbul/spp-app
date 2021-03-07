<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
		$this->load->model('/admin/PembayaranModel');
		
    }

    public function index(){
        $this->CsHelper->petugasSession();
        $title = 'Daftar Pembayaran';
		$pembayaran =  $this->PembayaranModel->getListPembayaranByPetugas($this->session->userdata('id_petugas'));
		$data = [
			'content' => '/admin/v-pembayaran',
			'title' => $title,
			'pembayaran' => $pembayaran
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahPembayaran(){
        $this->CsHelper->petugasSession();
        $title = 'Tambah Pembayaran';
        $siswa = $this->DataModel->getAllData('siswa','nisn', false);
        $petugas = $this->DataModel->getAllData('petugas','id_petugas', true);
        $spp = $this->DataModel->getAllData('spp','id_spp', true);
		$data = [
			'content' => '/petugas/v-tambahPembayaran',
			'title' => $title,
            'cdnCss' => ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css'],
            'jsCdn' => ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'],
            'javascript' => ['datepicker'],
            'siswa' => $siswa,
            'petugas' => $petugas,
            'spp' => $spp
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahDataPembayaran(){
        $this->CsHelper->petugasSession();
        $idPetugas = $this->session->userdata('id_petugas');
        $nisn = $this->input->post('nisn');
        $tanggalBayar = $this->input->post('tanggalBayar');
        $bulanBayar = $this->input->post('bulanBayar');
        $tahunBayar = $this->input->post('tahunBayar');
        $spp = $this->input->post('spp');
        $jumlahBayar = $this->input->post('jumlahBayar');
		$data = array(
			'id_petugas' => $idPetugas, 
			'nisn' => $nisn,
            'tgl_bayar' => $tanggalBayar,
            'bulan_dibayar' => $bulanBayar,
            'tahun_dibayar' => $tahunBayar,
            'id_spp' => $spp,
            'jumlah_bayar' => $jumlahBayar
		);

        if($this->DataModel->insertedData('pembayaran',$data)) {
            $this->CsHelper->flashMessage(true, 'Berhasil menambahkan data pembayaran');
        } else {
            $this->CsHelper->flashMessage(false, 'Gagal menambahkan data pembayaran');
        }
        redirect('/petugas/Petugas');
            
    }

}