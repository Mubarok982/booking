<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index() {
        // Jika sudah login, langsung ke dashboard
        if($this->session->userdata('authenticated')) {
            redirect('page/home');
        }

        $this->load->view('login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->UserModel->get($username);

        if (empty($user)) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('auth');
        }

        if ($password === $user->password) {
            // ✅ Simpan semua informasi penting, termasuk id
            $session = array(
                'authenticated' => true,
                'id'        => $user->id,         // 🔥 penting untuk relasi booking
                'username'  => $user->username,
                'nama'      => $user->nama,
                'role'      => $user->role,
                'foto'      => $user->foto 
            );

            $this->session->set_userdata($session);
            // Log aktivitas
            log_activity('Login berhasil');

            redirect('page/home');
        } else {
            $this->session->set_flashdata('error', 'Password salah.');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
