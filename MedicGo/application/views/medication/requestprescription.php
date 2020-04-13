<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800 "><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
    </div>

    <!-- // ! start coding the content here -->
    <div class="container-fluid">

      <!-- Page Heading -->


      <!-- Content Row -->
      <div class="row">
        <div class="col">
          <form method="post" action="<?php echo base_url()?>Medication/form_validation">
            <div class="form-group">
              <label for="exampleFormControlSelect1">PatientID</label>
              <select class="form-control" id="patient_id" name="patient_id">
                <?php foreach($fetch_data_patient->result() as $fdp) : ?>
                <option value="<?php echo $fdp->patient_id ?>"><?php echo $fdp->patient_id?></option>
              <?php endforeach; ?>
              </select>
              <span class ="text-danger"> <?php echo form_error("patient_id"); ?> </span>

            </div>

            <br>
            <label>Prescriber</label>
            <select class="form-control" name="prescriber">
            <?php

            foreach($fetch_data_doctor->result() as $row)
            {
              $fullname = $row->first_name."-".$row->last_name;
              echo '<option value="'.$fullname.'">'.$fullname.'</option>';
            }
            ?>
            </select>
            <span class ="text-danger"> <?php echo form_error("drug_name"); ?> </span>

            <br>
            <br>
            <br>

            <div class="form-group">
              <label for="diagnoses">Diagoses</label>
              <textarea type="text" class="form-control" id="diagnoses" name="diagnoses">
              </textarea>
              <span class ="text-danger"> <?php echo form_error("diagnoses"); ?> </span>

            </div>


            <label>Drug(s)</label>
            <select class="form-control" name="drug_name">
            <?php

            foreach($fetch_data_drugs->result() as $row)
            {
              echo '<option value="'.$row->drug_name.'">'.$row->drug_name.'</option>';
            }
            ?>
            </select>
            <span class ="text-danger"> <?php echo form_error("drug_name"); ?> </span>

            <br>
            <br>
            <br>

            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" name="quantity">
            </div>
            <span class ="text-danger"> <?php echo form_error("quantity"); ?> </span>

            <div class="form-group">
              <label for="dosage">Dosage</label>
              <input type="text" name="dosage">
              <span class ="text-danger"> <?php echo form_error("dosage"); ?> </span>

            </div>

            <input class="btn btn-primary rounded" type="submit" name="insert" value="Insert">
        </form>

        </div>

      </div>
    </div>


</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
