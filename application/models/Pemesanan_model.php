<?php
class Pemesanan_model extends CI_Model {
    public function create_order($data) {
        $this->db->insert('pesanan', $data);
        return $this->db->insert_id();
    }

    public function get_orders() {
        return $this->db->get('pesanan')->result_array();
    }

    public function get_customer_name($id_pelanggan) {
        $this->db->select('nama');
        $this->db->where('id', $id_pelanggan);
        $query = $this->db->get('pelanggan');

        if ($query->num_rows() > 0) {
            return $query->row()->nama;
        } else {
            return 'Pelanggan Tidak Diketahui';
        }
    }

    public function get_customer_list() {
        return $this->db->get('pelanggan')->result_array();
    }

    public function get_service_list() {
        return $this->db->get('layanan')->result_array();
    }

    public function get_harga_by_id($jenis_layanan_id) {
        $this->db->select('harga');
        $this->db->where('id', $jenis_layanan_id);
        $query = $this->db->get('layanan');

        if ($query->num_rows() > 0) {
            return $query->row()->harga;
        } else {
            return 0; // Atau nilai default lainnya
        }
    }
}
