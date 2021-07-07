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
            <div class="col-md-8 border">
                <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show col-sm-5" role="alert">
                            <?php echo validation_errors(); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                <?php echo form_open_multipart("profile/edit/".$user->username) ?>
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <input type="hidden" name="id" value="<?php echo $user->id ?>">
                        <input type="hidden" name="old_username" value="<?php echo $user->username ?>">
                        <input type="hidden" name="old_avatar" value="<?php echo $user->avatar ?>">
                        <div class="col-md-6"><label class="labels">Fullname</label><input type="text" name="name" class="form-control" placeholder="fullname" value="<?php echo $user->name ?>"></div>
                        <div class="col-md-6"><label class="labels">username</label><input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $user->username ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Email</label><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <?php if ($user->avatar != NULL) : ?>
                            <input class="form-check-input" type="checkbox" name="del_avatar">
                            <span class="badge bg-danger text-dark">centang dan biarkan form avatar kosong jika ingin menngosongkan avatar</span><br>
                        <?php endif ?>
                        <div class="col-md-6"><label class="labels">Avatar</label><input type="file" name="avatar" class="form-control"></div>
                    </div>
                    <div class="mt-5 text-center"><input type="submit" class="btn btn-primary" value="save profile"></div>
                </div>
            </div>
          </div>

        </div>
    </div>
</main>
