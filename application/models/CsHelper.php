<?php 
defined('BASEPATH') || exit('No direct script access allowed');
class CsHelper extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
      
    }

    function encrypt($text) {
        $options = ['cost' => 12];
        $ency = password_hash($text, PASSWORD_BCRYPT, $options);
        return $ency;
    }

    function decrypt($hash, $text) {
        if(password_verify($text, $hash)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkKey($table, $col, $data) {
        $check = $this->db->get_where($table, array($col => $data), 1)->result();
        if(count($check) == 0 ) {
            return true;
        } else {
            return false;
        }
        
    }

    public function flashMessage($status, $message) {
        if($status){
           return  $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-info-circle"></i></span>
        <span class="alert-text"><strong>Berhasil! </strong>'. $message .'</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        } else {
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-info-circle"></i></span>
        <span class="alert-text"><strong>Gagal! </strong>'. $message .'</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        }
    }

}
