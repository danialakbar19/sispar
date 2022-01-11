<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konsultasi', 'konsul');
    }

    public function index()
    {
        $data['ciri']       = $this->db->get('tb_ciri')->result_array();
        $data['judul']      = 'Konsultasi Sis-Par Penyakit Kucing';
        $data['sub_judul']  = 'Halaman Konsultasi';
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar');
        $this->load->view('v_konsultasi', $data);
        $this->load->view('user/v_footer');
    }

    public function proses()
    {
        // Make Validation URL
        if (!$this->input->post('ciri', true)) {
            redirect('konsultasi');
        } else {

            $data2   = $this->konsul->getJenis();

            // Mulai Perhitungan Metode CBR
            $i = 0;
            foreach ($data2 as $row) {

                $jml        = 0;
                $nilai      = 0;
                $jenis      = $row['id_jenis'];
                $kasus      = $this->konsul->getPenyakit($jenis);
                $penyakit   = $kasus['nama_jenis'];
                $dipilih    = count($this->input->post('ciri', true));

                // Perulangan perhitungan metode CBR
                foreach ($this->input->post('ciri', true) as $selected) {
                    $ciri   = $selected;
                    $row    = $this->konsul->getCiri($ciri);
                    $get    = $this->konsul->getSama($jenis, $ciri);
                    if (isset($get)) {
                        $jml += 1;
                        $nilai += (1 * $get['bobot']);
                    } else {
                        $jml += 0;
                    }
                }

                $pembagi    = $this->konsul->getPembagi($jenis);
                $jml_ciri   = $this->konsul->getJmlCiri($jenis);
                $hasil = $nilai / "$pembagi";

                $final[$i] = array(
                    'id_jenis'      => $jenis,
                    'nama_jenis'    => $penyakit,
                    'jml_cocok'     => $jml,
                    'jml_gejala'    => $jml_ciri,
                    'jml_dipilih'   => $dipilih,
                    'bobot_sama'    => $nilai,
                    'total_bobot'   => $pembagi,
                    'hasil'         => $hasil
                );

                $i++;
            }

            // Mengurutkan array hasil descending
            $this->array_sort_by_column($final, 'hasil');

            // Passing data ke Views
            $data['judul']      = 'Hasil Perhitungan Metode CBR';
            $data['sub_judul']  = 'Hasil Analisa Dengan Metode CBR';
            $data['final']      = $final;
            $data['klas']       = $this->konsul->getData();
            $data['ciri']       = $this->input->post('ciri', true);
            $this->load->view('user/v_header', $data);
            $this->load->view('user/v_sidebar');
            $this->load->view('v_perhitungan', $data);
            $this->load->view('user/v_footer');
        }
    }

    // Fungsi Descending Array
    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }
}
