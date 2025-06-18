<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('authenticated')) {
            redirect('auth');
        }
        $this->load->model('UserModel');
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->UserModel->getById($id);

        $this->render_backend('profil/index', $data);
    }

    public function update()
    {
        $id = $this->session->userdata('id');

        // Ambil inputan form
        $data = [
            'nama'         => $this->input->post('nama'),
            'username'     => $this->input->post('username'),
            'jenisKelamin' => $this->input->post('jenisKelamin'),
            'telp'         => $this->input->post('telp'),
            'email'        => $this->input->post('email'),
            'alamat'       => $this->input->post('alamat'),
            'skin'         => $this->input->post('skin')
        ];

        // 🔍 Debug sementara jika perlu
        // echo '<pre>'; print_r($_FILES); exit;

        // Proses upload foto jika ada
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './uploads/foto_user/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name']     = 'user_' . $id . '_' . time();
            $config['overwrite']     = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $uploaded = $this->upload->data();
                $data['foto'] = $uploaded['file_name'];

                // Update session foto agar tampil di navbar
                $this->session->set_userdata(['foto' => $uploaded['file_name']]);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                log_activity('Update profil pengguna');

                redirect('profil');
            }
        }

        $this->UserModel->update($id, $data);
        $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
        redirect('profil');
    }

    public function simpan_password()
    {
        $id = $this->session->userdata('id');
        $lama = md5($this->input->post('password_lama'));
        $baru = md5($this->input->post('password_baru'));

        $user = $this->UserModel->getById($id);

        if ($user->password != $lama) {
            $this->session->set_flashdata('error', 'Password lama salah.');
            redirect('profil/ganti_password');
        }

        $this->UserModel->update($id, ['password' => $baru]);
        $this->session->set_flashdata('success', 'Password berhasil diganti.');
        redirect('profil');
    }

    public function ganti_password()
    {
        $this->render_backend('profil/ganti_password');
    }
}
