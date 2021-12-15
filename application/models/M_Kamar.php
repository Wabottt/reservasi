<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kamar extends CI_Model {

    public function tampilData(){

        $this->db->select('kamar.nomor_kamar, kamar.tipe, kamar.lantai, kamar.status, detail_kamar.id_kamar, 
        detail_kamar.tipe, detail_kamar.harga, detail_kamar.fasilitas, detail_kamar.foto');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $query=$this->db->get();
        return $query->result();
    }

    public function PilihKamar(){

        $this->db->select('kamar.nomor_kamar, kamar.lantai, kamar.status, detail_kamar.id_kamar, 
        detail_kamar.tipe, detail_kamar.harga, detail_kamar.fasilitas, detail_kamar.foto, COUNT(*) as total');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $this->db->where('status = "ready" ');
        $this->db->group_by('tipe');
        $query=$this->db->get();
        return $query->result();
    }

    public function status1(){

        $this->db->select('kamar.status, kamar.keterangan, detail_kamar.id_kamar, detail_kamar.tipe, detail_kamar.harga, 
        detail_kamar.fasilitas, detail_kamar.foto, COUNT(*) as total');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $this->db->where('status = "ready" ');
        $query=$this->db->get();
        return $query->result();
    }

    public function status2(){

        $query=$this->db->select('kamar.status, kamar.keterangan, detail_kamar.id_kamar, detail_kamar.tipe, detail_kamar.harga, 
        detail_kamar.fasilitas, detail_kamar.foto, COUNT(*) as total')
        // ->from('kamar')
        ->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' )
        ->where('status = "chekout"')
        ->get('kamar');
        return $query->result();
    }

    public function status3(){

        $query=$this->db->select('kamar.status, kamar.keterangan, detail_kamar.id_kamar, detail_kamar.tipe, detail_kamar.harga, 
        detail_kamar.fasilitas, detail_kamar.foto, COUNT(*) as total')
        ->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' )
        ->where('status="on cleaning" ')
        ->get('kamar');
        return $query->result();
    }

    public function status4(){

        $query=$this->db->select('kamar.status, kamar.keterangan, detail_kamar.id_kamar, detail_kamar.tipe, detail_kamar.harga, 
        detail_kamar.fasilitas, detail_kamar.foto, COUNT(*) as total')
        ->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' )
        ->where('status= "maintenance" ')
        ->get('kamar');
        return $query->result();
    }

    public function update_data($where, $data3, $table)
    {
        $this->db->where($where);
        $this->db->update_batch($table, $data3);
    }

    public function chekout($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
