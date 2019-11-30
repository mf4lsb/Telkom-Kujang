<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        // $data['title'] = 'User Dashboard';
        // $data['user'] = $this->db->get_where('user', ['username' => 
        // $this->session->userdata('username')])->row_array();
        
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('user/index', $data);
        // $this->load->view('templates/footer');
        redirect('user/profile');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        //panggil model
        $this->load->model('Profile_model', 'profile');
        
        $data['profile'] = $this->profile->getProfile($data['user']['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();

        $this->load->model('Profile_model', 'profile');
        
        $data['profile'] = $this->profile->getProfile($data['user']['role_id']);

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim', [
            'required' => 'Kolom FULL NAME wajib diisi!'
        ]);
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        }
        else{
            $name = $this->input->post('name');
            $username = $this->input->post('username');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            
            if($upload_image)
            {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '6144';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image'))
                {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.png')
                    {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user/profile');
                }
                
            }

            $this->db->set('name', $name);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda telah di update!</div>');
            redirect('user/profile');
        }
        
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim',[
            'required' => 'Kolom ini harus diisi!'
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]', [
            'required' => 'Kolom ini harus diisi!',
            'min_length' => 'Password harus lebih dari 8 karakter!',
            'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]', [
            'required' => 'Kolom ini harus diisi!',
            'min_length' => 'Password harus lebih dari 8 karakter!'
        ]);

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password']))
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
                redirect('user/changepassword');
            }
            else
            {
                if($current_password == $new_password)
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak boleh sama dengan Password Lama!</div>');
                    redirect('user/changepassword');
                }
                else
                {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil dirubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function alpro()
    {
        //panggil model
        $data['title'] = 'Pengelolaan Demands Kujang';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        //$data['alpro'] = $this->db->get('tb_alpro')->result_array();
        //$data['datel'] = $this->db->get('tb_datel')->result_array();
        //$data['sto'] = $this->db->get('tb_sto')->result_array();
        
        $data['odc'] = $this->db->get('tb_odc')->result_array();
        $this->load->model('Telkom_model', 'telkom');
        //$data['datel'] = $this->telkom->getDatel();
        $data['sto'] = $this->telkom->getSTO();
        $data['competitor'] = $this->db->get('tb_competitor')->result_array();

        $data['getAllData'] = $this->telkom->getAllDataforAlpro($data['user']['id']); //view
        //$data['getDatel'] = $this->telkom->getDatelforAlpro();
        //$data['getSTO'] = $this->telkom->getSTOforAlpro();
        //$data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('odp', 'ODP', 'required|callback_checkData');
        $this->form_validation->set_rules('sto', 'STO', 'required');
        $this->form_validation->set_rules('odc', 'ODC', 'required');
        $this->form_validation->set_rules('port', 'Port', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/alpro', $data);
            $this->load->view('templates/footer');
        }
        else{
            if($this->input->post('competitor'))
            {
                $array = implode(",", $this->input->post('competitor'));
            }
            else
            {
                $array = 9;
            }

            if($this->input->post('used'))
            {
                $used_odp = $this->input->post('used');
            }
            else
            {
                $used_odp = 0;
            }

            $date = date('Y-m-d', strtotime($this->input->post('date')));
            $data = [
                'sto_id' => $this->input->post('sto'),
                'nama' => $this->input->post('jenis'),
                'cluster' => $this->input->post('cluster'),
                'alamat_odp' => $this->input->post('alamat'),
                'kelurahan' => $this->input->post('kelurahan'),
                'odc_id' => $this->input->post('odc'),
                'nama_odp' => $this->input->post('odp'),
                'port_odp' => $this->input->post('port'),
                'used_odp' => $used_odp,
                'date_live' => $date,
                'modul' => $this->input->post('modul'),
                'type' => $this->input->post('type'),
                'power' => $this->input->post('power'),
                'karakter_odp' => $this->input->post('char'),
                'competitor_id' => $array,
                'tikor' => $this->input->post('tikor')
            ];
            $this->db->insert('tb_alpro', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Alpro Baru Ditambahkan!</div>');
            redirect('user/alpro');
        }
    }

    //check double data in tb_alpro
    public function checkData($fieldODP)
    {
        $fieldSTO = $this->input->post('sto');
        $fieldODC = $this->input->post('odc');
        $this->db->where('sto_id', $fieldSTO);
        $this->db->where('odc_id', $fieldODC);
        $this->db->where('nama_odp', $fieldODP);
        $result = $this->db->get('tb_alpro');
        if($result->num_rows() >= 1)
        {
            $this->form_validation->set_message('checkData', 'Data telah ada sebelumnya di database!');
            return false;
        }
        else
        {
            return true;
        }
    }


    public function editAlpro($id_alpro)
    {
        $data['title'] = 'Edit Alpro';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $this->load->model('Telkom_model', 'telkom');
        $data['sto'] = $this->telkom->getSTO();
        $data['getDataAlpro'] = $this->telkom->getDataforEditAlpro($id_alpro);
        $data['odc'] = $this->db->get('tb_odc')->result_array();
        $data['competitor'] = $this->db->get('tb_competitor')->result_array();

        $this->form_validation->set_rules('odp', 'ODP', 'required');
        $this->form_validation->set_rules('sto', 'STO', 'required');
        $this->form_validation->set_rules('odc', 'ODC', 'required');
        $this->form_validation->set_rules('used', 'Port Used', 'required|callback_checkPort[port_edit]');

        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Harap diperhatikan, STO dan ODC harus dipilih ulang!</div>');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit-alpro', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $array = implode(",", $this->input->post('competitor'));
            $date = date('Y-m-d', strtotime($this->input->post('date')));
            $update = [
                    'sto_id' => $this->input->post('sto'),
                    'nama' => $this->input->post('jenis'),
                    'cluster' => $this->input->post('cluster'),
                    'alamat_odp' => $this->input->post('alamat'),
                    'kelurahan' => $this->input->post('kelurahan'),
                    'odc_id' => $this->input->post('odc'),
                    'nama_odp' => $this->input->post('odp'),
                    'port_odp' => $this->input->post('port_edit'),
                    'used_odp' => $this->input->post('used'),
                    'date_live' => $date,
                    'modul' => $this->input->post('modul'),
                    'type' => $this->input->post('type'),
                    'power' => $this->input->post('power'),
                    'karakter_odp' => $this->input->post('char'),
                    'competitor_id' => $array,
                    'tikor' => $this->input->post('tikor')
            ];

            $this->db->where('id_alpro', $id_alpro);
            $this->db->update('tb_alpro', $update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Alpro telah di update! Harap cek kembali!</div>');
            redirect('user/alpro');
        }
    }

    public function checkPort($fieldUsed, $fieldPort) //check used
    {
        $fieldPort = $this->input->post($fieldPort);
        if($fieldPort < $fieldUsed)
        {
            $this->form_validation->set_message('checkPort', 'Port Used 
            must not be greater than Port ODP');
            return false;
        }
        else
        {
            true;
        }
    }

    public function updateAlpro()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->updateAlpro($data, $this->input->post('id'));
    }

    //delete alpro table by id
    public function deleteAlpro()
    {
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->deleteAlpro($this->input->post('id'));
    }

    /*public function getSTO() //getSTO for dependet dropdown alpro
    {
        if($this->input->post('datel_id'))
        {
            $this->load->model('Telkom_model', 'telkom');
            echo $this->telkom->getSTO($this->input->post('datel_id'));
        }
    }*/

    public function getODC() //getODC for dependet dropdown alpro
    {
        if($this->input->post('sto_id')) //sto_id diambil dari 'name' jquery pada ajax ***
        {
            $this->load->model('Telkom_model', 'telkom');
            echo $this->telkom->getODC($this->input->post('sto_id'));
        }
    }

    public function getRADIO()
    {
        if($this->input->post('port'))
        {
            $this->load->model('Telkom_model', 'telkom');
            echo $this->telkom->getRADIO($this->input->post('port'));
        }
    }

}


// sto (sto) [sto_id]
// name (jenis) [nama]
// cluster (cluster) [cluster]
// address (alamat) [alamat_odp]
// kelurahan (kelurahan) [kelurahan]
// odc (odc) [odc_id]
// ODP (odp) [nama_odp]
// port (port) [port_odp]
// used (used) [used_odp]
// go live (date) [date_live]
// modul (modul) [modul]
// hh type (type) [type]
// purchasing power (power) [power] //daya beli
// characteristic (char) [karakter_odp]
// competitor (competitor) [competitor_id]
// coordinate (tikor) [tikor]

// sto_id -> nama -> cluster -> alamat -> kelurahan -> odc_id -> nama_odp -> port_odp -> used -> date_live -> modul-> type -> power -> karakter -> competitor -> tikor
