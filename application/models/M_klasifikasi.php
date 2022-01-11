<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_klasifikasi extends CI_Model
{

    public function getData()
    {
        $query = "SELECT tb_klasifikasi.*, tb_jenis.nama_jenis, tb_ciri.nama_ciri
                    FROM tb_klasifikasi
                    JOIN tb_jenis ON tb_klasifikasi.id_jenis = tb_jenis.id_jenis
                    JOIN tb_ciri ON tb_klasifikasi.id_ciri = tb_ciri.id_ciri
                    GROUP BY id_jenis
                ";

        return $this->db->query($query)->result_array();
    }

    public function getPenyakit()
    {
        $query = "SELECT * FROM tb_jenis";
        return $this->db->query($query)->result_array();
    }

    public function getPenyakitById($id_jenis)
    {
        $query = "SELECT * FROM tb_jenis WHERE id_jenis='$id_jenis' ";
        return $this->db->query($query)->row_array();
    }

    public function getGejala()
    {
        $query = "SELECT * FROM tb_ciri";
        return $this->db->query($query)->result_array();
    }

    public function getById($id_jenis)
    {
        $query = "SELECT tb_klasifikasi.*, tb_jenis.nama_jenis, tb_ciri.nama_ciri,tb_ciri.bobot
                    FROM tb_klasifikasi
                    JOIN tb_jenis ON tb_klasifikasi.id_jenis = tb_jenis.id_jenis
                    JOIN tb_ciri ON tb_klasifikasi.id_ciri = tb_ciri.id_ciri
                    WHERE tb_klasifikasi.id_jenis = '$id_jenis'
                ";

        return $this->db->query($query)->result_array();
    }

    public function cekGejala($penyakit, $gejala)
    {
        $query = "SELECT * FROM tb_klasifikasi WHERE id_jenis='$penyakit' AND id_ciri='$gejala'";
        return $this->db->query($query)->row_array();
    }

    public function getOption($id_jenis)
    {
        $query = " SELECT tb_ciri.id_ciri, nama_ciri, bobot FROM tb_ciri LEFT JOIN tb_klasifikasi ON tb_ciri.id_ciri = tb_klasifikasi.id_ciri
                   EXCEPT
                   SELECT tb_ciri.id_ciri, nama_ciri, bobot FROM tb_ciri RIGHT JOIN tb_klasifikasi ON tb_ciri.id_ciri = tb_klasifikasi.id_ciri WHERE tb_klasifikasi.id_jenis = '$id_jenis'
                ";
        return $this->db->query($query)->result_array();
    }
}
