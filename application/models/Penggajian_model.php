<?php
class Penggajian_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_penggajian_list()
    {
        return $this->db->get('penggajian')->result();
    }

    public function get_penggajian_by_id($id)
    {
        return $this->db->get_where('penggajian', array('id' => $id))->row();
    }
    public function get_filtered_penggajian($filter_status, $filter_tanggal)
    {
        $this->db->select('*');
        $this->db->from('penggajian');
    
        if ($filter_status !== 'semua') {
            $this->db->where('status_penggajian', $filter_status);
        }
    
        if (!empty($filter_tanggal)) {
            // Ubah format tanggal sesuai dengan format tanggal di database
            $formatted_date = date('Y-m-d', strtotime($filter_tanggal));
            $this->db->where('tanggal_gaji <=', $formatted_date);
        }
    
        return $this->db->get()->result();
    }
    
    public function get_pegawai_list()
    {
        return $this->db->get('pegawai')->result_array();
    }

    public function get_pegawai_by_id($id)
    {
        return $this->db->get_where('pegawai', array('id' => $id))->row();
    }

    public function get_pegawai_name($id_pegawai) {
        $this->db->select('nama');
        $this->db->where('id', $id_pegawai);
        $query = $this->db->get('Pegawai');

        if ($query->num_rows() > 0) {
            return $query->row()->nama;
        } else {
            return 'Pegawai Tidak Diketahui';
        }
    }

    public function insert_penggajian($data)
    {
        return $this->db->insert('penggajian', $data);
    }

    public function update_penggajian($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('penggajian', $data);
    }

    public function delete_penggajian($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('penggajian');
    }

    public function set_sudah_cair($id)
    {
        $data_penggajian = array(
            'status_penggajian' => 'Sudah Cair',
        );

        $this->db->where('id', $id);
        return $this->db->update('penggajian', $data_penggajian);
    }

    public function set_belum_cair($id)
    {
        $data_penggajian = array(
            'status_penggajian' => 'Belum Cair',
        );

        $this->db->where('id', $id);
        return $this->db->update('penggajian', $data_penggajian);
    }
}
