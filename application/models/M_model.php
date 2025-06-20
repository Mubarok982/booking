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

// Booking per bulan
public function grafik_booking_bulanan()
{
    $this->db->select("MONTH(tanggal) as bulan, COUNT(*) as total");
    $this->db->from("booking");
    $this->db->group_by("MONTH(tanggal)");
    $this->db->order_by("MONTH(tanggal)", "ASC");
    return $this->db->get()->result();
}


// Status booking
public function get_status_booking()
{
    return $this->db->query("
        SELECT status, COUNT(*) AS jumlah 
        FROM booking 
        GROUP BY status
    ")->result();
}

public function get_booking_user($id_user)
{
    $this->db->select('b.*, r.nama as nama_ruangan');
    $this->db->from('booking b');
    $this->db->join('ruangan r', 'b.idRuangan = r.id', 'left');
    $this->db->where('b.idUser', $id_user);
    $this->db->order_by('b.tanggal', 'DESC');
    return $this->db->get()->result();
}

public function count_data($table) {
    return $this->db->count_all($table);
}

public function count_where($table, $where) {
    return $this->db->where($where)->from($table)->count_all_results();
}

public function get_ruangan_tersedia($tanggal, $dariJam, $sampaiJam)
{
    $this->db->select('*');
    $this->db->from('ruangan');
    $this->db->where_not_in('id', function($builder) use ($tanggal, $dariJam, $sampaiJam) {
        $builder->select('idRuangan')
                ->from('booking')
                ->where('tanggal', $tanggal)
                ->where("(('$dariJam' < sampaiJam) AND ('$sampaiJam' > dariJam))"); // waktu bentrok
    });

    return $this->db->get()->result();
}

public function get_data($table)
{
    return $this->db->get($table);
}
 public function get_ruangan_terbooking($tanggal, $dariJam, $sampaiJam)
{
    $this->db->select('idRuangan');        
    $this->db->from('booking');
    $this->db->where('tanggal', $tanggal);
    $this->db->where_in('status', ['Diterima', 'Menunggu']); // abaikan status Ditolak

    // Perbaiki kondisi overlap waktu
    $this->db->group_start();
    $this->db->where('dariJam <', $sampaiJam);
    $this->db->where('sampaiJam >', $dariJam);
    $this->db->group_end();

    $result = $this->db->get()->result_array();
    return array_column($result, 'idRuangan');
}


}
