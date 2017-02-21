<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function _cek(){
        if($this->session->userdata('username')=="") redirect(base_url());
    }

    public function index()
    {   
        $this->_cek();
        $this->data['sites'] = 'Dashboard';
        $this->data['pages'] = 'Nama Website';
        $this->data['website'] = $this->Mwebsite->getAll();
        $this->data['content'] = $this->load->view('website', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function save(){
        $banner1 = $_FILES['banner1']['name'];      
        $banner2 = $_FILES['banner2']['name'];      
        $banner3 = $_FILES['banner3']['name']; 
        $ban1 = $this->input->post('ban1');
        $ban2 = $this->input->post('ban2');
        $ban3 = $this->input->post('ban3');
        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '1000000'; // 0 = no file size limit
        $config['file_name']= round(microtime(true) * 1000);          
        $config['overwrite'] = false;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($banner1 != ""){
            $this->upload->do_upload('banner1');
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
        }else if ($banner1 == "" && $ban1 != ""){
            $file_name = $ban1;
        }
        if ($banner2 != "")
        {
            $this->upload->do_upload('banner2');
            $upload_data = $this->upload->data();
            $file_name2 = $upload_data['file_name'];
        }else if ($banner2 == "" && $ban2 != ""){
            $file_name2 = $ban2;
        }
        if ($banner3 != "")
        {
            $this->upload->do_upload('banner3');
            $upload_data = $this->upload->data();
            $file_name3 = $upload_data['file_name'];
        }  else if ($banner3 == "" && $ban3 != ""){
            $file_name3 = $ban3;
        }
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
            'banner1' => $file_name,
            'banner2' => $file_name2,
            'banner3' => $file_name3,
            );
        $this->Mwebsite->save($data, array('id_website' => '1'));
        redirect('website');
    }
}