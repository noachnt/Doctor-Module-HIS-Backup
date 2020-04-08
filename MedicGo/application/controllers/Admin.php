<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // for user cannot access the url directly if not login
        check_login();
    }

    public function index()

    {
        $data['title'] = "Dashboard";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()

    {
        $data['title'] = "Role";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function addrole()
    {

        $data['title'] = "Role";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query data dr table user_menu
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            // if success add new menu data
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Role added succesfully! </div>');
            redirect('admin/role');
        }
    }

    public function editrole($id)
    {
        $data['title'] = "Edit role";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get menubyid
        $data['role_byid'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

        // $menu_byid = $this->db->get_where('user_menu');

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editrole', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Role updated succesfully! </div>');
            redirect('admin/role');
        }
    }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Role delete succesfully! </div>');
        redirect('admin/role');
    }

    public function roleaccess($role_id)

    {
        $data['title'] = "Role Access";
        // get user session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get specific role access from table user_role
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        //hide admin access
        $this->db->where('id !=', 1);
        // get all the menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }


    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        // jika tidak ada data di table, insert data ke table user_access_menu 
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access changed!</div>');
        } else {
            // jika ada di table user_access_menu, didelete
            $this->db->delete('user_access_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Access removed!</div>');
        }
    }
}
