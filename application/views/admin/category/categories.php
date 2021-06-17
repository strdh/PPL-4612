    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Kategori</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <a href="<?php echo base_url('management/categories/store') ?>" class="btn btn-success">Tambah</a>
                </div>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show col-sm-5" role="alert">
                        <?php echo $this->session->flashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Kategori
                </div>
                <div class="card-body col-sm-5">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $data) : ?>
                                <tr>
                                    <td><?php echo $data["name"] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('management/categories/edit/').$data['id'] ?>"><i class="fas fa-edit" aria-hidden="true"></i>Edit</a>
                                        |
                                        <a href="<?php echo base_url('management/categories/delete/').$data['id'] ?>" onclick="return confirm('Yakin ingin dihapus')">
                                            <i class="fas fa-trash-alt"></i>Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>