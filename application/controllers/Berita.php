<?php
class Berita extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BeritaModel');
    }

    public function index() {
        $data['berita'] = $this->BeritaModel->getAll();
        $this->render_backend('berita', $data);
    }

    public function tambah() {
        if ($this->session->userdata('role') == 'user') show_404();

        if ($_POST) {
            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal' => date('Y-m-d')
            ];
            $this->BeritaModel->insert($data);
            redirect('berita');
        }
        $this->render_backend('berita_form');
    }

    public function edit($id) {
        if ($this->session->userdata('role') == 'user') show_404();

        $data['row'] = $this->BeritaModel->getById($id);
        if ($_POST) {
            $update = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->BeritaModel->update($id, $update);
            redirect('berita');
        }
        $this->render_backend('berita_form', $data);
    }

    public function delete($id) {
        if ($this->session->userdata('role') == 'user') show_404();
        $this->BeritaModel->delete($id);
        redirect('berita');
    }
}
