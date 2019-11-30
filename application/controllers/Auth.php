<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function goToDefaultPage()
    {
        if($this->session->userdata('role_id') == 1)
        {
            redirect('user/profile');
        }
        else if($this->session->userdata('role_id') == 2)
        {
            redirect('user/profile');
        }
        else if($this->session->userdata('role_id') == 3)
        {
            redirect('user/profile');
        }
    }

    public function index()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Kolom USERNAME wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kolom PASSWORD wajib diisi!'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Telkom Kujang - Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
        else{
            $this->_login();
        }

    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //user tersedia
        if($user){
            //jika usernya akitf
            if($user['is_active'] == 1)
            {
                //cek password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'username' => $user['username'],
                        'name' => $user['name'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1)
                    {
                        redirect('user/profile');
                    }
                    else{
                        redirect('user/profile');
                    }
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            }
            else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum diaktivasi oleh Admin! Harap hubungin Admin!</div>');
                redirect('auth');
            }

        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    
    public function registration()
    { 
        $this->goToDefaultPage();
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim', [
            'required' => 'Kolom FULLNAME wajib diisi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[8]|is_unique[user.username]|alpha_dash', [ 
            'required' => 'Kolom USERNAME wajib diisi!',
            'min_length' => 'Username terlalu pendek!',
            'is_unique' => 'Username sudah digunakan!',
            'alpha_dash' => 'Hanya diperbolehkan Alfanumerik dan Dashes'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [ 
            'required' => 'Kolom PASSWORD wajib diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run()==false)
        {
            $data['title'] = 'Telkom Kujang - Registration Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }
        else{
            $data = [
                'name' => htmlspecialchars($this->input->post('fullname', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 4,
                'is_active' => 0,
                'date_created' => time(),
                'image' => 'default.png'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda sudah terdaftar, Mohon tunggu konfirmasi lebih lanjut!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah Logout!</div>');
        redirect('auth');
    }

    public function block()
    {
        $this->load->view('auth/block');
    }
}