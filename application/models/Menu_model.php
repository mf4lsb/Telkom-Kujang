<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = " SELECT `user_sub_menu` . *, `user_menu` . `menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu` . `menu_id` = `user_menu` . `id`
                ";

        return $this->db->query($query)->result_array();
    }

    //edit live sub menu
    public function updateSubMenu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }

    //delete sub menu
    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Sub Menu tersebut telah dihapus!</div>');
    }
}