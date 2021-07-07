<br>
<main>
    <div class="container">
        <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php if ($user->avatar == NULL) : ?>
                        <img src="<?php echo base_url("asset/src/images/user.png") ?>" alt="Admin" class="rounded-circle" width="150">
                    <?php else : ?>
                        <img src="<?php echo base_url("asset/src/images/").$user->avatar ?>" alt="Admin" class="rounded-circle" width="150">
                    <?php endif ?>
                    <div class="mt-3">
                      <h4><?php echo $user->username ?></h4>
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
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user->name ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user->email ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user->username ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <?php if ($this->session->userdata("id") == $user->id): ?>
                      <div class="col-sm-12">
                        <a class="btn btn-info "  href="<?php echo base_url("profile/edit/").$user->username ?>">Edit</a>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Game yang dimainkan</h6>
                      <ul class="list-group">
                        <?php foreach($games as $g) : ?>
                          <li class="list-group-item">
                            <?php echo $g["title"]." " ?>
                            <span class="badge bg-primary"><?php echo $g["user_game_id"] ?></span>
                          </li>
                        <?php endforeach ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Aktif di forum</h6>
                      
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
</main>