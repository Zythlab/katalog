<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $this->_cek();
        $this->data['sites'] = 'Dashboard';
        $this->data['pages'] = 'Kategori';
        $this->data['content'] = $this->load->view('kategori', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->Mkategori->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nama;
            
            //add html for action
            $row[] = '<a class="btn btn-flat btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id_kategori."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-flat btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_kategori."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mkategori->count_all(),
            "recordsFiltered" => $this->Mkategori->count_filtered(),
            "data" => $data,
            );
        //output to json format
        echo json_encode($output);
    }
    
    public function add()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            );
        $insert = $this->Mkategori->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function edit($id)
    {
        $data = $this->Mkategori->get_by_id($id);
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            );
        // var_dump($data) ;
        $this->Mkategori->update(array('id_kategori' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function delete($id)
    {
        $this->Mkategori->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}