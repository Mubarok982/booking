<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('authenticated')) {
            redirect('auth');
        }
        $this->load->model('Aplikasi_model');
    }

    public function index() {
        $data['aplikasi'] = $this->Aplikasi_model->get();
        $this->render_backend('admin/aplikasi/index', $data);
    }

    public function simpan() {
    $data = [
        'nama'     => $this->input->post('nama'),
        'email'    => $this->input->post('email'),
        'telp'     => $this->input->post('telp'),
        'alamat'   => $this->input->post('alamat')
    ];

    if (!empty($_FILES['logo']['name'])) {
        $config['upload_path']   = './uploads/logo/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name']     = 'logo_aplikasi';
        $config['overwrite']     = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('logo')) {
            $data['logo'] = $this->upload->data('file_name');
        }
    }

    $this->Aplikasi_model->update($data);
    $this->session->set_flashdata('success', 'Data aplikasi diperbarui!');
    redirect('admin/aplikasi');
}

}
