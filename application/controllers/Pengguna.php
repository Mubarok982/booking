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
        $config['base_url'] = site_url('pengguna/index');
        $config['total_row'] = $this->UserModel->count();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Bootstrap Pagination Style
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user'] = $this->UserModel->getpagination($config['per_page'], $page);
        $this->render_backend('pengguna', $data);
    }

    public function tambah() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required | is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required | min_length[8]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->render_backend('pengguna_form');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'role'     => $this->input->post('role')
            ];
            $this->UserModel->insert($data);
            redirect('pengguna');
        }
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
