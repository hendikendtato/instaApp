<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<?php
    $session = session();
?>
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="d-flex px-4 py-3">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/faces/4.jpg') ?>">
                </div>
                <div class="name ms-4">
                    <h5 class="mb-1"><?= $session->get('full_name') ?></h5>
                    <h6 class="text-muted mb-0">@<?= $session->get('username') ?></h6>
                </div>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"></ul>
                <a href="post" class="btn px-3 py-2 fs-1">
                    <svg class="bi fs-1" width="5em" height="5em" fill="currentColor">
                        <use
                            xlink:href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.svg#plus-square') ?>" />
                    </svg>
                </a> 
            </div>
            <div class="bio px-4 py-3">
                Hendik Endtato Edison
            </div>  
            <a href="#" class="btn btn-outline-primary btn-block px-3 py-2">Edit Profile</a> 
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <?php
                    foreach($myPost AS $post){
                ?>
                    <div class="col-md-4 mb-4">
                        <img class="img-fluid w-100" src="<?= base_url('public/image_post/'.$post['image']) ?>" alt="Card image cap">
                    </div>
                <?php
                    }
                ?>
            </div>   
        </div>
    </div>
</section>

<?= $this->endSection() ?>