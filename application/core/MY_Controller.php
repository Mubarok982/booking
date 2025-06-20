<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->authenticated();
    }

    public function authenticated() {
        if($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != 'api') {
            if (!$this->session->userdata('authenticated')) {
                redirect('auth');
            }
        }
    }

    public function render_login($content, $data = NULL) {
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $this->load->view('template/login/index', $data);
    }

   protected function render_backend($view, $data = []) {
    $data['title'] = $data['title'] ?? 'Dashboard';

    $data['contents'] = $this->load->view($view, $data, true);
    $this->load->view('template/backend/index', $data);
}



}
