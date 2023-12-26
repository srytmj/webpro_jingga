<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persediaan_model extends CI_Model {

    public function getPersediaan() {
        $query = $this->db->get('persediaan');
        return $query->result();
    }

    public function insertPersediaan($data) {
        $this->db->insert('persediaan', $data);
    }

    public function getBarangById($id) {
        $query = $this->db->get_where('persediaan', array('id' => $id));
        return $query->row();
    }

    public function updatePersediaan($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('persediaan', $data);
    }

    public function deletePersediaan($id) {
        $this->db->where('id', $id);
        $this->db->delete('persediaan');
    }
}
