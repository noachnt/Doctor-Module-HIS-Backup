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
                        <input type="hidden" name="id" value="<?= $completed_requests_radiology['id'] ?>">
                        <div class="form-group">
                            <label for="completed_on">Date Completed</label>
                            <input type="text" class="form-control" id="completed_on" name="completed_on" value="<?= date('d F Y, h:iA', $completed_requests_radiology['completed_on']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Patient Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $completed_requests_radiology['item_name'] ?>" readonly>

                        </div>

                        <div class="form-group">
                            <label for="requestedby">Requested By</label>
                            <input type="text" class="form-control" id="requestedby" name="requestedby" value="<?= $user['name'] ?>" readonly>

                        </div>


                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input type="text" class="form-control" id="notes" name="notes" value="<?= $completed_requests_radiology['notes'] ?>" readonly>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/lab/') . $completed_requests_radiology['image']; ?>" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>