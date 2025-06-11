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

    public function getPagination($limit, $start) {
    return $this->db->get('berita', $limit, $start)->result();
}

public function count() {
    return $this->db->count_all('berita');
}

public function search($keyword, $limit = null, $start = null) {
    $this->db->from('berita');
    $this->db->like('judul', $keyword);
    $this->db->or_like('deskripsi', $keyword);
    if ($limit !== null && $start !== null) {
        $this->db->limit($limit, $start);
    }
    return $this->db->get()->result();
}

public function countSearch($keyword) {
    $this->db->from('berita');
    $this->db->like('judul', $keyword);
    $this->db->or_like('deskripsi', $keyword);
    return $this->db->count_all_results();
}
}
