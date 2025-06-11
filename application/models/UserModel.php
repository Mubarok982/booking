<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class UserModel extends CI_Model
{

    public function get($username)
    {
        $this->db->where('username', $username);

        $results = $this->db->get('user')->row();
        return $results;
    }

    public function getAll()
    {
        return $this->db->get('user')->result();
    }


    public function getById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('user', $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('user', ['id' => $id]);
    }

    public function getPagination($limit, $start) {
        return $this->db->get('user', $limit, $start)->result();
    }

    public function count() {
        return $this->db->count_all('user');
    }

}