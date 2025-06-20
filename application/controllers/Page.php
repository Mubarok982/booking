<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->model('m_model');
}

public function home()
{
    $data['title'] = 'Dashboard';

    if ($this->session->userdata('role') === 'Admin') {
        $data['total_booking'] = $this->m_model->count_data('booking');
        $data['total_ruangan'] = $this->m_model->count_data('ruangan');
        $data['total_user'] = $this->m_model->count_data('user');

        $data['status_labels'] = json_encode(['Menunggu', 'Diterima', 'Ditolak']);
        $data['status_totals'] = json_encode([
            $this->m_model->count_where('booking', ['status' => 'Menunggu']),
            $this->m_model->count_where('booking', ['status' => 'Diterima']),
            $this->m_model->count_where('booking', ['status' => 'Ditolak']),
        ]);

        $this->render_backend('admin/dashboard', $data);
    } else {
        // User View
        $id_user = $this->session->userdata('id');
        $data['booking_terbaru'] = $this->m_model->get_booking_user($id_user);
        $this->render_backend('user/dashboard', $data);
    }
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
