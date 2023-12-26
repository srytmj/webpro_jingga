<?php
class Penggajian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penggajian_model');
    }

    public function index()
    {
        $data['filter_status'] = $this->input->get('filter_status') ?? 'semua';
        $data['filter_tanggal'] = $this->input->get('filter_tanggal') ?? '';
    
        $data['penggajian'] = $this->Penggajian_model->get_filtered_penggajian($data['filter_status'], $data['filter_tanggal']);
    
        $this->load->view('penggajian/index', $data);
    }
    
    public function tambah()
    {
        $data['pegawai'] = $this->Penggajian_model->get_pegawai_list();
    
        if ($this->input->post()) {
            $id_pegawai = $this->input->post('id_pegawai');
            $tanggal_gaji = $this->input->post('tanggal_gaji');
            $tunjangan = $this->input->post('tunjangan');
    
            // Mengambil gaji_pokok dari tabel pegawai
            $pegawai = $this->Penggajian_model->get_pegawai_by_id($id_pegawai);
    
            if ($pegawai) {
                $gaji_pokok = $pegawai->gaji;
                $total_gaji = $gaji_pokok + $tunjangan;
    
                $data_penggajian = array(
                    'id_pegawai' => $id_pegawai,
                    'tanggal_gaji' => $tanggal_gaji,
                    'tunjangan' => $tunjangan,
                    'total_gaji' => $total_gaji,
                    'status_penggajian' => 'Belum Cair',
                );
    
                $this->Penggajian_model->insert_penggajian($data_penggajian);
                redirect('penggajian');
            } else {
                // Handle jika ID Pegawai tidak valid
                echo "ID Pegawai tidak valid";
            }
        } else {
            $this->load->view('penggajian/tambah', $data);
        }
    }
    

    public function edit($id)
    {
        $data['pegawai'] = $this->Penggajian_model->get_pegawai_list();
        $data['penggajian'] = $this->Penggajian_model->get_penggajian_by_id($id);
    
        if ($this->input->post()) {
            $id_pegawai = $this->input->post('id_pegawai');
            $tanggal_gaji = $this->input->post('tanggal_gaji');
            $tunjangan = $this->input->post('tunjangan');
    
            // Mengambil gaji_pokok dari tabel pegawai
            $pegawai = $this->Penggajian_model->get_pegawai_by_id($id_pegawai);
    
            if ($pegawai) {
                $gaji_pokok = $pegawai->gaji;
                $total_gaji = $gaji_pokok + $tunjangan;
    
                $data_penggajian = array(
                    'id_pegawai' => $id_pegawai,
                    'tanggal_gaji' => $tanggal_gaji,
                    'tunjangan' => $tunjangan,
                    'total_gaji' => $total_gaji,
                    'status_penggajian' => $this->input->post('status_penggajian'),
                );
    
                $this->Penggajian_model->update_penggajian($id, $data_penggajian);
                redirect('penggajian');
            } else {
                // Handle jika ID Pegawai tidak valid
                echo "ID Pegawai tidak valid";
            }
        } else {
            $this->load->view('penggajian/edit', $data);
        }
    }

    public function set_sudah_cair($id)
    {
        $data_penggajian = array(
            'status_penggajian' => 'Sudah Cair',
        );
    
        $this->Penggajian_model->update_penggajian($id, $data_penggajian);
        redirect('penggajian');
    }

    public function set_belum_cair($id)
    {
        $data_penggajian = array(
            'status_penggajian' => 'Belum Cair',
        );
    
        $this->Penggajian_model->update_penggajian($id, $data_penggajian);
        redirect('penggajian');
    }
    
        public function hapus($id)
    {
        $this->Penggajian_model->delete_penggajian($id);
        redirect('penggajian');
    }
}
