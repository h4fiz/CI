<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_profil_pegawai_test extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("profil_pegawai");
    }
 
    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("profil_pegawai");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}