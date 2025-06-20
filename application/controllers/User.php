<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'User') {
            redirect('auth/logout');
        }
        $this->load->model('Booking_model');
    }

    public function dashboard() {
        $userId = $this->session->userdata('id');

        $data['menunggu'] = $this->Booking_model->count_menunggu_by_user($userId);
        $data['booking_terakhir'] = $this->Booking_model->get_recent_by_user($userId);

        $this->render_backend('user/dashboard', $data);
    }
}
