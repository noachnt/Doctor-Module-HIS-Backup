<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- Topbar Search -->
    <div class="row">
        <div class="col-md-4">
            <form action="<?= base_url('user/searchitems') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search requests..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit" value="Search">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Topbar Navbar -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pending Requests</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- if error in form input -->
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <!-- if success -->
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newItemModal">Add new request</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date Requested</th>
                            <th>Patient Name</th>
                            <th>Requested By</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i = 1; ?>
                            <?php foreach ($test as $it) : ?>
                                <td><?= date('d F Y, h:iA', $it['last_modified']); ?></td>
                                <td><?= $it['item_name'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $it['notes'] ?></td>
                                <td>
                                    <!-- // TODO: buat tombol edit work -->
                                    <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a> -->
                                    <a href="<?= base_url('lab/complete_request_radiology/') ?><?= $it['id'] ?>" class="badge badge-primary">Complete</a>
                                    <a href="<?= base_url('lab/updateitems/') ?><?= $it['id'] ?>" class="badge badge-success">Edit</a>
                                    <a href="<?= base_url('lab/deleteitems/') ?><?= $it['id'] ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete?');">Delete</a>
                                </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- newItemModal -->
<div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newItemModalLabel">Add a new request..</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- input menu -->
            <form action="<?= base_url('lab/request_radiology'); ?>" method="post">
                <input type="hidden" id="user_id" name="user_id" value="<?= $user['id'] ?>">
                <!-- method="post", biar tidak ada di url -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Patient name">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="notes" name="notes" placeholder="Notes">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="user_email" name="user_email" value="<?= $user['email'] ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add new request</button>
                </div>
            </form>
            <!-- end of input menu -->
        </div>
    </div>
</div>