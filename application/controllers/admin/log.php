<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('authenticated')) {
            redirect('auth');
        }
        $this->load->model('Log_model');
        $this->load->model('User_model');
    }

    public function index() {
        $data['log'] = $this->Log_model->getWithUser();
        $this->render_backend('admin/log/index', $data);
    }
}
