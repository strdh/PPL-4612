    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Forum</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Forum</li>
            </ol>
            <div class="card mb-4">
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
                    Daftar Forum
                </div>
                <div class="card-body col-sm-9">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Dibuat</th>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($forums as $data) : ?>
                                <tr>
                                    <td><?php echo $data["name"] ?></td>
                                    <td><?php echo $data["date_created"] ?></td>
                                    <td></td>
                                    <td><a class="badge bg-primary" href="">Detail</a></td>
                                    <td></td>
                                    <td>
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