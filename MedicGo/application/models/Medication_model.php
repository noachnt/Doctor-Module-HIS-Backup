<?php

class Medication_model extends CI_Model
{

  function fetch_data()
  {
    $query = $this->db->get("view_prescription");
    return $query;
  }

  function update_data($data)
  {
    $this->db->where('patient_id', $this->input->post('patient_id'));
    $query = $this->db->update("patient", $data);
  }


  function fetch_data_drugs()
  {
    $query = $this->db->get("drugs");
    return $query;
  }

  function fetch_data_completed()
  {
    $query = $this->db->get("view_completed_prescription");
    return $query;
  }

  function fetch_data_patient()
  {
    $query = $this->db->get("patient");
    return $query;
  }


}
