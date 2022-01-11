<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul']      = 'Login Admin SisPar Penyakit Kucing';
            $data['sub_judul']  = 'Halaman Login';
            $this->load->view('template/v_header', $data);
            $this->load->view('v_login', $data);
        } else {
            // Jika validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('tb_admin', ['username' => $username])->row_array();

        if ($user) {
            //Jika user ada
            if ($password == $user['password']) {
                //masukkan session
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Maff password salah. Periksa kembali !</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Maff username salah. Periksa kembali !</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Anda Berhasil Logout !</div>');
        redirect('awal');
    }
}
