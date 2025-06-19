<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('authenticated')) {
            redirect('auth');
        }
        $this->load->model('User_model');
    }

    public function index() {
        $data['user'] = $this->User_model->getAll();
        $this->render_backend('admin/user/index', $data);
    }

    public function tambah() {
        $this->render_backend('admin/user/form');
    }

    public function simpan() {
        $data = [
            'nama'         => $this->input->post('nama'),
            'jenisKelamin' => $this->input->post('jenisKelamin'),
            'telp'         => $this->input->post('telp'),
            'email'        => $this->input->post('email'),
            'alamat'       => $this->input->post('alamat'),
            'username'     => $this->input->post('username'),
            'password'     => md5($this->input->post('password')),
            'role'         => $this->input->post('role'),
            'login'        => 'Offline',
            'terdaftar'    => date('Y-m-d H:i:s')
        ];
        $this->User_model->insert($data);
        redirect('admin/user');
    }

    public function edit($id) {
        $data['user'] = $this->User_model->getById($id);
        $this->render_backend('admin/user/form', $data);
    }

    public function update($id) {
        $data = [
            'nama'         => $this->input->post('nama'),
            'jenisKelamin' => $this->input->post('jenisKelamin'),
            'telp'         => $this->input->post('telp'),
            'email'        => $this->input->post('email'),
            'alamat'       => $this->input->post('alamat'),
            'username'     => $this->input->post('username'),
            'role'         => $this->input->post('role')
        ];

        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password'));
        }

        $this->User_model->update($id, $data);
        redirect('admin/user');
    }

    public function hapus($id) {
        $this->User_model->delete($id);
        redirect('admin/user');
    }

    public function form_import() {
    $this->render_backend('admin/user/form_import');
}

public function import() {
    include APPPATH . 'third_party/PHPExcel/IOFactory.php';

    $file = $_FILES['fileExcel']['tmp_name'];

    $objPHPExcel = PHPExcel_IOFactory::load($file);
    $sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

    foreach ($sheet as $i => $row) {
        if ($i == 1) continue; // skip header

        $data = [
            'nama' => $row['A'],
            'username' => $row['B'],
            'password' => md5($row['C']),
            'role' => $row['D'],
            'terdaftar' => date('Y-m-d H:i:s')
        ];
        $this->UserModel->insert($data);
    }

    $this->session->set_flashdata('success', 'Import berhasil!');
    redirect('admin/user');
}

}
