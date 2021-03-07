<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('CsHelper');
		$this->load->model('DataModel');
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
		$this->load->view('auth');
	}

	public function validation(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$resUser = $this->DataModel->getOneDataWhere('petugas', 'username', $username);
		if(empty($resUser)){
			$this->CsHelper->flashMessage(false, 'Username atau password salah');
			redirect('/Welcome');
			die;
		}
		$verify = $this->CsHelper->decrypt($resUser[0]->password, $pass);
		if($verify) {
			$level = $resUser[0]->level;
			$this->CsHelper->setSession($resUser);

			switch ($level) {
				case "admin":
					redirect('admin/Petugas');
				  break;
				case "petugas":
					redirect('petugas/Petugas');
				  break;
				case "siswa":
					redirect('siswa/Siswa');
				  break;
				default:
				redirect('Welcome');
			  }
			
		} else {
			$this->CsHelper->flashMessage(false, 'Username atau password salah');
			redirect('/Welcome');
		}
	}

	public function destroy(){
		$this->CsHelper->unsetSession();
		redirect('/Welcome');
		
	}
}
