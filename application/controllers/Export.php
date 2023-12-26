<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        // Tampilkan halaman ekspor database
        $this->load->view('export/index');
    }

    public function exportDatabase() {
        // Nama file ekspor
        $filename = 'backup-' . date('Y-m-d_H-i-s') . '.sql';
    
        // Lokasi penyimpanan file ekspor di dalam folder db_backup
        $filepath = FCPATH . 'db_backup/' . $filename;
    
        // Pastikan folder db_backup sudah ada, jika belum, buat folder tersebut
        if (!is_dir(FCPATH . 'db_backup')) {
            mkdir(FCPATH . 'db_backup');
        }
    
        // Panggil fungsi untuk membuat file SQL
        $this->export_database($filepath);
    
        // Set header untuk melakukan download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        readfile($filepath);
    }   
    

    private function export_database($filename) {
        $this->load->dbutil();
        $backup = $this->dbutil->backup();

        // Tulis data ke file SQL
        $this->load->helper('file');
        write_file($filename, $backup);

        // Contoh pesan sukses
        echo "Database telah berhasil diekspor ke file: " . $filename;
    }
}
