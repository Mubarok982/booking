<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index() {
        if($this->session->userdata('aauthenticated'))
            redirect('page/home');
         $this->load->view('login');
    }

    public function login(){
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));

    echo "Username: $username<br>";
    echo "Password MD5: $password<br>";

    $user = $this->UserModel->get($username);

    if(empty($user)) {
        echo "User tidak ditemukan<br>";
        return;
    }

    echo "User ditemukan! Password di DB: " . $user->password . "<br>";

    if($password == $user->password){
        $session = array(
            'authenticated' => true,
            'username' => $user->username,
            'nama' => $user->nama,
            'role' => $user->role
        );
        $this->session->set_userdata($session);
        echo "Login berhasil. Redirect ke home...";
        redirect('page/home');
    } else {
        echo "Password salah<br>";
    }
}


    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}