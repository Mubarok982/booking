<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QrController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('ciqrcode');
        $this->load->model('Booking_model');
    }

    public function generate($id) {
        $booking = $this->Booking_model->getById($id);

        if (!$booking) {
            show_404();
        }

        // Data yang akan dikodekan dalam QR
        $qrText = "Booking ID: {$booking->id}\nUser: {$booking->nama_user}\nRuangan: {$booking->nama_ruangan}\nTanggal: {$booking->tanggal}\nWaktu: {$booking->dariJam} - {$booking->sampaiJam}";

        // Konfigurasi QR
        $params['data'] = $qrText;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . "uploads/qrcode/qr_{$booking->id}.png";
        $this->ciqrcode->generate($params);

        // Redirect ke lokasi file
        redirect(base_url("uploads/qrcode/qr_{$booking->id}.png"));
    }
}
