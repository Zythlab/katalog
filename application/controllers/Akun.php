<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function _cek(){
        if($this->session->userdata('role')!="1") redirect(base_url());
    }

    public function index()
    {   
        $this->_cek();
        $this->data['sites'] = 'Dashboard';
        $this->data['pages'] = 'Akun';
        $this->data['content'] = $this->load->view('user', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->Makun->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->username;
            $row[] = $person->password;
            
            //add html for action
            $row[] = '<a class="btn btn-flat btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id_akun."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-flat btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_akun."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Makun->count_all(),
            "recordsFiltered" => $this->Makun->count_filtered(),
            "data" => $data,
            );
        //output to json format
        echo json_encode($output);
    }
    
    public function add()
    {
        $this->_validate();
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            );
        $insert = $this->Makun->save($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function edit($id)
    {
        $data = $this->Makun->get_by_id($id);
        echo json_encode($data);
    }

    public function update()
    {
        $this->_validate();
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            );
        // var_dump($data) ;
        $this->Makun->update(array('id_akun' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function delete($id)
    {
        $this->Makun->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
    
    
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username is required';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password is required';
            $data['status'] = FALSE;
        }

        if($data['status'] == FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function login()
    {
        if (!$error = $this->input->get('error'))
            $error = '';
        else if ($_GET['error'] == 1)
            $error = '<code>Password atau username tidak valid.</code><br><br>';
        $this->data['notice'] = $error;
        $this->load->view('login', $this->data);
    }

    public function getLoginAuth()
    {
        $usr = $this->input->post('email');
        $pass = $this->input->post('pass');

        $result = $this->Makun->user_auth($usr, $pass);
        if ($result) redirect(base_url('katalog'));
        else redirect(base_url('akun/login?error=1'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}