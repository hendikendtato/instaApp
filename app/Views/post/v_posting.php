<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Posting</h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="<?= base_url('posting') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group with-title mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="caption" rows="5"></textarea>
                            <label>Masukkan caption</label>
                        </div>
                        <!-- File uploader with image preview -->
                        <div class="form-group">
                            <label for="image_upload">Image Upload</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" name="image_upload" id="image_upload">
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