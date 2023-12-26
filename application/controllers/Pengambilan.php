<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengambilan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengambilan_model');
    }
    public function index($status = null) {
        $date = $this->input->get('date');
    
        $date = ($date) ? $date : date('Y-m-d');
    
        if ($status === 'Proses' || $status === 'Selesai') {
            $data['orders'] = $this->Pengambilan_model->filter_by_status_and_date($status, $date);
        } elseif ($status === 'All' || $status === null) {
            $data['orders'] = $this->Pengambilan_model->get_all_orders_by_date($date);
        } else {
            $data['orders'] = $this->Pengambilan_model->filter_by_status_and_date('Proses', $date);
        }
    
        $data['selected_date'] = $date;
    
        $this->load->view('pengambilan/index', $data);
    }
    
    
    
    public function terima_laundry($order_id) {
        $this->Pengambilan_model->terima_laundry($order_id);

        redirect('pengambilan/index');
    }
    public function kembalikan_status($order_id) {
        $this->Pengambilan_model->kembalikan_status($order_id);

        redirect('pengambilan/index');
    }
}
?>
