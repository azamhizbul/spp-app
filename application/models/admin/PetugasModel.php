<?php 
defined('BASEPATH') || exit('No direct script access allowed');
class PetugasModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
      
    }

    public function getListPetugas(){
      return  $this->db->get('petugas')->result();
    }

    public function insertPetugas($data) {
       return $this->db->insert('petugas', $data);
    }
}

?>