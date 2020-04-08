<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-3">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800 "><?= $title; ?></h1>
        </div>
    </div>

    <!-- // ! start coding the content here -->

    <div class="row">
        <div class="col-lg-6">

            <!-- message if success -->
            <?= $this->session->flashdata('message') ?>
            <form class="user" method="post" action="<?= base_url('menu/editsubmenu/') . $submenu_byid['id'] ?>">
                <input type="hidden" name="id" value="<?= $submenu_byid['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $submenu_byid['title']; ?>">
                </div>
                <div class="form-group">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Select Menu</option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $submenu_byid['url']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu_byid['icon']; ?>">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Active?
                        </label>
                    </div>
                </div>
                <a href="<?= base_url('menu/submenu') ?>" class="btn btn-secondary mt-2">
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