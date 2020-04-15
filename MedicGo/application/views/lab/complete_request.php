<script>
    function myFunction() {
        confirm("Are you sure with these changes");
    }
</script>
<!-- MAIN CONTENT -->
<div class="page-holder w-300 d-flex flex-wrap">
    <div class="container-fluid px-xl-5 px-xl-5 py-5 ">

        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-uppercase  mb-1">Complete Request</h6>
                </div>
                <div class="card-body">
                    <!-- if form input error -->
                    <?= form_error('menu', '<div class="alert alert-danger" role=alert>', '</div>'); ?>
                    <!-- if form input sucess -->
                    <?= $this->session->flashdata('message'); ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $request['id'] ?>">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $request['user_id'] ?>">
                        <input type="hidden" id="user_email" name="user_email" value="<?= $request['user_email'] ?>">
                        <div class="form-group">
                            <label for="last_modified">Date Requested</label>
                            <input type="text" class="form-control" id="last_modified" name="last_modified" value="<?= date('d F Y, h:iA', $request['last_modified']); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="item_name">Patient Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $request['item_name'] ?>" readonly>

                        </div>

                        <div class="form-group">
                            <label for="requestedby">Requested By</label>
                            <input type="text" class="form-control" id="requestedby" name="requestedby" value="<?= $user['name'] ?>" readonly>

                        </div>


                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input type="text" class="form-control" id="notes" name="notes" value="<?= $request['notes'] ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="symptoms">Symptoms</label>
                            <input type="text" class="form-control" id="symptoms" name="symptoms">
                            <?= form_error('symptoms', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="blood_type">Blood Type</label>
                            <select id="blood_type" id="blood_type" name="blood_type" placeholder="Blood Type">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                            <?= form_error('blood_type', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="blood_pressure">Blood Pressure</label>
                            <input type="text" class="form-control" id="blood_pressure" name="blood_pressure">
                            <?= form_error('blood_pressure', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="height">Height</label>
                            <input type="text" class="form-control" id="height" name="height">
                            <?= form_error('height', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight">
                            <?= form_error('weight', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="blood_glucose">Blood Glucose</label>
                            <input type="text" class="form-control" id="blood_glucose" name="blood_glucose">
                            <?= form_error('blood_glucose', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="allergies">Allergies</label>
                            <input type="text" class="form-control" id="allergies" name="allergies">
                            <?= form_error('allergies', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <button type="submit" name="insert" class="btn btn-primary float-right" onclick="myFunction()">Complete request</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>