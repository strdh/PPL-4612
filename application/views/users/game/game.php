<br>
<main>
    <div class="container">
        <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php if ($game->cover == NULL) : ?>
                        <img src="<?php echo base_url("asset/src/images/dummy.jpg") ?>" alt="Admin" class="rounded-circle" width="150">
                    <?php else : ?>
                        <img src="<?php echo base_url("asset/src/images/").$game->cover ?>" alt="Admin" class="" width="300">
                    <?php endif ?>
                    <div class="mt-3">
                      <h4></h4>
                      <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Judul</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $game->title ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Publisher</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $game->name ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal Rilis</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $game->release_date ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Kategori</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                          $arr = explode(" ", $game->categories);
                          foreach ($arr as $a) :
                      ?>
                          <span class="badge bg-success"><?php echo $a ?></span>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Difficulty</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $game->difficulty ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Rating umur</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $game->rating_age ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Rating</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $game->ratings ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                  
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <a href="" class="btn btn-primary">Mainkan</a>
                      <a href="" class="btn btn-primary">Kunjungi Forum</a>
                      <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalrating">Beri Rating</a>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Daftar Pemain</h6>
                
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Daftar Rating</h6>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="modalrating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Beri Rating</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <img src="<?php echo base_url("asset/src/images/s1.png") ?>" alt="">&nbsp;<a href="" class="btn btn-sm btn-success">Pilih</a><br>
                      <img src="<?php echo base_url("asset/src/images/s2.png") ?>" alt="">&nbsp;<a href="" class="btn btn-sm btn-success">Pilih</a><br>
                      <img src="<?php echo base_url("asset/src/images/s3.png") ?>" alt="">&nbsp;<a href="" class="btn btn-sm btn-success">Pilih</a><br>
                      <img src="<?php echo base_url("asset/src/images/s4.png") ?>" alt="">&nbsp;<a href="" class="btn btn-sm btn-success">Pilih</a><br>
                      <img src="<?php echo base_url("asset/src/images/s5.png") ?>" alt="">&nbsp;<a href="" class="btn btn-sm btn-success">Pilih</a><br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</main>