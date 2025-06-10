<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            show_404();
        }
        $this->load->model('UserModel');
    }

    public function index() {
        $data['user'] = $this->UserModel->getAll();
        $this->render_backend('pengguna_list', $data);
    }

    public function tambah() {
        if ($_POST) {
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'role'     => $this->input->post('role')
            ];
            $this->UserModel->insert($data);
            redirect('pengguna');
        }
        $this->render_backend('pengguna_form');
    }

    public function edit($id) {
        $data['row'] = $this->UserModel->getById($id);
        if ($_POST) {
            $update = [
                'username' => $this->input->post('username'),
                'nama'     => $this->input->post('nama'),
                'role'     => $this->input->post('role')
            ];
            if (!empty($this->input->post('password'))) {
                $update['password'] = md5($this->input->post('password'));
            }
            $this->UserModel->update($id, $update);
            redirect('pengguna');
        }
        $this->render_backend('pengguna_form', $data);
    }

    public function delete($id) {
        $this->UserModel->delete($id);
        redirect('pengguna');
    }
}
