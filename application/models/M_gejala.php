<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gejala extends CI_Model
{

    public function getData($id_ciri)
    {
        $query = "SELECT * FROM tb_ciri WHERE id_ciri = '$id_ciri'";
        return $this->db->query($query)->row_array();
    }

    public function editData($data, $id_ciri)
    {
        $this->db->where('id_ciri', $id_ciri);
        $this->db->update('tb_ciri', $data);
    }
}
