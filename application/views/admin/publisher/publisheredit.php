<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Publisher</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('management/publishers') ?>">Daftar Publisher</a></li>
                <li class="breadcrumb-item active">Edit Publisher</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-pencil-square-o" aria-hidden="true"></i>
                    Edit Publisher
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show col-sm-5" role="alert">
                            <?php echo validation_errors(); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <?php echo form_open_multipart('management/publishers/edit/'.$publisher->id) ?>
                        <div class="col-sm-4">
                            <label class="form-label">Nama Publisher</label>
                            <input type="hidden" name="id" value="<?php echo $publisher->id ?>">
                            <input type="hidden" name="old_cover" value="<?php echo $publisher->cover ?>">
                            <input name="name" type="text" class="form-control"  value="<?php echo $publisher->name ?>">
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="8">
                                <?php echo $publisher->description ?>
                            </textarea>
                            <script>
                                CKEDITOR.replace( 'deskripsi' );
                            </script>
                        </div><br>
                        <div class="col-sm-4">
                            <label class="form-label">Negara Asal</label>
                            <input name="country" type="text" class="form-control"  value="<?php echo $publisher->country ?>">
                        </div><br>
                        <div class="col-sm-4">
                            <input class="form-check-input" type="checkbox" name="del_cover">
                            <span class="badge bg-danger text-dark">centang dan biarkan form logo kosong jika ingin menngosongkan cover</span><br>
                            <label class="form-label">Logo</label>
                            <input name="cover" type="file" class="form-control"  placeholder="">
                            <span class="badge bg-warning text-dark">Biarkan saja jika tidak ingin diganti</span>
                        </div><br>
                        <div class="col-sm-4">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </main>