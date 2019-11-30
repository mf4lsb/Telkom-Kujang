<?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('username'))
    {
        redirect('auth');
    }
    else{
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        // if($menu == 'user' && $role_id == 2)
        // {
        //     $role = 'Asman Sales & Cust. Care';
        // }
        // else if($menu == 'asman' && $role_id == 2)
        // {
        //     $role = 'Asman Sales & Cust. Care';
        // }
        // else if($menu == 'asman' && $role_id == 3)
        // {
        //     $role = 'Asman Sales & Cust. Care';
        // }
        // else if($menu == 'user' && $role_id == 3)
        // {
        //     $role = 'Kepala Usaha dan Bisnis';
        // }
        // else if($menu == 'admin' && $role_id == 1) //admin
        // {
        //     $role = 'Admin';
        // }
        // else if($menu == 'user' && $role_id == 1)
        // {
        //     $role = 'Kepala Usaha dan Bisnis';
        // }
        // else if($menu == 'asman' && $role_id == 1)
        // {
        //     $role = 'Asman Sales & Cust. Care';
        // }
        // else{
        //     $role = $menu;
        // }
        if($menu == 'admin')
        {
            $role = 'Admin';
        }
        else if($menu == 'asman')
        {
            $role = 'Asman Sales & Cust. Care';
        }
        else if($menu == 'user')
        {
            $role = 'Kepala Usaha dan Bisnis';
        }
        else
        {
            $role = $menu;
        }
        //echo $role;die;

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $role])->row_array();
        $menu_id = $queryMenu['id'];
        

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id, 
            'menu_id' => $menu_id
            ]);
            

            if($userAccess->num_rows() < 1){
                redirect('auth/block');
            }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if($result->num_rows() > 0)
    {
        return "checked = 'checked'";
    }
}

function check_access_role($username)
{
    $ci = get_instance();

    $result = $ci->db->get_where('user', [
        'username'      => $username,
        'is_active !=' => 0
    ]);

    /*kalo mau cek isi, ini syntax -nya
    return $result->num_rows();
    */
    
    if($result->num_rows() > 0)
    {
        return "checked = 'checked'";
    }
}



function user_access($id_user, $id_sto) //user access in role user page
{
    $ci = get_instance();

    $ci->db->where('user_id', $id_user);
    $ci->db->where('sto_id', $id_sto);
    $result = $ci->db->get('tb_user_access');

    if($result->num_rows() > 0)
    {
        return "checked = 'checked'";
    }
}