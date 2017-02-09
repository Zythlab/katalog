<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function _cek(){
        // if($this->session->userdata('role')!="1") redirect(base_url());
    }

    public function index()
    {   
        // $this->_cek();
        $this->data['sites'] = 'Dashboard';
        $this->data['pages'] = 'Nama Website';
        $this->data['website'] = $this->Mwebsite->getAll();
        $this->data['content'] = $this->load->view('website', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function save(){
        $data = array(
            'website1' => $this->input->post('website1'),
            'website2' => $this->input->post('website2'),
            'website3' => $this->input->post('website3'),
            'website4' => $this->input->post('website4'),
            'website5' => $this->input->post('website5'),
            'website6' => $this->input->post('website6'),
            'website7' => $this->input->post('website7'),
            'website8' => $this->input->post('website8'),
            'website9' => $this->input->post('website9'),
            'website10' => $this->input->post('website10'),
            'website11' => $this->input->post('website11'),
            );
        $this->Mwebsite->save($data, array('id_website' => '1'));
        redirect('website');
    }
}