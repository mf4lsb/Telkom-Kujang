<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    /* DATEL, STO, ODC*/
    public function datel()
    {
        $data['title'] = 'Datel';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $data['datel'] = $this->db->get('tb_datel')->result_array();
        
        $this->form_validation->set_rules('datel', 'Datel', 'required|is_unique[tb_datel.nama_datel]', [
            'required' => 'Kolom "Nama Datel" wajib diisi!',
            'is_unique' => 'Datel tersebut sudah tersedia sebelumnya!'
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
            redirect('asman/datel');
        }
    }

    //edit live datel
    public function updatedatel()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->updateDatel($data, $this->input->post('id'));
    }

    public function deleteDatel()
    {
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->deleteDatel($this->input->post('id'));
    }

    //edit live odc
    public function updateodc()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->updateODC($data, $this->input->post('id'));
    }

    //delete odc
    public function deleteODC()
    {
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->deleteODC($this->input->post('id'), $this->input->post('img'));
    }
    
    //edit live sto
    public function updatesto()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->updateSTO($data, $this->input->post('id'));
    }
    
    public function sto()
    {
        $data['title'] = 'STO';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        
        $data['sto'] = $this->db->get('tb_sto')->result_array();
        
        //panggil model
        $this->load->model('Telkom_model', 'telkom');

        $data['getDatel'] = $this->telkom->getDatelforSTO();
    
        $this->form_validation->set_rules('sto', 'Nama STO', 'required|is_unique[tb_sto.nama_sto]', [
            'required' => 'Kolom "Nama STO" wajib diisi!',
            'is_unique' => 'Nama STO tersebut sudah tersedia sebelumnya!'
        ]);
        $this->form_validation->set_rules('kode', 'Kode STO', 'required|is_unique[tb_sto.kode_sto]', [
            'required' => 'Kolom "Kode STO" wajib diisi!',
            'is_unique' => 'Harap gunakan kode STO yang lain, karena kode tersebut sudah tersedia!'
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
                'datel_id' => 1
            ];
            $this->db->insert('tb_sto', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">STO baru ditambahkan!</div>');
            redirect('asman/sto');
        }
    }

    public function deleteSTO()
    {
        $this->load->model('Telkom_model', 'telkom');
        $this->telkom->deleteSTO($this->input->post('id'));
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
            $status = 1;
            $upload_image = $_FILES['image']['name'];
            if($upload_image)
            {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '6144';
                $config['upload_path'] = './assets/img/odc/';
            
                $this->load->library('upload', $config);
            
                if($this->upload->do_upload('image'))
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img', $new_image);
                    $status = 1;
                }
                else
                {
                    $status = 0;
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    //$error = array('error' => $this->upload->display_errors('<div class="alert alert-danger" role="alert">', '</div>'));
                    //$this->session->set_flashdata('message', $error['error']);
                    redirect('asman/odc');
                }
            }
            
            if($status == 1)
            {
                $data = [
                    'sto_id' => $this->input->post('sto'),
                    'kode_odc' => $this->input->post('odc'),
                    'alamat' => $this->input->post('alamat'),
                    'demands' => $this->input->post('homepass'),
                    'total_odp' => $this->input->post('odp'),
                    'port' => $this->input->post('port'),
                    'used' => $this->input->post('used'),
                    'available' => $this->input->post('sisa'),
                    'rsv' => $this->input->post('rsv'),
                    'area' => $this->input->post('area'),
                    'karakter' => $this->input->post('char'),
                    'tipe_rumah' => $this->input->post('rumah'),
                    'huni' => $this->input->post('huni'),
                    'daya_beli' => $this->input->post('beli'),
                    'tikor' => $this->input->post('tikor')
                ];
                $this->db->insert('tb_odc', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">ODC baru ditambahkan!</div>');
                redirect('asman/odc');
            }
        }
    }




    public function getPicture() //getpicture in img column (ODC page)
    {
        $this->load->model('Telkom_model', 'telkom');
        echo $this->telkom->getPicture($this->input->post('odc_id'));
    }




    public function editODC($id_odc) //edit ODC in ODC page
    {
        $data['title'] = 'Edit ODC';
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();

        //$data['odc'] = $this->db->get_where('tb_odc', ['id_odc' => $id_odc])->row_array();
        
        
        $this->load->model('Telkom_model', 'telkom');
        $data['sto'] = $this->telkom->getSTO();
        $data['getODC'] = $this->telkom->getSTOforODC($id_odc);

        $this->form_validation->set_rules('odc', 'Kode ODC', 'required', [
            'required' => 'Kolom "Kode ODC" wajib diisi!'
        ]);

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('asman/edit-odc', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            // $sto_id = $this->input->post('sto');
            // $kode_odc = $this->input->post('odc');
            // $alamat = $this->input->post('alamat');
            // $demands = $this->input->post('homepass');
            // $area = $this->input->post('area');
            // $karakter = $this->input->post('char');
            // $tipe_rumah = $this->input->post('rumah');
            // $huni = $this->input->post('huni');
            // $daya_beli = $this->input->post('beli');
            // $tikor = $this->input->post('tikor');


            //cek jika ada gambar yang akan diupload
            $status = 1;
            $upload_image = $_FILES['image']['name'];
            if($upload_image)
            {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '6144';
                $config['upload_path'] = './assets/img/odc/';
            
                $this->load->library('upload', $config);

                if($this->upload->do_upload('image'))
                {
                    $status = 1;
                    $old_image = $data['getODC']['img'];
                    if($old_image != 'default.jpg')
                    {
                        unlink(FCPATH . 'assets/img/odc/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img', $new_image);
                }
                else
                {
                    $status = 0;
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('asman/edit-odc');
                }
            }

            if($status == 1)
            {
                $update = [
                        'sto_id' => $this->input->post('sto'),
                        'kode_odc' => $this->input->post('odc'),
                        'alamat' => $this->input->post('alamat'),
                        'demands' => $this->input->post('homepass'),
                        'total_odp' => $this->input->post('odp'),
                        'port' => $this->input->post('port'),
                        'used' => $this->input->post('used'),
                        'available' => $this->input->post('sisa'),
                        'rsv' => $this->input->post('rsv'),
                        'area' => $this->input->post('area'),
                        'karakter' => $this->input->post('char'),
                        'tipe_rumah' => $this->input->post('rumah'),
                        'huni' => $this->input->post('huni'),
                        'daya_beli' => $this->input->post('beli'),
                        'tikor' => $this->input->post('tikor')
                ];

                // $this->db->set('sto_id', $sto_id);
                // $this->db->set('kode_odc', $kode_odc);
                // $this->db->set('alamat', $alamat);
                // $this->db->set('demands', $demands);
                // $this->db->set('area', $area);
                // $this->db->set('karakter', $karakter);
                // $this->db->set('tipe_rumah', $tipe_rumah);
                // $this->db->set('huni', $huni);
                // $this->db->set('daya_beli', $daya_beli);
                // $this->db->set('tikor', $tikor);
                
                $this->db->where('id_odc', $id_odc);
                $this->db->update('tb_odc', $update);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">ODC telah di update! Harap cek kembali!</div>');
                redirect('asman/odc');
            }
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
            $this->form_validation->set_message('checkData', 'Data telah ada sebelumnya di database!');
            return false;
        }
        else
        {
            return true;
        }
    }

}