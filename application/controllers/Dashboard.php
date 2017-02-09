<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mbarang','Minvoice'));
    }

    public function _cek(){
        if(!$this->session->userdata('username')) redirect(base_url());
    }

    public function index()
    {
            $this->_cek();
            $this->data['menus'] = 'Dashboard';
            $this->data['sites'] = 'Dashboard';
            $this->data['pages'] = 'Dashboard';
            $this->data['stok_refill'] = $this->Mbarang->get_by_top_refill();
            $this->data['stok_tabung'] = $this->Mbarang->get_by_top_tabung();
            $this->data['jumlah_sp'] = $this->Mbarang->get_jumlah_spare_part();
            // $this->data['nama_produk'] = $this->Minvoice->getNamaLimaProdukTerakhir();
            $this->data['produk'] = $this->Minvoice->getLimaProdukTerakhir();
            $this->data['produk2'] = $this->Minvoice->getLimaProdukTerakhir();
            $this->data['content'] = $this->load->view('dashboard', $this->data, true);
            $this->load->view('template', $this->data);
    }

}