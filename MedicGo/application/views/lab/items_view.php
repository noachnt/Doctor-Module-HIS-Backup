<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- Topbar Search -->
    <div class="row">
        <div class="col-md-4">
            <form action="<?= base_url('user/searchitems') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search items..." id="keyword" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit" value="submit">
                    </div>
                </div>
                <?= form_error('keyword', '<small class="text-danger pl-3">', '</small>') ?>
            </form>
        </div>
    </div>

    <!-- Topbar Navbar -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Item List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Vendor</th>
                            <th>Quantity</th>
                            <th>last Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $i = 1; ?>
                            <?php foreach ($results as $r) : ?>
                                <th scope="row"><?= $i; ?></th>
                                <td>IT00<?= $r['id'] ?></td>
                                <td><?= $r['item_name'] ?></td>
                                <td><?= $r['type'] ?></td>
                                <td><?= $r['category'] ?></td>
                                <td><?= $r['location'] ?></td>
                                <td><?= $r['vendor'] ?></td>
                                <td><?= $r['quantity'] ?></td>
                                <td><?= date('d F Y, h:iA', $r['last_modified']); ?></td>
                                <td>
                                    <!-- // TODO: buat tombol edit work -->
                                    <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a> -->
                                    <a href="<?= base_url('user/updateitems/') ?><?= $r['id'] ?>" class="badge badge-success">Edit</a>
                                    <a href="<?= base_url('user/deleteitems/') ?><?= $r['id'] ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete?');">Delete</a>
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
                <h5 class="modal-title" id="newItemModalLabel">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- input menu -->
            <form action="<?= base_url('lab/request'); ?>" method="post">
                <input type="hidden" id="user_id" name="user_id" value="<?= $user['id'] ?>">
                <!-- method="post", biar tidak ada di url -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item name">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="type" name="type" placeholder="Item Type">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="vendor" name="vendor" placeholder="Vendor name">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="user_email" name="user_email" value="<?= $user['email'] ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('lab/request') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add new item</button>
                </div>
            </form>
            <!-- end of input menu -->
        </div>
    </div>
</div>