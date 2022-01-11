<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konsultasi extends CI_Model
{

    public function getData()
    {
        $query = "SELECT A.*, (SELECT COUNT(id_jenis) FROM tb_klasifikasi WHERE id_jenis = A.id_jenis) AS jumlah, tb_jenis.nama_jenis, tb_ciri.nama_ciri
        FROM tb_klasifikasi A
        JOIN tb_jenis ON tb_jenis.id_jenis = A.id_jenis
        JOIN tb_ciri ON tb_ciri.id_ciri = A.id_ciri";

        return $this->db->query($query)->result_array();
    }

    public function getJenis()
    {
        $query = "SELECT tb_klasifikasi.* FROM tb_klasifikasi GROUP BY id_jenis";
        return $this->db->query($query)->result_array();
    }

    public function getPenyakit($jenis)
    {
        $query = "SELECT tb_jenis.* FROM tb_jenis WHERE id_jenis ='$jenis'";
        return $this->db->query($query)->row_array();
    }

    public function getCiri($ciri)
    {
        $query = "SELECT tb_ciri.* FROM tb_ciri WHERE id_ciri ='$ciri'";
        return $this->db->query($query)->row_array();
    }

    public function getSama($jenis, $ciri)
    {
        $query = "SELECT tb_klasifikasi.*, tb_ciri.bobot 
        FROM tb_klasifikasi
        JOIN tb_ciri ON tb_ciri.id_ciri = tb_klasifikasi.id_ciri  
        WHERE tb_klasifikasi.id_jenis='$jenis' AND tb_klasifikasi.id_ciri='$ciri'";

        return $this->db->query($query)->row_array();
    }

    public function getJmlCiri($jenis)
    {

        $this->db->from('tb_klasifikasi');
        $this->db->where('id_jenis', $jenis);
        return $this->db->count_all_results();
    }

    public function getPembagi($jenis)
    {
        $query = "SELECT SUM(tb_ciri.bobot) AS TOTAL
                FROM tb_klasifikasi 
                JOIN tb_ciri ON tb_ciri.id_ciri = tb_klasifikasi.id_ciri
                WHERE id_jenis='$jenis'";
        $bagi = $this->db->query($query)->row_array();
        return $bagi['TOTAL'];
    }
}
