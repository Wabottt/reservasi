<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kamar extends CI_Model {

    public function Status1(){

        $this->db->select('kamar.nomor_kamar, kamar.tipe, kamar.lantai, kamar.status, detail_kamar.id_kamar, 
        detail_kamar.tipe, detail_kamar.harga, detail_kamar.fasilitas, detail_kamar.foto');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $this->db->where('status = "ready" ' );
        $query=$this->db->get();
        return $query->result();
    }

    public function Status2(){

        $this->db->select('kamar.nomor_kamar, kamar.tipe, kamar.lantai, kamar.status, detail_kamar.id_kamar, 
        detail_kamar.tipe, detail_kamar.harga, detail_kamar.fasilitas, detail_kamar.foto');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $this->db->where('status = "chekin" ' );
        $query=$this->db->get();
        return $query->result();
    }

    public function Status3(){

        $this->db->select('kamar.nomor_kamar, kamar.tipe, kamar.lantai, kamar.status, detail_kamar.id_kamar, 
        detail_kamar.tipe, detail_kamar.harga, detail_kamar.fasilitas, detail_kamar.foto');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $this->db->where('status = "chekout" ' );
        $query=$this->db->get();
        return $query->result();
    }

    public function Status4(){

        $this->db->select('kamar.nomor_kamar, kamar.tipe, kamar.lantai, kamar.status, kamar.keterangan, detail_kamar.id_kamar, 
        detail_kamar.tipe, detail_kamar.harga, detail_kamar.fasilitas, detail_kamar.foto');
        $this->db->from('kamar');
        $this->db->join('detail_kamar', 'detail_kamar.tipe=kamar.tipe' );
        $this->db->where('status = "maintenence" ' );
        $query=$this->db->get();
        return $query->result();
    }

}