<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_data_diklat extends CI_Model
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

    public function record_count_diklat($NIP_baru) 
    {
        $query = $this->db->query("select count(*) as jml from riwayat_diklat where NIP = '$NIP_baru' ");

        foreach ($query->result_array() as $row)
        {
            return $row['jml'];   
        }
    }
 
    public function fetch_data_diklat($NIP_baru, $limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->query("select * from riwayat_diklat where NIP = '$NIP_baru' ");
 
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

    function get_name_pegawai($id)
    {
        $table = "profil_pegawai";
        $this->db->where('NIP', $id);
        $query=$this->db->get($table);
        foreach ($query->result() as $row) 
        {
            $nama = $row->Nama_Pegawai;
            
        }
        return  $nama ;
    }
    

    function get_pendidikan($order_by)
    {
        $table = "pendidikan";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }


    function _insert($data)
    {
        $table = "riwayat_diklat";
        $this->db->insert($table, $data);
    }

    function get_where($id)
    {
        $table = "riwayat_diklat";
        $this->db->where('Id_Dik', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function _update($id,$data)
    {
        $table = "riwayat_diklat";
        $this->db->where('Id_Dik', $id);
        $this->db->update($table, $data);

    }

    function _delete($id)
    {
        $this->db->delete('riwayat_diklat', array('Id_Dik' => $id)); 
    }
}