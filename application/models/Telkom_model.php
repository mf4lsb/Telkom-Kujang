<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telkom_model extends CI_Model
{
    public function getDatelforSTO() //STO page
    {
        $query = " SELECT `tb_sto` . *, `tb_datel` . `nama_datel`
                FROM `tb_sto` JOIN `tb_datel`
                ON `tb_sto` . `datel_id` = `tb_datel` . `id`
                ";

        return $this->db->query($query)->result_array();
    }

    public function getDatel()
    {
        $this->db->order_by('nama_datel', 'ASC');
        $query = $this->db->get('tb_datel');
        return $query->result();   
    }

    public function getSTO()
    {
        $this->db->order_by('nama_sto', 'ASC');
        $query = $this->db->get('tb_sto');
        return $query->result();   
    }


    /*public function getSTO($datel_id) //model for dependent dropdown datel-sto
    {
        $this->db->where('datel_id', $datel_id);
        $this->db->order_by('nama_sto', 'ASC');
        $query = $this->db->get('tb_sto');
        $output = '<option value="">Pilih STO</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->nama_sto.'</option>';
        }
        return $output;
    }*/

    public function getPicture($id_odc)
    {
        $data['odc'] = $this->db->get_where('tb_odc', ['id_odc' => $id_odc])->row_array();
        $output = 'button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
        $output = '<img src="'.base_url('assets/img/odc/') . $data['odc']['img'].'" class="imagepreview" style="width: 100%;">';
        return $output;
        
    }

    public function getODC($sto_id) //model for dependent dropdown sto-odc
    {
        $this->db->where('sto_id', $sto_id);
        $this->db->order_by('kode_odc', 'ASC');
        $query = $this->db->get('tb_odc');
        $output = '<option value="">Pilih ODC</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id_odc.'">'.$row->kode_odc.'</option>';
        }
        return $output;
    }

    public function getRADIO($port)
    {
        $output = '<label for="port" class="col-sm-12 pl-1">Port Terisi</label>';
        for($i = 1; $i <= $port; $i++)
        {
            if($i == 1 || $i == 5 || $i == 9 || $i == 13)
            {
                $output .= '<div class="row form-group pl-3 col-sm-12">';
            }
            $output .= '<div class="form-check form-check-inline col pl-4">';
            $output .= '<input class="form-check-input" type="radio" name="used" id="used" value="'.$i.'">';
            $output .= '<label class="form-check-label" for="inlineRadio1">'.$i.'</label>';
            $output .= '</div>';
            if($i == 4 || $i == 8 || $i == 12 || $i == 16)
            {
                $output .= '</div>';
            }
        }
        return $output;
    }


    public function getAllDataforAlpro($user_id) //ALPRO PAGE
    {
        $query = "SELECT * FROM `tb_alpro`
                JOIN `tb_user_access` ON `tb_alpro` . `sto_id` = `tb_user_access` . `sto_id`
                JOIN `tb_sto` ON `tb_alpro` . `sto_id` = `tb_sto` . `id`
                JOIN `tb_odc` ON `tb_alpro` . `odc_id` = `tb_odc` . `id_odc`
                JOIN `tb_competitor` ON `tb_alpro` . `competitor_id` = `tb_competitor` . `id`
                WHERE `tb_user_access` . `user_id` = $user_id
                ORDER BY `kode_odc` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getDataforODC($user_id) //ODC page
    {
        $query = "SELECT * FROM `tb_odc`
                JOIN `tb_user_access` ON `tb_odc` . `sto_id` = `tb_user_access` . `sto_id`
                JOIN `tb_sto` ON `tb_odc` . `sto_id` = `tb_sto` . `id`
                WHERE `tb_user_access` . `user_id` = $user_id
                ORDER BY `nama_sto`, `kode_odc` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getSTOforODC($odc_id) //edit ODC page
    {
        $query = "SELECT * FROM `tb_odc`
            JOIN `tb_sto` ON `tb_odc` . `sto_id` = `tb_sto` . `id`
            WHERE `tb_odc` . `id_odc` = $odc_id
        ";
        return $this->db->query($query)->row_array();
    }

    public function getDataforEditAlpro($id_alpro)
    {
        $query = "SELECT * FROM `tb_alpro`
                JOIN `tb_sto` ON `tb_alpro` . `sto_id` = `tb_sto` .`id`
                JOIN `tb_odc` ON `tb_alpro` . `odc_id` = `tb_odc` . `id_odc`
                WHERE `tb_alpro` . `id_alpro` = $id_alpro
        ";
        return $this->db->query($query)->row_array();
    }

    //edit live datel
    public function updateDatel($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_datel', $data);
    }

    //delete Datel
    public function deleteDatel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_datel');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Datel tersebut telah dihapus!</div>');
    }

    //edit live alpro
    public function updateAlpro($data, $id)
    {
        $this->db->where('id_alpro', $id);
        $this->db->update('tb_alpro', $data);
    }

    //delete Alpro
    public function deleteAlpro($id)
    {
        $this->db->where('id_alpro', $id);
        $this->db->delete('tb_alpro');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Alpro has been deleted!</div>');
    }
    
    //edit live odc
    public function updateODC($data, $id)
    {
        $this->db->where('id_odc', $id);
        $this->db->update('tb_odc', $data);
    }

    //delete ODC
    public function deleteODC($id, $img)
    {
        $this->db->where('id_odc', $id);
        if($img != 'default.jpg')
        {
            unlink(FCPATH . 'assets/img/odc/' . $img);
        }
        $this->db->delete('tb_odc');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">ODC has been deleted!</div>');
    }
    
    
    //edit live STO
    public function updateSTO($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_sto', $data);
    }

    //delete STO
    public function deleteSTO($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_sto');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">STO tersebut telah dihapus!</div>');
    }
    
    
    //edit live Competitor
    public function updateCompetitor($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_competitor', $data);
    }

    //delete Competitor
    public function deleteCompetitor($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_competitor');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Competitor tersebut telah dihapus!</div>');
    }

    /*public function getDatelforAlpro() //Alpro Page (DATEL)
    {
        $query = "SELECT `tb_alpro` . *, `tb_datel` . `nama_datel` . `id`
                FROM `tb_alpro` JOIN `tb_datel`
                ON `tb_alpro` . `datel_id` = `tb_datel` . `id`
                ";

        return $this->db->query($query)->result_array();
    }*/

    /*public function getSTOforAlpro() //Alpro Page (STO)
    {
        $query = "SELECT `tb_alpro` . *, `tb_sto` . `nama_sto`
                FROM `tb_alpro` JOIN `tb_sto`
                ON `tb_alpro` . `sto_id` = `tb_sto` . `id`
                ";

        return $this->db->query($query)->result_array();
    }*/
}
