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
		$this->CsHelper->adminSession();
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
		$this->CsHelper->adminSession();
        $title = 'Tambah Spp';

		$data = [
			'content' => '/admin/v-tambahSpp',
			'title' => $title,
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function tambahDataSpp(){
		$this->CsHelper->adminSession();
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

    public function editSpp($id) {
		$this->CsHelper->adminSession();
        $title = 'Edit Spp';
        $listSpp = $this->DataModel->getOneDataWhere('spp', 'id_spp', $id);
		$data = [
			'content' => '/admin/v-sppEdit',
			'title' => $title,
            'listSpp'=> $listSpp
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function editDataSpp() {
		$this->CsHelper->adminSession();
        $id = $this->input->post('idSpp');
        $tahun = $this->input->post('tahun');
		$nominal = $this->input->post('nominal');
		$data = array(
			'tahun' => $tahun, 
			'nominal' => $nominal, 
		);

        if( $this->DataModel->updatedData('spp','id_spp', $id, $data)) {
            $this->CsHelper->flashMessage(true, 'Berhasil mengubah data spp');
        } else {
            $this->CsHelper->flashMessage(false, 'Gagal mengubah data spp');
        }
        redirect('/admin/Spp/');
    }

    public function hapusSpp($id) {
		$this->CsHelper->adminSession();
        $title = 'Hapus Spp ';
		$listSpp = $this->DataModel->getOneDataWhere('spp', 'id_spp', $id);
		$data = [
			'content' => '/content/delete',
			'title' => $title,
			'titleHead' => 'Hapus Spp',
			'formAction' => '/admin/Spp/hapusDataSpp/'.$listSpp[0]->id_spp,
			'backAction' => '/admin/Petugas/',
			'dataDeleted' => $listSpp[0]->tahun
		];
		$this->load->view('/template/mainContent', $data);
    }

    public function hapusDataSpp($id) {
		$this->CsHelper->adminSession();
        if($this->DataModel->deletedData('spp', 'id_spp', $id)){
			$this->CsHelper->flashMessage(true, 'Berhasil meghapus data spp');
		} else {
			$this->CsHelper->flashMessage(false, 'Gagal menghapus data spp');
		}
		redirect('/admin/Spp/');
    }


}