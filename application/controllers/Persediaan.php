<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persediaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Persediaan_model');
    }

    public function index() {
        $data['persediaan'] = $this->Persediaan_model->getPersediaan();
        $this->load->view('persediaan/index', $data);
    }

    public function create() {
        $this->load->view('persediaan/create');
    }

    public function store() {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->Persediaan_model->insertPersediaan($data);
        redirect('persediaan/index');
    }

    public function edit($id) {
        $data['barang'] = $this->Persediaan_model->getBarangById($id);
        $this->load->view('persediaan/edit', $data);
    }

    public function update($id) {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->Persediaan_model->updatePersediaan($id, $data);
        redirect('persediaan/index');
    }

    public function delete($id) {
        $this->Persediaan_model->deletePersediaan($id);
        redirect('persediaan/index');
    }
}
