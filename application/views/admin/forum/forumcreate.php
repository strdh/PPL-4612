 <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Forum</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('management/forums') ?>">Daftar Forum</a></li>
                <li class="breadcrumb-item active">Tambah Forum</li>
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
                    <?php echo form_open('management/forums/store') ?>
                        <div class="col-sm-4">
                            <label class="form-label">Pilih Game yang akan dibuat forum</label>
                            <select name="game_id" id="" class="form-control">
                                <option value="">PILIH</option>
                                <?php foreach ($games as $data) :  ?>
                                    <option value="<?php echo $data["id"].",".$data["title"] ?>"><?php echo $data["title"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div><br>
                        <div class="col-sm-4">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </main> 