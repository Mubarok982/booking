<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends CI_Model {

    public function get_where($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function get_desc($table) {
        $this->db->order_by('id', 'desc');
        return $this->db->get($table);
    }

    public function insert($data, $table) {
        $this->db->insert($table, $data);
    }

    public function update($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($where, $table) {
        $this->db->delete($table, $where);
    }

    public function count($table) {
    return $this->db->count_all($table);
}

}
