<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function getRole()
    {
        $query = " SELECT `user` . *, `user_role` . `role`
                FROM `user` JOIN `user_role`
                ON `user` . `role_id` = `user_role` . `id`
                ORDER BY `name` ASC
                ";

        return $this->db->query($query)->result_array();
    }

    //delete user
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">User has been deleted!</div>');
    }
}