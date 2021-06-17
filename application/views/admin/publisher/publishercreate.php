    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Publisher</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('management/publishers') ?>">Daftar Publisher</a></li>
                <li class="breadcrumb-item active">Tambah Publisher</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-keyboard me-1"></i>
                    Tambah Publisher
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
                    <?php echo form_open_multipart('management/publishers/store') ?>
                        <div class="col-sm-4">
                            <label class="form-label">Nama Publisher</label>
                            <input name="name" type="text" class="form-control"  placeholder="Nama Publisher">
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="8"></textarea>
                            <script>
                                CKEDITOR.replace( 'deskripsi' );
                            </script>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Negara Asal</label>
                            <input name="country" type="text" class="form-control"  placeholder="Negara Asal">
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Logo</label>
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