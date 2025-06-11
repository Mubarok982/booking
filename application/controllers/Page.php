<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

public function home(){
$this->render_backend('home'); 
}

public function berita() {
    redirect('berita');
}

public function pengguna(){
if($this->session->userdata('role') != 'admin') 
show_404(); 

$this->render_backend('pengguna'); 
}

public function kontak(){
$this->render_backend('kontak'); 
}
}
