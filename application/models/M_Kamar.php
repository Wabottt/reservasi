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

        $this->db->select('kamar.nomor_kamar, kamar.tipe, kamar.lantai, kamar.status, detail_kamar.id_kamar, 
        detail_kamar.tipe, detail_kamar.harga, detail_kamar.fasilitas, detail_kamar.foto');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $this->db->where('status = "ready" ');
        $query=$this->db->get();
        return $query->result();
    }

    public function detailKamar(){

        $query=$this->db->select('kamar.status, detail_kamar.id_kamar, detail_kamar.tipe, detail_kamar.harga, 
        detail_kamar.fasilitas, detail_kamar.foto, COUNT(*) as total')
        ->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' )
        ->where(' status="ready" ')
        ->group_by('tipe')
        ->get('kamar');
        return $query->result();
    }

    public function Kamar(){

        $query=$this->db->select('kamar.status, detail_kamar.id_kamar, detail_kamar.tipe, detail_kamar.harga, 
        detail_kamar.fasilitas, detail_kamar.foto, COUNT(*) as total')
        ->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' )
        ->where('status="on cleaning" ')
        ->get('kamar');
        return $query->result();
    }

    public function update_data($where, $data3, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data3);
    }
}
