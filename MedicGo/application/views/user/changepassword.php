<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800 "><?= $title; ?></h1>
        </div>
    </div>

    <!-- // ! start coding the content here -->
    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('user/changePassword') ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger ">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">New password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger ">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Repeat password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger ">', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change password</button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->