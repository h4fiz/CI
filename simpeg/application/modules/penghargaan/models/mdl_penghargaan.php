<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_Penghargaan extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
 
    public function record_count() 
    {
        return $this->db->count_all("profil_pegawai");
    }
 
    public function fetch_data_profil_pegawai($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("profil_pegawai");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count_penghargaan($NIP_baru) 
    {
        $query = $this->db->query("select count(*) as jml from riwayat_penghargaan where NIP = '$NIP_baru' ");

        foreach ($query->result_array() as $row)
        {
            return $row['jml'];   
        }
    }
 
    public function fetch_penghargaan($NIP_baru, $limit, $start) 
    {
        $this->db->limit($limit, $start);
        if($start==0)
        {
            $query = $this->db->query("SELECT * FROM (select * from riwayat_penghargaan where NIP = '$NIP_baru') a LIMIT $limit");
        } 
        else
        {   
            $query = $this->db->query("SELECT * FROM (select * from riwayat_penghargaan where NIP = '$NIP_baru') a LIMIT $start,$limit");
        }
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
   

    function _insert($data)
    {
        $table = "riwayat_penghargaan";
        $this->db->insert($table, $data);
    }

    function get_where($id)
    {
        $table = "riwayat_penghargaan";
        $this->db->where('Id_Rph', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function _update($id,$data)
    {
        $table = "riwayat_penghargaan";
        $this->db->where('Id_Rph', $id);
        $this->db->update($table, $data);

    }

    function _delete($id)
    {
        $this->db->delete('riwayat_penghargaan', array('Id_Rph' => $id)); 
    }
}