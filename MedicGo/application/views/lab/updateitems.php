<!-- MAIN CONTENT -->
<div class="page-holder w-300 d-flex flex-wrap">
    <div class="container-fluid px-xl-5 px-xl-5 py-5 ">

        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-uppercase  mb-1">Update Items</h6>
                </div>
                <div class="card-body">
                    <!-- if form input error -->
                    <?= form_error('menu', '<div class="alert alert-danger" role=alert>', '</div>'); ?>
                    <!-- if form input sucess -->
                    <?= $this->session->flashdata('message'); ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $request['id'] ?>">
                        <div class="form-group">
                            <label for="last_modified">Date Requested</label>
                            <input type="text" class="form-control" id="last_modified" name="last_modified" value="<?= date('d F Y, h:iA', $request['last_modified']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Patient Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $request['item_name'] ?>" readonly>
                            <?= form_error('item_name', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="requestedby">Requested By</label>
                            <input type="text" class="form-control" id="requestedby" name="requestedby" value="<?= $user['name'] ?>" readonly>

                        </div>


                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input type="text" class="form-control" id="notes" name="notes" value="<?= $request['notes'] ?>">
                            <?= form_error('notes', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary float-right">Update request</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>