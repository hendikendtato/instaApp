<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Profile</h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="<?= base_url('saveProfile') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="full_name">Nama Lengkap</label>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="full_name" id="full_name" value="<?= $profile['full_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="username" id="username" value="<?= $profile['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group with-title mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="bio" rows="3"><?= $profile['bio'] ?></textarea>
                            <label>Bio</label>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="custom-file">
                                <input type="text" class="form-control" name="email" id="email" value="<?= $profile['email'] ?>">
                            </div>
                        </div>
                        <!-- File uploader with image preview -->
                        <div class="form-group">
                            <label for="profile_pict">Foto Profil</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" name="profile_pict" id="profile_pictt">
                            </div>
                        </div>
                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1">Post</button>
                            <button type="reset" class="btn btn-light-primary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>