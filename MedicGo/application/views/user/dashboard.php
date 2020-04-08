<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('message') ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img" alt="Profile photo">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name'] ?></h5>
                            <p class="card-text"><?= $user['email'] ?></p>
                            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']) ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->