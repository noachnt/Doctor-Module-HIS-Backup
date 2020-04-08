<?php

function check_login()
{

    // instansiasi CI
    $ci = get_instance();

    // check user login
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        // get role_id user in session
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        // get menu_id
        $query = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $query['id'];


        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {

            redirect('auth/blocked');
        }
    }
}


function check_access($role_id, $menu_id)
{

    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');


    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
