<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Kolom MENU wajib diisi!'
        ]);


        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        //panggil model
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Kolom "Sub Menu Name" wajib diisi!'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Kolom "Menu" wajib diisi!'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'Kolom "Sub MenuURL" wajib diisi!'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', [
            'required' => 'Kolom "Sub Menu Icon" wajib diisi!'
        ]);

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        }
        else{
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub menu added!</div>');
            redirect('menu/submenu');
        }


    }

    public function updateSubMenu()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->load->model('Menu_model', 'menu');
        $this->menu->updateSubMenu($data, $this->input->post('id'));
    }

    //delete sub menu
    public function deleteSubMenu()
    {
        $this->load->model('Menu_model', 'menu');
        $this->menu->deleteSubMenu($this->input->post('id'));
    }
}