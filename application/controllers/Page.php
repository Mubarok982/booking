<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

public function home(){
$this->render_backend('home'); // load view home.php
}

public function berita() {
    $this->load->model('BeritaModel'); // ⬅️ pastikan model dimuat

    $data['berita'] = $this->BeritaModel->getAll(); // ⬅️ ambil data dari DB
    $this->render_backend('berita', $data); // ⬅️ kirim ke view
}


public function pengguna(){
if($this->session->userdata('role') != 'admin') // Jika user yg login bukan admin
show_404(); // Redirect ke halaman 404 Not found

$this->render_backend('pengguna'); // load view pengguna.php
}

public function kontak(){
$this->render_backend('kontak'); // load view kontak.php
}
}
