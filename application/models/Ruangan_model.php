<?php
class Ruangan_model extends CI_Model {

    public function getAll() {
        return $this->db->get('ruangan')->result();
    }

    public function getById($id) {
        return $this->db->get_where('ruangan', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('ruangan', $data);
    }

    public function update($id, $data) {
        return $this->db->update('ruangan', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('ruangan', ['id' => $id]);
    }
}
