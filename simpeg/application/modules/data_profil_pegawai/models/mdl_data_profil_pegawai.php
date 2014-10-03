<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_data_profil_pegawai extends CI_Model
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

    function get_name_gol_darah($id)
    {
        $table = "gol_dar";
        $nama = "";
        $this->db->where('Kd_Gol', $id);
        $query=$this->db->get($table);
        foreach ($query->result() as $row) 
        {
            $nama = $row->Gol_Darah;
            
        }
        return  $nama ;
    }

    function get_name_agama($id)
    {
        $table = "agama";
        $this->db->where('Kd_Agama', $id);
        $query=$this->db->get($table);
        foreach ($query->result() as $row) 
        {
          $nama = $row->Nm_Agama ;
        }
        return $nama;
    }

    function get_name_kawin($id)
    {
        $nama = "";
        $table = "status_kawin";
        $this->db->where('Kd_St_kawin', $id);
        $query=$this->db->get($table);
        foreach ($query->result() as $row) 
        {
          $nama = $row->Status_Perkawinan ;
        }
        return $nama;
    }

    function get_name_kecamatan($id)
    {
        $nama = "";
        $table = "kecamatan";
        $this->db->where('Kd_Kecamatan', $id);
        $query=$this->db->get($table);
        foreach ($query->result() as $row) 
        {
          $nama = $row->NM_Kecamatan ;
        }
        return $nama;
    }

    function get_name_kelurahan($id)
    {
        $nama = "";
        $table = "kelurahan";
        $this->db->where('Kd_Kelurahan', $id);
        $query=$this->db->get($table);
        foreach ($query->result() as $row) 
        {
          $nama = $row->Nm_Kelurahan ;
        }
        return $nama;
    }

    function get_agama($order_by)
    {
        $table = "Agama";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_golongan_darah($order_by)
    {
        $table = "gol_dar";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_kelurahan($order_by)
    {
        $table = "kelurahan";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_kecamatan($order_by)
    {
        $table = "kecamatan";
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function _insert($data)
    {
        $table = "profil_pegawai";
        $this->db->insert($table, $data);
    }

    function get_where($id)
    {
        $table = "profil_pegawai";
        $this->db->where('NIP', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function _update($id, $data)
    {
        $table = "profil_pegawai";
        $this->db->where('NIP', $id);
        $this->db->update($table, $data);
    }

    function _delete($id)
    {
        $this->db->delete('profil_pegawai', array('NIP' => $id)); 
    }
}