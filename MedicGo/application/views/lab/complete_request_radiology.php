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
                        <input type="hidden" id="id" name="id" value="<?= $request_radiology['id'] ?>">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $request_radiology['user_id'] ?>">
                        <input type="hidden" id="user_email" name="user_email" value="<?= $request_radiology['user_email'] ?>">
                        <div class="form-group">
                            <label for="last_modified">Date Requested</label>
                            <input type="text" class="form-control" id="last_modified" name="last_modified" value="<?= date('d F Y, h:iA', $request_radiology['last_modified']); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="item_name">Patient Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $request_radiology['item_name'] ?>" readonly>

                        </div>

                        <div class="form-group">
                            <label for="requestedby">Requested By</label>
                            <input type="text" class="form-control" id="requestedby" name="requestedby" value="<?= $user['name'] ?>" readonly>

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/lab/') . $request_radiology['image']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="lab_image" name="lab_image">
                                            <label class="custom-file-label" for="lab_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input type="text" class="form-control" id="notes" name="notes" value="<?= $request_radiology['notes'] ?>">

                        </div>

                        <button type="submit" name="insert" class="btn btn-primary float-right">Complete request</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>