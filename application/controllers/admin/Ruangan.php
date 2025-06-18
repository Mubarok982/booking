<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('authenticated')) {
            redirect('auth');
        }
        $this->load->model('Ruangan_model');
    }

    public function index() {
        $data['ruangan'] = $this->Ruangan_model->getAll();
        $this->render_backend('admin/ruangan/index', $data);
    }

    public function tambah() {
        $this->render_backend('admin/ruangan/form');
    }

    public function simpan() {
        $data = [
            'kode'      => $this->input->post('kode'),
            'nama'      => $this->input->post('nama'),
            'terdaftar' => date('Y-m-d H:i:s')
        ];
        $this->Ruangan_model->insert($data);
        redirect('admin/ruangan');
    }

    public function edit($id) {
        $data['ruangan'] = $this->Ruangan_model->getById($id);
        $this->render_backend('admin/ruangan/form', $data);
    }

    public function update($id) {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama')
        ];
        $this->Ruangan_model->update($id, $data);
        redirect('admin/ruangan');
    }

    public function hapus($id) {
        $this->Ruangan_model->delete($id);
        redirect('admin/ruangan');
    }
}
