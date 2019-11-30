<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function getProfile($id_user)
    {
        // $query = " SELECT `user` . *, `user_role` . `role`
        //         FROM `user` JOIN `user_role`
        //         ON `user` . `role_id` = `user_role` . `id`
        //         WHERE `user_role` . `id` = $role_id
        //         ";

        // return $this->db->query($query)->row_array();

        $query = "SELECT * FROM `user`
                JOIN `user_role` ON `user` . `role_id` = `user_role` . `id`
                WHERE `user` . `id` = $id_user
        ";
        return $this->db->query($query)->row_array();
    }
}