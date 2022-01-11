<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('awal');
        }
        $this->load->library('form_validation');
        $this->load->model('m_penyakit');
    }

    public function index()
    {
        $data['macam']      = $this->db->get('tb_jenis')->result_array();
        $data['judul']      = 'SisPar - Data Jenis Penyakit Kucing';
        $data['sub_judul']  = 'Tabel Penyakit';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('penyakit/v_jenis', $data);
        $this->load->view('template/v_footer');
    }

    public function tambah()
    {
        $data['id_jenis']   = $this->m_penyakit->kode();
        $data['judul']      = 'Penyakit - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tambah Data Penyakit';

        // aturan validasi
        $this->form_validation->set_rules('penyakit', 'Penyakit', 'trim|required');
        $this->form_validation->set_rules('detail', 'Detail Penyakit', 'trim|required');
        $this->form_validation->set_rules('solusi', 'Solusi Penyakit', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('penyakit/v_addjenis', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_jenis   = $this->input->post('id_jenis', true);
            $penyakit   = $this->input->post('penyakit', true);
            $detail     = $this->input->post('detail', true);
            $solusi     = $this->input->post('solusi', true);

            $data = array(
                'id_jenis'         => $id_jenis,
                'nama_jenis'       => $penyakit,
                'detail_jenis'     => $detail,
                'solusi_jenis'     => $solusi
            );

            $this->db->insert('tb_jenis', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Penyakit Berhasil di Tambahkan</div>');
            redirect('jenis');
        }
    }

    public function edit($id_jenis)
    {
        $data['judul']      = 'Penyakit - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Edit Data Penyakit';
        $data['penyakit']   = $this->m_penyakit->getData($id_jenis);

        // aturan validasi
        $this->form_validation->set_rules('penyakit', 'Penyakit', 'trim|required');
        $this->form_validation->set_rules('detail', 'Detail Penyakit', 'trim|required');
        $this->form_validation->set_rules('solusi', 'Solusi Penyakit', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('penyakit/v_editjenis', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_jenis   = $this->input->post('id_jenis', true);
            $penyakit   = $this->input->post('penyakit', true);
            $detail     = $this->input->post('detail', true);
            $solusi     = $this->input->post('solusi', true);

            $data = array(
                'nama_jenis'       => $penyakit,
                'detail_jenis'     => $detail,
                'solusi_jenis'     => $solusi
            );

            $this->m_penyakit->editData($id_jenis, $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Penyakit Berhasil di Ubah</div>');
            redirect('jenis');
        }
    }

    public function hapus($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        $this->db->delete('tb_jenis');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Data Penyakit Berhasil di Hapus</div>');
        redirect('jenis');
    }
}
