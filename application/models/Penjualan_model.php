<?php
class Penjualan_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function get_penjualan() {
        return $this->db->get('penjualan')->result();
    }

    public function insert_penjualan($data) {
        $this->db->insert('penjualan', $data);
        return $this->db->insert_id();
    }

    public function update_penjualan($id, $data) {
        $this->db->where('id_penjualan', $id);
        $this->db->update('penjualan', $data);
    }

    public function delete_penjualan($id) {
        $this->db->where('id_penjualan', $id);
        $this->db->delete('penjualan');
    }
    public function getdata_pelanggan()
    {
        $query = $this->db->get('pelanggan');
        return $query->result();
    }
    public function getdata_karyawan()
    {
        $query = $this->db->get('karyawan');
        return $query->result();
    }
}
