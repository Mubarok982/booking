<?php
class User_model extends CI_Model {

    public function getAll() {
        return $this->db->get('user')->result();
    }

    public function getById($id) {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('user', $data);
    }

    public function update($id, $data) {
        return $this->db->update('user', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('user', ['id' => $id]);
    }
}
