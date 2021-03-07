<?php 
defined('BASEPATH') || exit('No direct script access allowed');
class DataModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
      
    }
public function insertedData($table, $data) {
    return $this->db->insert($table, $data);
} 

public function updatedData($table, $param, $paramValue, $data) {
    $this->db->set($data);
    $this->db->where($param, $paramValue);
    return $this->db->update($table);
}

public function deletedData($table, $param, $paramValue) {
    $this->db->where($param, $paramValue);
    return $this->db->delete($table);
}

public function getAllData($table, $itemOrder, $desc) {
    $orderd = null;
    $desc ? $orderd = 'DESC' : $orderd = "ASC";
    $this->db->order_by($itemOrder, $orderd);
    return  $this->db->get($table)->result();
}

public function getDataWhere($table, $param, $paramValue) {
    return  $this->db->get_where($table, array($param => $paramValue))->result();
}

public function getOneDataWhere($table, $param, $paramValue) {
    return $this->db->get_where($table, array($param => $paramValue), 1)->result();

}

}