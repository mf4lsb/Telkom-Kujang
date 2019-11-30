<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        // $data['title'] = 'Admin Dashboard';
        // $data['user'] = $this->db->get_where('user', ['username' => 
        // $this->session->userdata('username')])->row_array();
        
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('admin/index', $data);
        // $this->load->view('templates/footer');
        redirect('user/profile');
    }

    public function competitor()
    {
        $data['title'] = 'Competitor';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $data['competitor'] = $this->db->get('tb_competitor')->result_array();
        
        $this->form_validation->set_rules('competitor', 'Competitor', 'required|is_unique[tb_competitor.competitor]');


        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/competitor', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->db->insert('tb_competitor', ['competitor' => $this->input->post('competitor')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Competitor has been Add!</div>');
            redirect('admin/competitor');
        }
    }

    //edit live ajax competitor
    public function updateCompetitor()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->updateCompetitor($data, $this->input->post('id'));
    }

    //delete competitor table by id
    public function deleteCompetitor()
    {
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->deleteCompetitor($this->input->post('id'));
    }
    
    public function profile()
    {
        // $data['title'] = 'NOT CLEAR';
        // $data['user'] = $this->db->get_where('user', ['username' => 
        // $this->session->userdata('username')])->row_array();
        
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('user/index', $data);
        // $this->load->view('templates/footer'); 
        redirect('user/profile');  
    }
    
    public function role()
    {
        $data['title'] = 'Access Role';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();

        $this->db->where('id !=', 1);
        $data['role'] = $this->db->get('user_role')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    /*public function editAccess($id)
    {
        $data['give'] = $this->db->get_where('tb_datel', ['id' => $id])->row_array();
        $this->load->view('admin/role', $data);
    }*/
    
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        // $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');   
    }

    public function changeAccess() //method ajax role-access
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        
        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        }
        else{
            $this->db->delete('user_access_menu', $data);
        }
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
    
    
    public function changeAccess_User() //method ajax role-user_access
    {
        $user_id = $this->input->post('userId');
        $sto_id = $this->input->post('stoId');

        $data = [
            'user_id' => $user_id,
            'sto_id' => $sto_id
        ];
        
        $result = $this->db->get_where('tb_user_access', $data);

        if($result->num_rows() < 1){
            $this->db->insert('tb_user_access', $data);
        }
        else{
            $this->db->delete('tb_user_access', $data);
        }
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }



    public function roleUser()
    {
        $data['title'] = 'Role User';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();

        //panggil model untuk role
        $this->db->where('id !=', 1); //admin dilarang, role admin hanya 1
        $this->load->model('Role_model', 'role');
        $data['gr'] = $this->role->getRole();

        $data['user_role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role_id', 'Role', 'required', [
            'required' => 'Kolom "Select Role" wajib diisi!'
        ]);

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role-user', $data);
            $this->load->view('templates/footer');
        }
        
    }

    //delete user table by id
    public function deleteUser()
    {
        $this->load->model('Role_model', 'role');
        $this->role->deleteUser($this->input->post('id'));
    }



    public function userAccess($role_id)
    {
        $data['title'] = 'User Access';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();

        $data['name'] = $this->db->get_where('user', ['id' => $role_id])->row_array();

        //$this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('tb_sto')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user-access', $data);
        $this->load->view('templates/footer');   
    }
    

    public function edituser($id_user) //edit user pada bagan role user
    {
        //$user['user'] = $this->db->get('user')->result_array();
        $role = $this->input->post('role_id');
        //$kuery = $this->db->get_where('user_role', $role);
        //var_dump($kuery->result());die;
        //$update = [
          //  'role_id' => $kuery['id']
        //];
        echo $id_user;die;
        $update = [
            'role_id' => $role
        ];
        $this->db->where('id', $id_user);
        $this->db->update('user', $update);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated!</div>');
        redirect('admin/roleuser');
    }

    public function editRole()
    {
        $update = [
            'role_id' => $this->input->post('role_id')
        ];
        $user_id = $this->input->post("user_id");
        $this->db->where('id', $user_id);
        $this->db->update('user', $update);
    }

    public function changeRole() //method ajax role-user
    {
        $username_id = $this->input->post('usernameId');
        $is_active = $this->input->post('isActive');
        $data = [
            'username' => $username_id,
            'is_active !=' => 0
        ];
        $result = $this->db->get_where('user', $data);
        if($result->num_rows() < 1)
        {
            $update = [
                'is_active' => 1
            ];
            $this->db->update('user', $update, ['username' => $username_id]);
            //$this->db->update('user', $data);
            //$this->db->where('username', $username_id);
            //$this->db->update('user', $update);
        }
        else{
            $update = [
                'is_active' => 0
            ];
            $this->db->where('username', $username_id);
            $this->db->update('user', $update);
        }
        
        $this->session->set_flashdata('message', '<div class="alert alert-success col-sm" role="alert">Access Changed!</div>');
    }


    /* DATEL, STO, ODC*/
    public function datel()
    {
        $data['title'] = 'Datel';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $data['datel'] = $this->db->get('tb_datel')->result_array();

        $this->form_validation->set_rules('datel', 'Datel', 'required|unique[tb_datel.nama_datel]', [
            'required' => 'Kolom "Nama Datel" wajib diisi!',
            'unique' => 'Datel tersebut sudah tersedia sebelumnya!'
        ]);


        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datel', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->db->insert('tb_datel', ['nama_datel' => $this->input->post('datel')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Datel baru ditambahkan!</div>');
            redirect('admin/datel');
        }
    }
    
    public function sto()
    {
        $data['title'] = 'STO';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $data['sto'] = $this->db->get('tb_sto')->result_array();
        $data['datel'] = $this->db->get('tb_datel')->result_array();
        
        //panggil model
        $this->load->model('Telkom_model', 'telkom');

        $data['getDatel'] = $this->telkom->getDatelforSTO();
    
        $this->form_validation->set_rules('sto', 'Nama STO', 'required|unique[tb_sto.nama_sto]', [
            'required' => 'Kolom "Nama STO" wajib diisi!',
            'unique' => 'Nama STO tersebut sudah tersedia sebelumnya!'
        ]);
        $this->form_validation->set_rules('kode', 'Kode STO', 'required|unique[tb_sto.kode_sto]', [
            'required' => 'Kolom "Kode STO" wajib diisi!',
            'unique' => 'Harap gunakan kode STO yang lain, karena kode tersebut sudah tersedia!'
        ]);
        $this->form_validation->set_rules('datel', 'Datel', 'required', [
            'required' => 'Kolom "Pilih Datel" wajib diisi!'
        ]);

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/sto', $data);
            $this->load->view('templates/footer');
        }
        else{
            $data = [
                'nama_sto' => $this->input->post('sto'),
                'kode_sto' => $this->input->post('kode'),
                'datel_id' => $this->input->post('datel')
            ];
            $this->db->insert('tb_sto', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">STO baru ditambahkan!</div>');
            redirect('admin/sto');
        }
    }

    public function ODC()
    {
        $data['title'] = 'ODC';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $this->load->model('Telkom_model', 'telkom');
        $data['datel'] = $this->telkom->getDatel();
        $data['getData'] = $this->telkom->getDataforODC($data['user']['id']);
        $data['sto'] = $this->telkom->getSTO();


        $this->form_validation->set_rules('odc', 'Kode ODC', 'required', [
            'required' => 'Kolom "Kode ODC" wajib diisi!'
        ]);
        $this->form_validation->set_rules('sto', 'STO', 'required|callback_checkData[odc]', [
            'required' => 'Kolom "Pilih STO" wajib diisi!'
        ]);


        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/odc', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $data = [
                'sto_id' => $this->input->post('sto'),
                'kode_odc' => $this->input->post('odc'),
                'alamat' => $this->input->post('alamat'),
                'demands' => $this->input->post('homepass'),
                'port' => 0,
                'used' => 0,
                'available' => 0,
                'area' => $this->input->post('area'),
                'karakter' => $this->input->post('char'),
                'tipe_rumah' => $this->input->post('rumah'),
                'huni' => $this->input->post('huni'),
                'daya_beli' => $this->input->post('beli'),
                'potensi' => 0,
                'okupansi' => 0,
                'tikor' => $this->input->post('tikor')
            ];
            $this->db->insert('tb_odc', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">ODC baru ditambahkan!</div>');
            redirect('admin/odc');
        }
    }

    public function checkData($fieldSTO, $fieldODC) //check double data in tb_odc (page odc)
    {
        $fieldODC = $this->input->post($fieldODC);
        $this->db->where('sto_id', $fieldSTO);
        $this->db->where('kode_odc', $fieldODC);
        $result = $this->db->get('tb_odc');
        if($result->num_rows() >= 1)
        {
            $this->form_validation->set_message('checkData', 'Data telah ada di database!');
            return false;
        }
        else
        {
            return true;
        }
    }

    /*public function roleAK()
    {
        $data['title'] = 'Role A&K';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }*/
    
}