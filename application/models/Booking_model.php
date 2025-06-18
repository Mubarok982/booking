<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    public function get_with_relations() {
        $this->db->select('booking.*, user.nama as nama_user, ruangan.nama as nama_ruangan');
        $this->db->from('booking');
        $this->db->join('user', 'booking.idUser = user.id');
        $this->db->join('ruangan', 'booking.idRuangan = ruangan.id');
        $this->db->order_by('booking.id', 'DESC');
        return $this->db->get()->result();
    }
}
