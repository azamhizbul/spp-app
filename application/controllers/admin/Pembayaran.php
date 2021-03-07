<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
		$this->load->model('/admin/PembayaranModel');
		
    }

    public function index(){
        $this->CsHelper->adminSession();
        $title = 'Daftar Pembayaran';
		$pembayaran =  $this->PembayaranModel->getListPembayaran();
		$data = [
			'content' => '/admin/v-pembayaran',
			'title' => $title,
			'pembayaran' => $pembayaran
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahPembayaran(){
        $this->CsHelper->adminSession();
        $title = 'Tambah Pembayaran';
        $siswa = $this->DataModel->getAllData('siswa','nisn', false);
        $petugas = $this->DataModel->getAllData('petugas','id_petugas', true);
        $spp = $this->DataModel->getAllData('spp','id_spp', true);
		$data = [
			'content' => '/admin/v-tambahPembayaran',
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
        $this->CsHelper->adminSession();
        $idPetugas = $this->input->post('idPetugas');
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
        redirect('/admin/Pembayaran/tambahPembayaran');
            
    }

    public function editSiswa($id) {
        $this->CsHelper->adminSession();
        $title = 'Edit Siswa';
        $listSiswa = $this->DataModel->getOneDataWhere('siswa', 'nisn', $id);
        $kelas = $this->DataModel->getAllData('kelas','id_kelas', true);
        $spp = $this->DataModel->getAllData('spp','id_spp', true);
		$data = [
			'content' => '/admin/v-siswaEdit',
			'title' => $title,
            'listSiswa'=> $listSiswa,
            'kelas' => $kelas,
            'spp' => $spp
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function editDataSiswa() {
        $this->CsHelper->adminSession();
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kelas = $this->input->post('kelas');
        $noTelepon = $this->input->post('noTelepon');
        $spp = $this->input->post('spp');
		$data = array(
            'nama' => $nama,
            'id_kelas' => $kelas,
            'alamat' => $alamat,
            'no_telp' => $noTelepon,
            'id_spp' => $spp,
		);

        if( $this->DataModel->updatedData('siswa','nisn', $nisn, $data)) {
            $this->CsHelper->flashMessage(true, 'Berhasil mengubah data siswa');
        } else {
            $this->CsHelper->flashMessage(false, 'Gagal mengubah data siswa');
        }
        redirect('/admin/Siswa/');
    }

    public function hapusSiswa($id) {
        $this->CsHelper->adminSession();
        $title = 'Hapus Siswa ';
		$listSiswa = $this->DataModel->getOneDataWhere('siswa', 'nisn', $id);
		$data = [
			'content' => '/content/delete',
			'title' => $title,
			'titleHead' => 'Hapus Siswa',
			'formAction' => '/admin/Siswa/hapusDataSiswa/'.$listSiswa[0]->nisn,
			'backAction' => '/admin/Siswa/',
			'dataDeleted' => $listSiswa[0]->nisn
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function hapusDataSiswa($id) {
        $this->CsHelper->adminSession();
        if($this->DataModel->deletedData('siswa', 'nisn', $id)){
			$this->CsHelper->flashMessage(true, 'Berhasil meghapus data siswa');
		} else {
			$this->CsHelper->flashMessage(false, 'Gagal menghapus data siswa');
		}
		redirect('/admin/Siswa/');
    }


}