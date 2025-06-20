<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('authenticated')) {
            redirect('auth');
        }

        $this->load->model('Booking_model');
        $this->load->model('m_model');
    }

    public function index()
    {
        $data['booking'] = $this->Booking_model->get_with_relations();
        $this->render_backend('admin/booking/index', $data);
    }

    public function tambah()
    {
        $tanggal = $this->input->get('tanggal'); // dari inputan form (AJAX / query string)
        $dariJam = $this->input->get('dariJam');
        $sampaiJam = $this->input->get('sampaiJam');

        if ($tanggal && $dariJam && $sampaiJam) {
            $data['ruangan'] = $this->m_model->get_ruangan_tersedia($tanggal, $dariJam, $sampaiJam);
        } else {
            $data['ruangan'] = $this->m_model->get_data('ruangan')->result();
        }

        $this->render_backend('admin/booking/form', $data);
    }


    public function simpan()
    {
        // ✅ Pastikan ID user tersimpan dari session login
        $data = [
            'idUser' => $this->session->userdata('id'),  // Pastikan 'id' diset di session saat login
            'idRuangan' => $this->input->post('idRuangan'),
            'tanggal' => $this->input->post('tanggal'),
            'dariJam' => $this->input->post('dariJam'),
            'sampaiJam' => $this->input->post('sampaiJam'),
            'agenda' => $this->input->post('agenda'),
            'status' => 'Menunggu',
            'terdaftar' => date('Y-m-d H:i:s')
        ];

        $this->m_model->insert($data, 'booking');
        // Log aktivitas setelah berhasil menyimpan
        log_activity('Membuat booking baru');

        redirect('admin/booking');
        echo "DEBUG ID USER: " . $this->session->userdata('id');
        die;
    }

    public function hapus($id)
    {
        $this->m_model->delete(['id' => $id], 'booking');
        redirect('admin/booking');
    }

    public function setujui($id)
    {
        $this->Booking_model->update_status($id, 'Diterima');
        $this->session->set_flashdata('success', 'Booking disetujui.');
        redirect('admin/booking');
    }

    public function tolak($id)
    {
        $this->Booking_model->update_status($id, 'Ditolak');
        $this->session->set_flashdata('success', 'Booking ditolak.');
        redirect('admin/booking');
    }

public function get_ruangan_tersedia()
{
    $tanggal   = $this->input->get('tanggal');
    $dariJam   = $this->input->get('dariJam');
    $sampaiJam = $this->input->get('sampaiJam');

    $terbooking = $this->m_model->get_ruangan_terbooking($tanggal, $dariJam, $sampaiJam);

    if (!empty($terbooking)) {
        $this->db->where_not_in('id', $terbooking);
    }

    // Ambil ruangan yang tidak dibooking (tersedia)
    $ruangan = $this->db->get('ruangan')->result();

    // Output dalam bentuk JSON untuk AJAX
    $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($ruangan));
}

}
