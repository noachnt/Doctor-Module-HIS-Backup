<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800 "><?= $title; ?></h1>
        </div>
    </div>

    <!-- // ! start coding the content here -->
  <div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Patient ID</th>
          <th>Diagnoses</th>
          <th>Drug Name</th>
          <th>Date Issued</th>
          <th>Quantity</th>
          <th>Dosage</th>
          <th>Status</th>
        </tr>

          <?php

          if($fetch_data_patient->num_rows()>0)
          {
              foreach($fetch_data_patient->result() as $row)
              {

          ?>

              <tr>
                <td><p class="mb-0">P0<?php echo $row->patient_id; ?> </p></td>
                <td><?php echo $row->first_name; ?></td>
                <td><?php echo $row->last_name; ?></td>
                <td><?php echo $row->patient_id; ?></td>
                <td><?php echo $row->diagnoses; ?></td>
                <td><?php echo $row->drug_name; ?></td>
                <td><?php echo date('d F Y', $row->date_issued) ?></td>
                <td><?php echo $row->quantity; ?></td>
                <td><?php echo $row->dosage; ?></td>
                <td><?php echo $row->process_status; ?></td>
              <tr>

          <?php
              }

          }
          else
          {
          ?>
              <tr>
                  <td colspan="3"> No Data Found </td>
              <tr>


          <?php
          }
          ?>


    </table>
  </div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
