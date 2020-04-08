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
        <div class="col-lg-5 ">
            <!-- message if success -->
            <?= $this->session->flashdata('message') ?>
            <form class="user" method="post" action="<?= base_url('menu/editmenu/') ?><?= $menu_byid['id']; ?>">
                <input type="hidden" name="id" value="<?= $menu_byid['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control  " id="menu" name="menu" value="<?= $menu_byid['menu']; ?>">
                    <?= form_error('menu', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
                <a href="<?= base_url('menu') ?>" class="btn btn-secondary mt-2">
                    Back to menu management
                </a>
                <button type="submit" class="btn btn-info mt-2">
                    Update menu
                </button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->