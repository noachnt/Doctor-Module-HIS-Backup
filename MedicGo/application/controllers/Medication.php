<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medication extends CI_Controller
{

  public function __construct()
  {
      parent::__construct();
      // for user cannot access the url directly if not login
      check_login();
  }

  public function requestcompleted()

  {
      $data['title'] = "View completed request";
      // get user session
      $this->load->model("Medication_model");
      $data["fetch_data_completed"] = $this->Medication_model->fetch_data_completed();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('medication/requestcompleted', $data);
      $this->load->view('templates/footer');
  }

  public function requestprescription()

  {
      $data['title'] = "Request new prescription";
      // get user session
      $this->load->model("Medication_model");
      $data["fetch_data_drugs"] = $this->Medication_model->fetch_data_drugs();
      $data["fetch_data_patient"] = $this->Medication_model->fetch_data_patient();
      $data["fetch_data_doctor"] = $this->Medication_model->fetch_data_doctor();


      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('medication/requestprescription', $data);
      $this->load->view('templates/footer');
  }

  public function form_validation()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules("patient_id", "Patient ID", 'required');
    $this->form_validation->set_rules("prescriber", "Prescriber", 'required');
    $this->form_validation->set_rules("diagnoses", "Diagnoses", 'required');
    $this->form_validation->set_rules("drug_name", "Drugs", 'required');
    $this->form_validation->set_rules("quantity", "Quantity", 'required');
    $this->form_validation->set_rules("dosage", "Dosage", 'required');

    if($this->form_validation->run())
    {
      $this->load->model("Medication_model");
      // $time = date('Y-m-d H:i:s');
      // $status = "on progress";
      $data = array(
        "prescriber"  =>$this->input->post("prescriber"),
        "diagnoses"  =>$this->input->post("diagnoses"),
        "drug_name"   =>$this->input->post("drug_name"),
        "quantity"   =>$this->input->post("quantity"),
        "dosage"     =>$this->input->post("dosage")
      );


      $time = time();
      $status = "on progress";
      $patientid = $this->input->post('patient_id');

      $this->db->set('date_issued', $time);
      $this->db->set('process_status', $status);

      $this->Medication_model->update_data($data, $patient_id);


      redirect(base_url() . "Medication/inserted");

    }
    else
    {
      $this->requestprescription();

    }
  }

  public function inserted()
  {
    $this->viewrequest();
  }

  public function viewrequest()

  {
      $data['title'] = "View request";
      // get user session
      $this->load->model("Medication_model");
      $data["fetch_data_patient"] = $this->Medication_model->fetch_data_patient();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('medication/viewrequest', $data);
      $this->load->view('templates/footer');
  }

}
