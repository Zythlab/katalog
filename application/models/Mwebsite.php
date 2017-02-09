<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mwebsite extends CI_Model {

    var $table = 'nama_website';
    public function __construct(){
        parent::__construct();
    }
    
    public function getAll(){
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data, $where){
        $this->db->update($this->table, $data, $where);
    }

}