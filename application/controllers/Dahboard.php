<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
    $this->load->model('Booking_model');
    $this->load->model('m_model');

    // Statistik per bulan
    $booking_per_bulan = $this->Booking_model->getBookingPerBulan();
    $bulan = [];
    $total = [];
    foreach ($booking_per_bulan as $row) {
        $bulan[] = date('F', mktime(0, 0, 0, $row->bulan, 1));
        $total[] = (int)$row->total;
    }

    $data = [
        'bulan'          => json_encode($bulan),
        'total'          => json_encode($total),
        'total_booking'  => $this->m_model->count('booking'),
        'total_ruangan'  => $this->m_model->count('ruangan'),
        'total_user'     => $this->m_model->count('user'),
    ];

    // Gunakan render_backend agar layout rapi
    $this->render_backend('home', $data);
}


}
