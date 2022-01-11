<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyakit extends CI_Model
{

    public function kode()
    {
        $this->db->select('RIGHT(tb_jenis.id_jenis,2) as id_jenis', FALSE);
        $this->db->order_by('id_jenis', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_jenis');
        //cek dulu apakah ada sudah ada kode di tabel. 

        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id_jenis) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }

        $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $kodetampil = "A" . $batas;  //format kode
        return $kodetampil;
    }

    public function getData($id_jenis)
    {
        $query = "SELECT * FROM tb_jenis WHERE id_jenis = '$id_jenis'";
        return $this->db->query($query)->row_array();
    }

    public function editData($id_jenis, $data)
    {
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('tb_jenis', $data);
    }
}
