<?php 
defined('BASEPATH') || exit('No direct script access allowed');
class SiswaModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
      
    }

    public function getListSiswa(){
        $this->db->select('s.nisn, s.nis, s.nama, s.alamat, s.no_telp, k.id_kelas, k.nama_kelas as namaKelas, sp.id_spp, sp.tahun as tahunSpp');
        $this->db->from('siswa as s');
        $this->db->join('kelas as k', 'k.id_kelas = s.id_kelas');
        $this->db->join('spp as sp', 'sp.id_spp = s.id_spp');
        $query = $this->db->get()->result();
        return $query;
    }

}

?>