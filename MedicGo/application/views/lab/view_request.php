<!-- MAIN CONTENT -->
<div class="page-holder w-300 d-flex flex-wrap">
    <div class="container-fluid px-xl-5 px-xl-5 py-5 ">

        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-uppercase  mb-1">View Request</h6>
                </div>
                <div class="card-body">
                    <!-- if form input error -->
                    <?= form_error('menu', '<div class="alert alert-danger" role=alert>', '</div>'); ?>
                    <!-- if form input sucess -->
                    <?= $this->session->flashdata('message'); ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $completed_requests['id'] ?>">
                        <div class="form-group">
                            <label for="completed_on">Date Completed</label>
                            <input type="text" class="form-control" id="completed_on" name="completed_on" value="<?= date('d F Y, h:iA', $completed_requests['completed_on']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Patient Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $completed_requests['item_name'] ?>" readonly>

                        </div>

                        <div class="form-group">
                            <label for="requestedby">Requested By</label>
                            <input type="text" class="form-control" id="requestedby" name="requestedby" value="<?= $user['name'] ?>" readonly>

                        </div>


                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input type="text" class="form-control" id="notes" name="notes" value="<?= $completed_requests['notes'] ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="symptoms">Symptoms</label>
                            <input type="text" class="form-control" id="symptoms" name="symptoms" value="<?= $completed_requests['symptoms'] ?>" readonly>
                            <?= form_error('symptoms', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="blood_type">Blood Type</label>
                            <input type="text" class="form-control" id="blood_type" name="blood_type" value="<?= $completed_requests['blood_type'] ?>" readonly>
                            </select>
                            <?= form_error('blood_type', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="blood_pressure">Blood Pressure</label>
                            <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" value="<?= $completed_requests['blood_pressure'] ?>" readonly>
                            <?= form_error('blood_pressure', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class=" form-group">
                            <label for="height">Height</label>
                            <input type="text" class="form-control" id="height" name="height" value="<?= $completed_requests['height'] ?>" readonly>
                            <?= form_error('height', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class=" form-group">
                            <label for="weight">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="<?= $completed_requests['weight'] ?>" readonly>
                            <?= form_error('weight', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class=" form-group">
                            <label for="blood_glucose">Blood Glucose</label>
                            <input type="text" class="form-control" id="blood_glucose" name="blood_glucose" value="<?= $completed_requests['blood_glucose'] ?>" readonly>
                            <?= form_error('blood_glucose', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class=" form-group">
                            <label for="allergies">Allergies</label>
                            <input type="text" class="form-control" id="allergies" name="allergies" value="<?= $completed_requests['allergies'] ?>" readonly>
                            <?= form_error('allergies', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>