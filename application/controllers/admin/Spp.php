<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
		$this->load->model('/admin/PetugasModel');
		
    }

    public function index(){
        $title = 'Daftar Spp';
		$listSpp =  $this->DataModel->getAllData('spp', 'id_spp', true);
		$data = [
			'content' => '/admin/v-spp',
			'title' => $title,
			'listSpp' => $listSpp
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahSpp(){
        $title = 'Tambah Spp';

		$data = [
			'content' => '/admin/v-tambahSpp',
			'title' => $title,
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahDataSpp(){
        $tahun = $this->input->post('tahun');
		$nominal = $this->input->post('nominal');
		$data = array(
			'tahun' => $tahun, 
			'nominal' => $nominal, 
		);
        if($this->DataModel->insertedData('spp',$data)) {
            $this->CsHelper->flashMessage(true, 'Berhasil menambahkan data spp');
        } else {
            $this->CsHelper->flashMessage(false, 'Gagal menambahkan data spp');
        }
        redirect('/admin/Spp/tambahSpp');   
    }

    public function editKelas($id) {
        $title = 'Edit Kelas';
        $listKelas = $this->DataModel->getOneDataWhere('kelas', 'id_kelas', $id);
		$data = [
			'content' => '/admin/v-editKelas',
			'title' => $title,
            'listKelas'=> $listKelas
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function editDataKelas() {
        $id = $this->input->post('idKelas');
        $namaKelas = $this->input->post('namaKelas');
		$kompetensiKeahlian = $this->input->post('kompetensiKeahlian');
		$data = array(
			'nama_kelas' => $namaKelas, 
			'kompetensi_keahlian' => $kompetensiKeahlian, 
		);

        if( $this->DataModel->updatedData('kelas','id_kelas', $id, $data)) {
            $this->CsHelper->flashMessage(true, 'Berhasil mengubah data kelas');
        } else {
            $this->CsHelper->flashMessage(false, 'Gagal mengubah data kelas');
        }
        redirect('/admin/Kelas/');
    }

    public function hapusKelas($id) {
        $title = 'Hapus Kelas ';
		$listKelas = $this->DataModel->getOneDataWhere('kelas', 'id_kelas', $id);
		$data = [
			'content' => '/content/delete',
			'title' => $title,
			'titleHead' => 'Hapus Kelas',
			'formAction' => '/admin/Kelas/hapusDataKelas/'.$listKelas[0]->id_kelas,
			'backAction' => '/admin/Petugas/',
			'dataDeleted' => $listKelas[0]->nama_kelas
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function hapusDataKelas($id) {
        if($this->DataModel->deletedData('kelas', 'id_kelas', $id)){
			$this->CsHelper->flashMessage(true, 'Berhasil meghapus data kelas');
		} else {
			$this->CsHelper->flashMessage(false, 'Gagal menghapus data kelas');
		}
		redirect('/admin/Kelas/');
    }


}