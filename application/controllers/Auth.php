<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index() {
        // Jika sudah login, langsung ke dashboard
        if ($this->session->userdata('authenticated')) {
            redirect('page/home');
        }

        // 🔢 Buat captcha acak
        $angka1 = rand(1, 10);
        $angka2 = rand(1, 10);
        $captcha = $angka1 + $angka2;

        $this->session->set_userdata('captcha_result', $captcha);
        $this->session->set_userdata('captcha_question', "$angka1 + $angka2");

        $this->load->view('login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $captcha  = $this->input->post('captcha');

        // ❌ Jika captcha salah
        if ($captcha != $this->session->userdata('captcha_result')) {
            $this->session->set_flashdata('error', 'Captcha salah.');
            redirect('auth');
        }

        $user = $this->UserModel->get($username);

        if (empty($user)) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('auth');
        }

        if ($password === $user->password) {
            // ✅ Simpan session user
            $session = array(
                'authenticated' => true,
                'id'        => $user->id,
                'username'  => $user->username,
                'nama'      => $user->nama,
                'role'      => $user->role,
                'foto'      => $user->foto
            );
            $this->session->set_userdata($session);

            // 🔐 Log aktivitas login
            log_activity('Login berhasil');

            redirect('page/home');
        } else {
            $this->session->set_flashdata('error', 'Password salah.');
            redirect('auth');
        }
    }

    public function logout() {
        // 🔐 Log aktivitas logout
        log_activity('Logout');
        $this->session->sess_destroy();
        redirect('auth');
    }
}
