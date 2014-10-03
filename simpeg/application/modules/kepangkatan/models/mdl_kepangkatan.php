<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_kepangkatan extends CI_Model
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

    public function record_count_kepangkatan($NIP_baru) 
    {
        $query = $this->db->query("select count(*) as jml from riwayat_kepangkatan where NIP = '$NIP_baru' ");

        foreach ($query->result_array() as $row)
        {
            return $row['jml'];   
        }
    }
 
    public function fetch_kepangkatan($NIP_baru, $limit, $start) 
    {
        $this->db->limit($limit, $start);
        if($start==0)
        {
            $query = $this->db->query("SELECT * FROM (select * from riwayat_kepangkatan where NIP = '$NIP_baru') a LIMIT $limit");
        } 
        else
        {   
            $query = $this->db->query("SELECT * FROM (select * from riwayat_kepangkatan where NIP = '$NIP_baru') a LIMIT $start,$limit");
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

    
    function get_gol_kepangkatan($order_by)
    {
        $table = "gol_kepangkatan";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_bidang($order_by)
    {
        $table = "master_bidang";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_seksi($id_bidang)
    {

        $query = $this->db->query("select * from master_seksi where IdBidang = '$id_bidang'");
        return $query;
    }

    function get_status_nikah($order_by)
    {
        $table = "status_kawin";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }    

    function _insert($data)
    {
        $table = "riwayat_kepangkatan";
        $this->db->insert($table, $data);
    }

    function get_where($id)
    {
        $table = "riwayat_kepangkatan";
        $this->db->where('Id_Rp', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function _update($id,$data)
    {
        $table = "riwayat_kepangkatan";
        $this->db->where('Id_Rp', $id);
        $this->db->update($table, $data);

    }

    function _delete($id)
    {
        $this->db->delete('riwayat_kepangkatan', array('Id_Rp' => $id)); 
    }
}