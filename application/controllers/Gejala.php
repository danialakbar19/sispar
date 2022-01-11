<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('awal');
        }
        $this->load->library('form_validation');
        $this->load->model('m_gejala', 'mega');
    }

    public function index()
    {
        $data['ciri']       = $this->db->get('tb_ciri')->result_array();
        $data['judul']      = 'Gejala - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tabel Gejala';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('gejala/v_gejala', $data);
        $this->load->view('template/v_footer');
    }

    public function tambah()
    {
        $data['judul']      = 'Gejala - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tambah Data Gejala';

        // aturan validasi
        $this->form_validation->set_rules('gejala', 'Gejala', 'trim|required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('gejala/v_addgejala', $data);
            $this->load->view('template/v_footer');
        } else {

            $gejala = $this->input->post('gejala');
            $bobot  = $this->input->post('bobot');

            $data = array(
                'nama_ciri' => $gejala,
                'bobot'     => $bobot
            );

            $this->db->insert('tb_ciri', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Gejala Berhasil di Tambahkan</div>');
            redirect('gejala');
        }
    }

    public function edit($id_ciri)
    {
        $data['judul']      = 'Gejala - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tambah Data Gejala';
        $data['gejala']     = $this->mega->getData($id_ciri);

        // aturan validasi
        $this->form_validation->set_rules('gejala', 'Gejala', 'trim|required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('gejala/v_editgejala', $data);
            $this->load->view('template/v_footer');
        } else {

            $id_ciri    = $this->input->post('id_ciri');
            $gejala     = $this->input->post('gejala');
            $bobot      = $this->input->post('bobot');

            $data = array(
                'nama_ciri' => $gejala,
                'bobot'     => $bobot
            );

            $this->mega->editData($data, $id_ciri);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Gejala Berhasil di Ubah</div>');
            redirect('gejala');
        }
    }

    public function hapus($id_ciri)
    {
        $this->db->where('id_ciri', $id_ciri);
        $this->db->delete('tb_ciri');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Data Gejala Berhasil di Hapus</div>');
        redirect('gejala');
    }
}
