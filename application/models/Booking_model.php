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

    public function getBookingPerBulan() {
    $this->db->select("MONTH(tanggal) as bulan, COUNT(*) as total");
    $this->db->group_by("MONTH(tanggal)");
    $this->db->order_by("bulan", "ASC");
    return $this->db->get("booking")->result();
}
public function update_status($id, $status) {
    $this->db->where('id', $id);
    return $this->db->update('booking', ['status' => $status]);
}

// Hitung total booking dengan status "Menunggu" milik user
public function count_menunggu_by_user($userId) {
    $this->db->where('idUser', $userId);
    $this->db->where('status', 'Menunggu');
    return $this->db->count_all_results('booking');
}

// Ambil 5 booking terakhir milik user
public function get_recent_by_user($userId) {
    $this->db->select('booking.*, ruangan.nama as nama_ruangan');
    $this->db->from('booking');
    $this->db->join('ruangan', 'booking.idRuangan = ruangan.id');
    $this->db->where('booking.idUser', $userId);
    $this->db->order_by('booking.tanggal', 'DESC');
    $this->db->limit(5);
    return $this->db->get()->result();
}

public function get_ruangan_tersedia($tanggal, $dariJam, $sampaiJam)
{
    $this->db->select('r.*');
    $this->db->from('ruangan r');
    $this->db->where_not_in('r.id', function($subquery) use ($tanggal, $dariJam, $sampaiJam) {
        $subquery->select('b.idRuangan')
                 ->from('booking b')
                 ->where('b.tanggal', $tanggal)
                 ->where('b.status !=', 'Ditolak')
                 ->group_start()
                     ->where("('$dariJam' BETWEEN b.dariJam AND b.sampaiJam)")
                     ->or_where("('$sampaiJam' BETWEEN b.dariJam AND b.sampaiJam)")
                     ->or_where("(b.dariJam BETWEEN '$dariJam' AND '$sampaiJam')")
                 ->group_end();
    });

    return $this->db->get()->result();
}

}
