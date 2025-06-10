<?php
class BeritaModel extends CI_Model {
    public function getAll() {
        return $this->db->get('berita')->result();
    }

    public function getById($id) {
        return $this->db->get_where('berita', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('berita', $data);
    }

    public function update($id, $data) {
        return $this->db->update('berita', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('berita', ['id' => $id]);
    }
}
