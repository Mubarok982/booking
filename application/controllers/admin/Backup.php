<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('authenticated')) {
            redirect('auth');
        }
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
    }

    public function index() {
        $this->render_backend('admin/backup/index');
    }

    public function export() {
        $backup = $this->dbutil->backup();

        $filename = 'backup_' . date("Y-m-d-H-i-s") . '.zip';
        write_file(FCPATH . 'backup/' . $filename, $backup);
        force_download($filename, $backup);
    }
}
