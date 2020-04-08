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

            <!-- message if success -->
            <?= $this->session->flashdata('message') ?>
            <form class="user" method="post" action="<?= base_url('admin/editrole/') ?><?= $role_byid['id']; ?>">
                <input type="hidden" name="id" value="<?= $role_byid['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control  " id="role" name="role" value="<?= $role_byid['role']; ?>">
                    <?= form_error('menu', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
                <a href="<?= base_url('admin/role') ?>" class="btn btn-secondary ">
                    Back to role management
                </a>
                <button type="submit" class="btn btn-info ">
                    Update role
                </button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->