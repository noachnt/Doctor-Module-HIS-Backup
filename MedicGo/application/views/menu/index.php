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
        <div class="col-lg-6">
            <!-- message if error -->
            <?= form_error('menu', '<div class="alert alert-danger" role="alert"> ', ' </div>') ?>

            <!-- message if success -->
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add new menu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu'] ?></td>
                            <td>
                                <a href="<?= base_url('menu/editmenu/') ?><?= $m['id'] ?> " class="badge badge-success">Edit</a>
                                <a href="<?= base_url('menu/delete/') ?><?= $m['id'] ?> " class="badge badge-danger" onclick=" return confirm('are you sure want to delete this menu ?')">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal add new menu-->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add new menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/addmenu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end of modal add new menu -->

<!-- modal edit menu -->

<!-- <div class="modal fade" id="updateMenuModal" tabindex="-1" role="dialog" aria-labelledby="updateMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMenuModalLabel">Update menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/editmenu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group"> -->
<!-- coba di sini set value id nya. tapi jangan dikasih liat -->
<!-- <input type="hidden" id="id" name="id"> -->
<!-- ======================================================= -->
<!-- <input type=" text" class="form-control" id="update" name="update" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- end of modal edit menu -->