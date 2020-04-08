<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // for user cannot access the url directly if not login
        check_login();
    }

    public function index()

    {
        $data['title'] = "View Patient List";

        // get user session
        $this->load->model("Medication_model");
        $data["fetch_data_patient"] = $this->Medication_model->fetch_data_patient();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('patient/index', $data);
        $this->load->view('templates/footer');
    }
}
