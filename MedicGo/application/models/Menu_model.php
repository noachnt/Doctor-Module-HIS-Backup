<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = " SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getItemsById($id)
    {
        return $this->db->get_where('request', ['id' => $id])->row_array();
    }

    public function getAltItemsById($id)
    {
        return $this->db->get_where('request_radiology', ['id' => $id])->row_array();
    }

    public function getViewItemsById($id)
    {
        return $this->db->get_where('completed_requests', ['id' => $id])->row_array();
    }
    public function getAltViewItemsById($id)
    {
        return $this->db->get_where('completed_requests_radiology', ['id' => $id])->row_array();
    }

    public function updateitems()
    {
        $id = $this->input->post('id', true);
        $item_name = $this->input->post('item_name');
        $notes = $this->input->post('notes');

        $this->db->set('item_name', $item_name);
        $this->db->set('notes', $notes);
        $this->db->where('id', $id);
        $this->db->update('request');
    }

    public function view_request_detail()
    {
        $id = $this->input->post('id', true);
        $item_name = $this->input->post('item_name');
        $notes = $this->input->post('notes');
        $completed_on = $this->input->post('completed_on');
        $symptoms = $this->input->post('symptoms');
        $blood_type = $this->input->post('blood_type');
        $blood_pressure = $this->input->post('blood_pressure');
        $height = $this->input->post('height');
        $weight = $this->input->post('weight');
        $blood_glucose = $this->input->post('blood_glucose');
        $allergies = $this->input->post('allergies');
        $user_id = $this->input->post('user_id');
        $user_email = $this->input->post('user_email');

        $this->db->set('item_name', $item_name);
        $this->db->set('notes', $notes);
        $this->db->set('completed_on', $completed_on);
        $this->db->set('symptoms', $symptoms);
        $this->db->set('blood_type', $blood_type);
        $this->db->set('blood_pressure', $blood_pressure);
        $this->db->set('height', $height);
        $this->db->set('weight', $weight);
        $this->db->set('blood_glucose', $blood_glucose);
        $this->db->set('allergies', $allergies);
        $this->db->set('user_id', $user_id);
        $this->db->set('user_email', $user_email);
        $this->db->update('completed_requests');
        $this->db->where('id', $id);
    }

    public function view_request_radiology_detail()
    {
        $id = $this->input->post('id', true);
        $item_name = $this->input->post('item_name');
        $notes = $this->input->post('notes');
        $completed_on = $this->input->post('completed_on');
        $image = $this->input->post('image');
        $user_id = $this->input->post('user_id');
        $user_email = $this->input->post('user_email');

        $this->db->set('item_name', $item_name);
        $this->db->set('notes', $notes);
        $this->db->set('completed_on', $completed_on);
        $this->db->set('image', $image);
        $this->db->set('user_id', $user_id);
        $this->db->set('user_email', $user_email);
        $this->db->update('completed_requests');
        $this->db->where('id', $id);
    }


    public function complete_request_radiology()
    {
        $id = $this->input->post('id', true);
        $item_name = $this->input->post('item_name');
        $notes = $this->input->post('notes');
        $user_id = $this->input->post('user_id');
        $user_email = $this->input->post('user_email');


        $this->db->set('item_name', $item_name);
        $this->db->set('notes', $notes);
        $this->db->set('user_id', $user_id);
        $this->db->set('user_email', $user_email);
        $this->db->update('completed_requests_radiology');
        $this->db->where('id', $id);
        $this->db->delete('request_radiology');
    }

    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function updatesubmenu()
    {
        $id = $this->input->post('id', true);
        $title_submenu = $this->input->post('title_submenu');
        $menu_id = $this->input->post('menu_id');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');

        $this->db->set('title_submenu', $title_submenu);
        $this->db->set('menu_id', $menu_id);
        $this->db->set('url', $url);
        $this->db->set('icon', $icon);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
    }

    public function search_item($keyword)
    {
        $this->db->like('item_name', $keyword);
        // $this->db->or_like('type', $keyword);
        // $this->db->or_like('Category', $keyword);
        // $this->db->or_like('Location', $keyword);
        // $this->db->or_like('Vendor', $keyword);
        $query = $this->db->get('request');
        return $query->result_array();
    }

    public function getuseritems()
    {
        $user_name = $this->session->userdata('name');
        $query = "SELECT `user`.`id`
                FROM `user` JOIN `request`
                ON `user`.`id` = `request`.`user_id`
                WHERE `request`.`user_name` = $user_name
                ORDER BY `request`.`user_id` ASC
        ";

        return $this->db->query($query)->result_array();
    }

    public function getMenuById($id)
    {
        // $this->db->where('id', $id);
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }
}
