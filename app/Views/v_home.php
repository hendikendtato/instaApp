<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?php
  use App\Models\Comment_Model;
  use App\Models\Likes_Model;
?>

<style>
label, button {
  background-color: transparent;
  color: #f1f1f1;
  display: inline-block;
  font-size: 3rem;
  height: 4rem;
  padding-left: 1.5rem;
  position: relative;
  width: 4rem;
}
#like:focus,
#like,
#like:focus {
  outline: none !important;
  border:  none !important;
  box-shadow: none !important;
}
#like[aria-pressed="true"],
#like:checked + label {
  color: red;
}

#like:hover:before, 
#like:focus:before {
  background-color: #f8f8f8;  
  border: solid 1px #aaa;
  border-radius: .5rem;
  color: #333;
  font-size: 1rem;
  line-height: 2;
  position: absolute;
  right: -2rem;
  left: -2rem;
  top: 4rem;
  bottom: -2rem;
  display: block;
  text-align: center;
  white-space: nowrap;
} 
</style>

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Selamat Datang, <?= session()->get('full_name') ?></h3>
            <p class="text-subtitle text-muted">Jelajahi sosial media bersama.</p>
        </div>
    </div>
</div>
  <div class="row">
    <div class="col-md-8">
      <section class="section">
        <?php
          foreach ($Posts as $post) {
          
          $this->commentModel = new Comment_Model();
          $this->likesModel = new Likes_Model();
          
          $comments = $this->commentModel->where('post_id', $post['id_post'])->countAllResults();
          $like = $this->likesModel->where('post_id', $post['id_post'])->where('user_id', session()->get('id_user'))->first();
          $likes = $this->likesModel->where('post_id', $post['id_post'])->countAllResults();
        ?>
          <div class="card">
            <div class="card-content">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div class="avatar avatar-md">
                          <img src="<?= base_url('assets/images/faces/1.jpg') ?>">
                      </div>
                      <h6 class="card-subtitle ms-3"> <?= $post['full_name'] ?></h6>
                  </div>
                </div>
                <img class="img-fluid w-100" src="<?= base_url('public/image_post/'.$post['image']) ?>" alt="Card image cap">
                  <input type="hidden" class="form-control" id="poster" name="poster" value="<?= $post['user_id'] ?>">
                  <?php
                    if(isset($like)){
                  ?>
                      <button id="like" name="<?= $post['id_post'] ?>" aria-pressed="true" onclick="togglePress(this)">❤</button>
                  <?php     
                    } else {
                  ?>
                    <button id="like" name="<?= $post['id_post'] ?>" aria-pressed="false" onclick="togglePress(this)">❤</button>
                  <?php     
                    }
                  ?>
                <div class="card-body">
                    <a href="" data-bs-toggle="modal" data-bs-target="#large">
                      <p class="card-text">
                        <?= $likes.' like' ?>
                      </p>
                    </a>
                    <p class="card-text">
                      <b><?= $post['username'] ?></b> <?= $post['caption'] ?>
                    </p>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal_comment_<?= $post['id_post'] ?>">
                      <p class="card-text">
                        <?= $comments.' komentar' ?>
                      </p>
                    </a>
                </div>
                <div class="card-footer" id="content-<?= $post['id_post'] ?>">
                  <input type="hidden" class="form-control" id="post_id" name="post_id" value="<?= $post['id_post'] ?>">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="comment" name="<?= $post['id_post'] ?>" placeholder="Beri komentar...." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-kirim"  onclick="myFunction(<?= $post['id_post'] ?>)">Kirim</button>
                  </div>
                </div>
            </div>
          </div>
        <?php           
          }
        ?>
      </section>
    </div>

    <div class="col-md-4">
      <div class="card">
          <div class="card-header">
              <h4>Teman Dekat</h4>
          </div>
          <div class="card-content pb-4">
              <div class="recent-message d-flex px-4 py-3">
                  <div class="avatar avatar-lg">
                      <img src="<?= base_url('assets/images/faces/4.jpg') ?>">
                  </div>
                  <div class="name ms-4">
                      <h5 class="mb-1">Hank Schrader</h5>
                      <h6 class="text-muted mb-0">@johnducky</h6>
                  </div>
              </div>
              <div class="recent-message d-flex px-4 py-3">
                  <div class="avatar avatar-lg">
                      <img src="<?= base_url('assets/images/faces/5.jpg') ?>">
                  </div>
                  <div class="name ms-4">
                      <h5 class="mb-1">Dean Winchester</h5>
                      <h6 class="text-muted mb-0">@imdean</h6>
                  </div>
              </div>
              <div class="recent-message d-flex px-4 py-3">
                  <div class="avatar avatar-lg">
                      <img src="<?= base_url('assets/images/faces/1.jpg') ?>">
                  </div>
                  <div class="name ms-4">
                      <h5 class="mb-1">John Dodol</h5>
                      <h6 class="text-muted mb-0">@dodoljohn</h6>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <?php
    foreach ($Posts as $post) {
    
    $listComments = $this->commentModel->join('users', 'comment.user_id = users.id')->where('comment.post_id', $post['id_post'])->findAll();
  ?>
  <!--large size Modal -->
  <div class="modal fade text-left" id="modal_comment_<?= $post['id_post'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
          <!-- <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel17"><?= $post['id_post'] ?></h4>
              <button type="button" class="close" data-bs-dismiss="modal"
                  aria-label="Close">
                  <i data-feather="x"></i>
              </button>
          </div> -->
          <div class="modal-body">
          <?php
            foreach ($listComments as $list) {
          ?>
            <div class="row mb-3">
              <div class="col-md-1 text-center">
                <div class="avatar avatar-md">
                    <img src="<?= base_url('assets/images/faces/1.jpg') ?>">
                </div>
              </div>
              <div class="col-md-11">
                <b class=""><?= $list['full_name'] ?></b> <?= $list['comment'] ?>
              </div>
            </div>
          <?php
            }
          ?>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-secondary"
                  data-bs-dismiss="modal">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Close</span>
              </button>
              <button type="button" class="btn btn-primary ml-1"
                  data-bs-dismiss="modal">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Accept</span>
              </button>
          </div>
      </div>
    </div>
  </div>
  <?php
    }
  ?>

  <script>
    
    function togglePress(e){
      const btn = e;
      const isPressed = btn.getAttribute("aria-pressed"); 

      var post_id = btn.getAttribute("name");
      var poster = $('#poster').val();

      if (isPressed == "false") {
        btn.setAttribute("aria-pressed", true);
        $.ajax({
          url: "<?= base_url('like'); ?>",
          type: "post",
          data: {post_id: post_id, poster:poster} ,
          success: function (response) {
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      } else {
        btn.setAttribute("aria-pressed", false);
        $.ajax({
          url: "<?= base_url('unlike'); ?>",
          type: "post",
          data: {post_id: post_id, poster:poster} ,
          success: function (response) {
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      }
    }

    function myFunction(b) {
      console.log(b);
      var post_id = b;
      var comment = $('input[name='+b+']').val();
      $.ajax({
          url: "<?= base_url('comment'); ?>",
          type: "post",
          data: {post_id: post_id, comment:comment} ,
          success: function (response) {
            $('input[name='+b+']').val("");
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }
      });
    }

  </script>

<?= $this->endSection() ?>