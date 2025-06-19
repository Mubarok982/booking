<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testqr extends CI_Controller {

    public function index() {
        $this->load->library('ciqrcode');

        $params['data'] = 'Ini QR test dari CodeIgniter';
        $params['level'] = 'H';
        $params['size'] = 5;
        $params['savename'] = FCPATH . 'uploads/qrcode/test.png';

        $this->ciqrcode->generate($params);

        echo "QR Code berhasil dibuat: <a href='" . base_url('uploads/qrcode/test.png') . "' target='_blank'>Lihat QR</a>";
    }
}
