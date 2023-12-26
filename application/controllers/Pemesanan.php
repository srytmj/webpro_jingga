<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('pemesanan_model');
    }

    public function index() {
        $data['orders'] = $this->pemesanan_model->get_orders();
        $this->load->view('pemesanan/list', $data);
    }

    public function create() {
        // Ambil daftar pelanggan dan jenis layanan dari database
        $data['customers'] = $this->pemesanan_model->get_customer_list();
        $data['services'] = $this->pemesanan_model->get_service_list();

        $this->load->view('pemesanan/create', $data);
    }

    public function process_create() {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $tanggal_pengambilan = $this->input->post('tanggal_pengambilan');
        $jenis_layanan_id = $this->input->post('jenis_layanan_id');
        $berat_barang = $this->input->post('berat_barang');

        $harga_layanan =  $this->pemesanan_model->get_harga_by_id($jenis_layanan_id);

        // Menghitung total biaya
        $total_biaya = $harga_layanan * $berat_barang;

        // Memasukkan variabel ke dalam array $data
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'tanggal_pemesanan' => date('Y-m-d'),
            'tanggal_pengambilan' => $tanggal_pengambilan,
            'total_biaya' => $total_biaya,
            'status_pesanan' => 'Proses'
        );

        // Melanjutkan proses pembuatan detail pesanan
        $id_pesanan = $this->pemesanan_model->create_order($data);

        // Memasukkan data ke dalam tabel pesananDetail
        $data_detail = array(
            'id_pesanan' => $id_pesanan,
            'id_layanan' => $jenis_layanan_id,
            'berat' => $berat_barang,
        );
        $this->db->insert('pesananDetail', $data_detail);

        // Redirect atau tampilkan pesan sukses
        redirect('pemesanan/index');
    }    
}
