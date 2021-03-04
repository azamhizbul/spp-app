<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
		$this->load->model('/admin/PetugasModel');
		
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$title = 'Daftar Petugas / Pengguna';
		$listPetugas =  $this->DataModel->getAllData('petugas', 'id_petugas', true);
		$data = [
			'content' => '/admin/v-petugasHome',
			'title' => $title,
			'listPetugas' => $listPetugas
		];
		$this->load->view('/template/mainContent', $data);
	}

	public function addDataPetugas(){
		$title = 'Tambah user';
		$data = [
			'content' => '/admin/v-petugas',
			'title' => $title
		];
		$this->load->view('/template/mainContent', $data);
	}

	public function insertPetugas()
	{
		
		$userneme = $this->input->post('username');
		$password = $this->input->post('password');
		$name = $this->input->post('nama');
		$role = $this->input->post('role');
		$encrypted = $this->CsHelper->encrypt($password);
		$data = array(
			'username' => $userneme, 
			'password' => $encrypted, 
			'nama_petugas' => $name, 
			'level' => $role
		);
		$checkKey = $this->CsHelper->checkKey('petugas', 'username', $userneme);
		if($checkKey) {
			if($this->PetugasModel->insertPetugas($data)) {
				$this->CsHelper->flashMessage(true, 'Berhasil menambahkan data petugas');
			} else {
				$this->CsHelper->flashMessage(false, 'Gagal menambahkan data petugas');
			}
			redirect('/admin/Petugas/addDataPetugas');
		} else {
			$this->CsHelper->flashMessage(false, 'Username '.$userneme.' sudah ada');
			redirect('/admin/Petugas/addDataPetugas');
		}
		
	}

	public function updatePetugas($id) {
		$title = 'Edit Petugas / Pengguna';
		$listPetugas = $this->DataModel->getOneDataWhere('petugas', 'id_petugas', $id);
		$data = [
			'content' => '/admin/v-petugasEdit',
			'title' => $title,
			'listPetugas' => $listPetugas
		];
		$this->load->view('/template/mainContent', $data);
	}

	public function updateDataPetugas(){
		$userneme = $this->input->post('username');
		$name = $this->input->post('nama');
		$role = $this->input->post('role');
		$id = $this->input->post('idPetugas');
		$data = array(
			'username' => $userneme, 
			'nama_petugas' => $name, 
			'level' => $role
		);
		$checkKey = $this->CsHelper->checkKey('petugas', 'username', $userneme);
		if($checkKey) {
			if( $this->DataModel->updatedData('petugas','id_petugas', $id, $data)) {
				$this->CsHelper->flashMessage(true, 'Berhasil mengubah data petugas');
			} else {
				$this->CsHelper->flashMessage(false, 'Gagal mengubah data petugas');
			}
			redirect('/admin/Petugas/');
		} else {
			$this->CsHelper->flashMessage(false, 'Username '.$userneme.' sudah ada');
			redirect('/admin/Petugas/');
		}
	}

	public function deleteDataPetugas($id) {
		$title = 'Hapus Petugas / Pengguna';
		$listPetugas = $this->DataModel->getOneDataWhere('petugas', 'id_petugas', $id);
		$data = [
			'content' => '/content/delete',
			'title' => $title,
			'titleHead' => 'Hapus Pengguna',
			'formAction' => '/admin/Petugas/deletePengguna/'.$listPetugas[0]->id_petugas,
			'backAction' => '/admin/Petugas/',
			'dataDeleted' => $listPetugas[0]->username
		];
		$this->load->view('/template/mainContent', $data);
	}

	public function deletePengguna($id) {
		if($this->DataModel->deletedData('petugas', 'id_petugas', $id)){
			$this->CsHelper->flashMessage(true, 'Berhasil meghapus data petugas');
		} else {
			$this->CsHelper->flashMessage(false, 'Gagal menghapus data petugas');
		}
		redirect('/admin/Petugas/');
	}
}
