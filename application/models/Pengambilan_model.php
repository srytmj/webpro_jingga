<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengambilan_model extends CI_Model {
    
    public function get_all_orders() {
        // Get all orders
        $query = $this->db->get('pesanan');
        return $query->result_array();
    }
    public function filter_by_status($status) {
        // Get orders based on the specified status
        $this->db->where('status_pesanan', $status);
        $query = $this->db->get('pesanan');
        return $query->result_array();
    }
    public function get_all_orders_by_date($date) {
        // Get all orders based on the provided date
        $this->db->where('tanggal_pengambilan <=', $date);
        $query = $this->db->get('pesanan');
        return $query->result_array();
    }
    public function filter_by_status_and_date($status, $date) {
        // Get orders based on the specified status and date
        $this->db->where('status_pesanan', $status);
        $this->db->where('tanggal_pengambilan <=', $date);
        $query = $this->db->get('pesanan');
        return $query->result_array();
    }    
    public function get_customer_name($id_pelanggan) {
        $query = $this->db->get_where('pelanggan', array('id' => $id_pelanggan));
        $result = $query->row_array();
        return $result['nama'];
    }
    public function terima_laundry($order_id) {
        $data = array(
            'status_pesanan' => 'Selesai'
        );

        $this->db->where('id', $order_id);
        $this->db->update('pesanan', $data);
    }
    public function kembalikan_status($order_id) {
        $data = array(
            'status_pesanan' => 'Proses'
        );

        $this->db->where('id', $order_id);
        $this->db->update('pesanan', $data);
    }
}
?>
