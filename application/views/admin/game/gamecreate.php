    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Game</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('management/games') ?>">Daftar Game</a></li>
                <li class="breadcrumb-item active">Tambah Game</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-keyboard me-1"></i>
                    Tambah Game
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
                    <?php echo form_open_multipart('management/games/store') ?>
                        <div class="col-sm-4">
                            <label class="form-label">Judul</label>
                            <input name="title" type="text" class="form-control"  placeholder="Judul">
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Kategori</label>
                            <select name="categories[]" class="form-control select2" multiple="multiple" style="width: 100%;"></select>
                            <script>
                                $('.select2').select2({
                                    data: <?php echo json_encode($categories); ?>,
                                    tags: true,
                                    maximumSelectionLength: 10,
                                    tokenSeparators: [',', ' '],
                                    placeholder: "Pilih",
                                });
                            </script>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="8"></textarea>
                            <script>
                                CKEDITOR.replace( 'deskripsi' );
                            </script>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Tanggal Rilis</label>
                            <input name="release_date" type="date" class="form-control"  placeholder="Tanggal Rilis">
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Tingkat Kesusahan</label>
                            <select name="difficulty" class="form-control">
                                <option value="">PILIH</option>
                                <option value="EASY">EASY</option>
                                <option value="MEDIUM">MEDIUM</option>
                                <option value="HARD">HARD</option>
                            </select>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Publisher Game</label>
                            <select name="publisher_id" class="form-control">
                                <option value="">PILIH</option>
                                <?php foreach($publishers as $data) : ?>
                                    <option value="<?php echo $data["id"] ?>"><?php echo $data["name"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Rating Umur</label>
                            <input name="rating_age" type="number" class="form-control"  placeholder="Rating umur">
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Cover</label>
                            <input name="cover" type="file" class="form-control"  placeholder="">
                            <span class="badge bg-warning text-dark">Bisa disosongkan</span>
                        </div><br>
                        <div class="col-sm-4">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </main> 