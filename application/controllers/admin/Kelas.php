<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
		$this->load->model('/admin/PetugasModel');
		
    }

    public function index(){
		$this->CsHelper->adminSession();

        $title = 'Daftar kelas';
		$listKelas =  $this->DataModel->getAllData('kelas', 'id_kelas', true);
		$data = [
			'content' => '/admin/v-kelas',
			'title' => $title,
			'listKelas' => $listKelas
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahKelas(){
		$this->CsHelper->adminSession();
        $title = 'Tambah Kelas';

		$data = [
			'content' => '/admin/v-tambahKelas',
			'title' => $title,
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahDataKelas(){
		$this->CsHelper->adminSession();
        $namaKelas = $this->input->post('namaKelas');
		$kompetensiKeahlian = $this->input->post('kompetensiKeahlian');
		$data = array(
			'nama_kelas' => $namaKelas, 
			'kompetensi_keahlian' => $kompetensiKeahlian, 
		);
        if($this->DataModel->insertedData('kelas',$data)) {
            $this->CsHelper->flashMessage(true, 'Berhasil menambahkan data kelas');
        } else {
            $this->CsHelper->flashMessage(false, 'Gagal menambahkan data kelas');
        }
        redirect('/admin/Kelas/tambahKelas');   
    }

    public function editKelas($id) {
		$this->CsHelper->adminSession();
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
		$this->CsHelper->adminSession();
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
		$this->CsHelper->adminSession();
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
		$this->CsHelper->adminSession();
        if($this->DataModel->deletedData('kelas', 'id_kelas', $id)){
			$this->CsHelper->flashMessage(true, 'Berhasil meghapus data kelas');
		} else {
			$this->CsHelper->flashMessage(false, 'Gagal menghapus data kelas');
		}
		redirect('/admin/Kelas/');
    }


}