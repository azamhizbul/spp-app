<?php 
defined('BASEPATH') || exit('No direct script access allowed');
class PembayaranModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
      
    }

    public function getListPembayaran(){
        // $this->db->select('p.id_pembayaran, p.id_petugas, p.tgl_bayar, p.bulan_bayar, p.tahun_bayar, s.nisn, s.nama, sp.id_spp, sp.tahun, sp.nominal');
        $this->db->select('*');
        $this->db->from('pembayaran as p');
        $this->db->join('petugas as pe', 'pe.id_petugas = p.id_petugas');
        $this->db->join('siswa as s', 's.nisn = p.nisn');
        $this->db->join('spp as sp', 'sp.id_spp = p.id_spp');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getListPembayaranByPetugas($id_petugas){
        // $this->db->select('p.id_pembayaran, p.id_petugas, p.tgl_bayar, p.bulan_bayar, p.tahun_bayar, s.nisn, s.nama, sp.id_spp, sp.tahun, sp.nominal');
        $this->db->select('*');
        $this->db->from('pembayaran as p');
        $this->db->join('petugas as pe', 'pe.id_petugas = p.id_petugas');
        $this->db->join('siswa as s', 's.nisn = p.nisn');
        $this->db->join('spp as sp', 'sp.id_spp = p.id_spp');
        $this->db->where('p.id_petugas = '.$id_petugas);
        $query = $this->db->get()->result();
        return $query;
    }

}

?>