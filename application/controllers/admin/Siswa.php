<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
		$this->load->model('/admin/SiswaModel');
		
    }

    public function index(){
        $this->CsHelper->adminSession();
        $title = 'Daftar Spp';
		$siswa =  $this->SiswaModel->getListSiswa();
		$data = [
			'content' => '/admin/v-siswa',
			'title' => $title,
			'siswa' => $siswa
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahSiswa(){
        $this->CsHelper->adminSession();
        $title = 'Tambah Siswa';
        $kelas = $this->DataModel->getAllData('kelas','id_kelas', true);
        $spp = $this->DataModel->getAllData('spp','id_spp', true);
		$data = [
			'content' => '/admin/v-tambahSiswa',
			'title' => $title,
            'kelas' => $kelas,
            'spp' => $spp
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahDataSiswa(){
        $this->CsHelper->adminSession();
        $nisn = $this->input->post('nisn');
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kelas = $this->input->post('kelas');
        $noTelepon = $this->input->post('noTelepon');
        $spp = $this->input->post('spp');
		$data = array(
			'nisn' => $nisn, 
			'nis' => $nis,
            'nama' => $nama,
            'id_kelas' => $kelas,
            'alamat' => $alamat,
            'no_telp' => $noTelepon,
            'id_spp' => $spp,
		);
        $checkKeyNisn = $this->CsHelper->checkKey('siswa', 'nisn', $nisn);
        $checkKeyNis = $this->CsHelper->checkKey('siswa', 'nis', $nis);
        if($checkKeyNisn) {
            if($checkKeyNis) {
                if($this->DataModel->insertedData('siswa',$data)) {
                    $this->CsHelper->flashMessage(true, 'Berhasil menambahkan data siswa');
                } else {
                    $this->CsHelper->flashMessage(false, 'Gagal menambahkan data siswa');
                }
                redirect('/admin/Siswa/tambahSiswa');
            } else {
                $this->CsHelper->flashMessage(false, 'Data Nis '.$nis.' sudah ada');
                redirect('/admin/Siswa/tambahSiswa');  
            }    
        } else {
            $this->CsHelper->flashMessage(false, 'Data Nisn '.$nisn.' sudah ada');
            redirect('/admin/Siswa/tambahSiswa');   
        }
        
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