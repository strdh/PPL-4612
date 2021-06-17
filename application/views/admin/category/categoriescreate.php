    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('management/categories') ?>">Daftar Kategori</a></li>
                <li class="breadcrumb-item active">Tambah Kategori</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-keyboard me-1"></i>
                    Edit Kategori
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
                    <?php echo form_open('management/categories/store') ?>
                        <div class="col-sm-4">
                            <label class="form-label">Kategori</label>
                            <input name="name" type="text" class="form-control"  placeholder="Nama Kategori">
                        </div><br>
                        <div class="col-sm-4">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </main> 