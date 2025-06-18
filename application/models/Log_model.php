<?php
class Log_model extends CI_Model {

    public function getAll() {
        return $this->db->get('log')->result();
    }

    public function insert($data) {
        return $this->db->insert('log', $data);
    }

    // Menggabungkan dengan nama user
    public function getWithUser() {
        $this->db->select('log.*, user.nama');
        $this->db->from('log');
        $this->db->join('user', 'user.id = log.idUser');
        $this->db->order_by('log.terdaftar', 'DESC');
        return $this->db->get()->result();
    }
}
