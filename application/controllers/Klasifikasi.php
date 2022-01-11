<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('awal');
        }
        $this->load->model('m_klasifikasi', 'klas');
    }

    public function index()
    {
        $data['klas']       = $this->klas->getData();
        $data['judul']      = 'Basis Kasus - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tabel Basis Kasus';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('kasus/v_klasifikasi', $data);
        $this->load->view('template/v_footer');
    }

    public function detail($id_jenis)
    {
        $data['detail']     = $this->klas->getById($id_jenis);
        $data['penyakit']   = $this->klas->getPenyakitById($id_jenis);
        $data['judul']      = 'Basis Kasus - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tabel Detail Basis Kasus';
        $data['id_jenis']   = $id_jenis;
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('kasus/v_detailklas', $data);
        $this->load->view('template/v_footer');
    }

    public function tambah()
    {
        $data['judul']      = 'Basis Kasus - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tambah Data Basis Kasus';
        $data['penyakit']   = $this->klas->getPenyakit();
        $data['gejala']     = $this->klas->getGejala();

        // aturan validasi
        $this->form_validation->set_rules('penyakit', 'Penyakit', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('kasus/v_addklas', $data);
            $this->load->view('template/v_footer', $data);
        } else {
            $penyakit   = $this->input->post('penyakit', true);

            // Perulangan input gejala
            foreach ($this->input->post('gejala', true) as $selected) {
                $gejala = $selected;

                //Cek Gejala
                $cek_gejala = $this->klas->cekGejala($penyakit, $gejala);

                //Buat kondisi
                if ($cek_gejala) {
                    true;
                } else {
                    $data = array(
                        'id_jenis'         => $penyakit,
                        'id_ciri'          => $gejala
                    );

                    //Insert Ke Database
                    $this->db->insert('tb_klasifikasi', $data);
                }
            }
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Basis Kasus Berhasil di Tambahkan</div>');
            redirect('klasifikasi');
        }
    }

    //Hapus relasi
    public function hapus($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        $this->db->delete('tb_klasifikasi');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Data Basis Kasus Berhasil di Hapus</div>');
        redirect('klasifikasi');
    }

    //Hapus Gejala Basis Kasus
    public function hapusGejala($id_jenis, $id_ciri)
    {
        $penyakit = $this->klas->getPenyakitById($id_jenis);
        $namape   = $penyakit['nama_jenis'];

        $this->db->where('id_jenis', $id_jenis);
        $this->db->where('id_ciri', $id_ciri);
        $this->db->delete('tb_klasifikasi');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Gejala Kasus Penyakit ' . $namape . ' Berhasil di Hapus</div>');
        redirect('klasifikasi/detail/' . $id_jenis);
    }

    //Tambah Gejala Basis Kasus
    public function tambahGejala($id_jenis)
    {
        $data['judul']      = 'Basis Kasus - SisPar Penyakit Kucing';
        $data['sub_judul']  = 'Tambah Gejala Basis Kasus';
        $data['penyakit']   = $this->klas->getPenyakitById($id_jenis);
        $data['detail']     = $this->klas->getById($id_jenis);
        $data['gejala']     = $this->klas->getOption($id_jenis);

        // aturan validasi
        $this->form_validation->set_rules('id_gejala', 'ID Gejala', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('kasus/v_editkasus', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_jenis   = $this->input->post('id_jenis', true);
            $id_ciri    = $this->input->post('id_gejala', true);

            $data = array(
                'id_jenis'  => $id_jenis,
                'id_ciri'   => $id_ciri
            );

            $this->db->insert('tb_klasifikasi', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Gejala Berhasil di Tambahkan</div>');
            redirect('klasifikasi/detail/' . $id_jenis);
        }
    }
}
