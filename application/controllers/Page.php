<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

public function home() {
    $this->load->model('m_model'); // Pastikan model umum kamu dimuat

    $data['total_booking'] = $this->m_model->count('booking');
    $data['total_ruangan'] = $this->m_model->count('ruangan');
    $data['total_user']    = $this->m_model->count('user');

    $this->render_backend('home', $data);
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
