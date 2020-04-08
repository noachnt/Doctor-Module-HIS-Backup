<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    // ! lanjut access management

    public function __construct()
    {
        parent::__construct();
        // for user cannot access the url directly if not login
        check_login();
    }
    public function index()

    {
        $data['title'] = "Menu Management";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query data dr table user_menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function addmenu()
    {

        $data['title'] = "Menu Management";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query data dr table user_menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            // if success add new menu data
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu added succesfully! </div>');
            redirect('menu');
        }
    }

    public function editmenu($id)
    {
        $data['title'] = "Edit menu";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get menubyid
        $data['menu_byid'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        // $menu_byid = $this->db->get_where('user_menu');

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu updated succesfully! </div>');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Menu delete succesfully! </div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = "Submenu management";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();

        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Submenu added succesfully! </div>');
            redirect('menu/submenu');
        }
    }


    public function editsubmenu($id)
    {
        $data['title'] = "Edit Sub menu";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get menubyid
        $data['submenu_byid'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();


        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        // ! is_active not handle yet

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu updated succesfully! </div>');
            redirect('menu/submenu');
        }
    }

    public function deletesubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Submenu delete succesfully! </div>');
        redirect('menu/submenu');
    }
}
