    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Game</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('management/games') ?>">Daftar Game</a></li>
                <li class="breadcrumb-item active">Edit Game</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-keyboard me-1"></i>
                    Edit Game
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show col-sm-5" role="alert">
                            <?php echo $this->session->flashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show col-sm-5" role="alert">
                            <?php echo validation_errors(); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <?php echo form_open_multipart('management/games/edit/'.$game->id) ?>
                        <div class="col-sm-4">
                            <input type="hidden" name="old_cover" value="<?php echo $game->cover ?>">
                            <label class="form-label">Judul</label>
                            <input name="title" type="text" class="form-control"  placeholder="Judul" value="<?php echo $game->title ?>">
                        </div><br>
                        <div class="col-sm-4">
                            <?php 
                                $selected = explode(" ", $game->categories);
                            ?>
                            <label class="form-label">Kategori</label>
                            <select id="categories" name="categories[]" class="form-control select2" multiple="multiple">
                                <?php foreach ($selected as $data) :  ?>
                                    <option value="<?php echo $data ?>" selected="selected"><?php echo $data ?></option>
                                <?php endforeach ?>
                            </select>
                            <script>
                                $('.select2').select2({
                                    data: <?php echo json_encode($categories); ?>,
                                    tags: true,
                                    maximumSelectionLength: 10,
                                    tokenSeparators: [',', ' '],
                                    placeholder: "Pilih",
                                    value : "red"
                                });
                            </script>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="8"><?php echo $game->description ?></textarea>
                            <script>
                                CKEDITOR.replace( 'deskripsi' );
                            </script>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Tanggal Rilis</label>
                            <input name="release_date" type="date" class="form-control"  placeholder="Tanggal Rilis" value="<?php echo $game->release_date ?>">
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Tingkat Kesusahan</label>
                            <select name="difficulty" class="form-control">
                                <option value="">PILIH</option>
                                <option value="EASY" <?php if ($game->difficulty == "EASY") echo "selected"  ?>>EASY</option>
                                <option value="MEDIUM"  <?php if ($game->difficulty == "MEDIUM") echo "selected" ?>>MEDIUM</option>
                                <option value="HARD"  <?php if ($game->difficulty == "HARD") echo "selected" ?>>HARD</option>
                            </select>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Publisher Game</label>
                            <select name="publisher_id" class="form-control">
                                <option value="">PILIH</option>
                                <?php foreach($publishers as $data) : ?>
                                    <option value="<?php echo $data["id"] ?>" <?php if ($game->publisher_id == $data["id"]) echo "selected" ?> ><?php echo $data["name"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Rating Umur</label>
                            <input name="rating_age" type="number" class="form-control"  placeholder="Rating umur" value="<?php echo $game->rating_age ?>">
                        </div><br>
                        <div class="col-sm-4">
                            <?php if ($game->cover != NULL) : ?>
                                <img src="<?php echo base_url("asset/src/images/".$game->cover) ?>" alt="" width="300" height="250">
                            <?php endif ?><br>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Cover</label><br>
                            <?php if ($game->cover != NULL) : ?>
                                <input class="form-check-input" type="checkbox" name="del_cover">
                                <span class="badge bg-danger text-dark">centang dan biarkan form cover kosong jika ingin menngosongkan cover</span><br>
                            <?php endif ?>
                            <input name="cover" type="file" class="form-control"  placeholder="">
                            <span class="badge bg-warning text-dark">Input jika ingin mengganti</span>
                        </div><br>
                        <div class="col-sm-4">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </main> 