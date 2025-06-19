<?php
class Aplikasi_model extends CI_Model {

    public function get() {
        return $this->db->get_where('aplikasi', ['id' => 1])->row();
    }

    public function update($data) {
        $this->db->where('id', 1);
        return $this->db->update('aplikasi', $data);
    }
}
