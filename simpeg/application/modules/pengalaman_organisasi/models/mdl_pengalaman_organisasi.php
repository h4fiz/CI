<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pengalaman_organisasi extends CI_Model
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

    public function record_count_keluarga($NIP_baru) 
    {
        $query = $this->db->query("select count(*) as jml from riwayat_organisasi where NIP = '$NIP_baru' ");

        foreach ($query->result_array() as $row)
        {
            return $row['jml'];   
        }
    }
 
    public function fetch_data_keluarga($NIP_baru, $limit, $start) 
    {
        $this->db->limit($limit, $start);
        if($start==0)
        {
            $query = $this->db->query("SELECT * FROM (select * from riwayat_organisasi where NIP = '$NIP_baru') a LIMIT $limit");
        } 
        else
        {   
            $query = $this->db->query("SELECT * FROM (select * from riwayat_organisasi where NIP = '$NIP_baru') a LIMIT $start,$limit");
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

    function get_tingkat_hukuman($order_by)
    {
        $table = "tingkat_hukuman";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_pendidikan($order_by)
    {
        $table = "pendidikan";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_pekerjaan($order_by)
    {
        $table = "pekerjaan";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
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
        $table = "riwayat_organisasi";
        $this->db->insert($table, $data);
    }

    function get_where($id)
    {
        $table = "riwayat_organisasi";
        $this->db->where('Id_Org', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function _update($id,$data)
    {
        $table = "riwayat_organisasi";
        $this->db->where('Id_Org', $id);
        $this->db->update($table, $data);

    }

    function _delete($id)
    {
        $this->db->delete('riwayat_organisasi', array('Id_Org' => $id)); 
    }
}