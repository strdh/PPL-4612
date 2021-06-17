
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Publisher</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Publisher</>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <a href="<?php echo base_url('management/publishers/create') ?>" class="btn btn-success">Tambah</a>
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
                    Daftar Publisher
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Negara</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($publishers as $data): ?>
                                <tr>
                                    <td><?php echo $data["name"] ?></td>
                                    <td><?php echo $data["country"] ?></td>
                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modal<?php echo $data["id"] ?>"><i class="fas fa-eye"></i></a></td>
                                    <td>
                                        <a href="<?php echo base_url('management/publishers/edit/').$data['id'] ?>">
                                            <i class="fas fa-edit"></i>Edit
                                        </a>
                                        |
                                        <a href="<?php echo base_url('management/publishers/delete/').$data['id'] ?>" onclick="return confirm('Yakin ingin dihapus')">
                                            <i class="fas fa-trash-alt"></i>Hapus
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal<?php echo $data["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4><?php echo $data["name"] ?></h4>
                                            <?php echo $data["description"] ?>
                             
                                            <div>
                                                <?php if ($data["cover"] != NULL) :?>
                                                    <img class="col-sm-12" src="<?php echo base_url('asset/src/images/'.$data["cover"]) ?>" alt="">
                                                <?php else : ?>
                                                    <img class="col-sm-12" src="<?php echo base_url('asset/src/images/dummy.jpg') ?>" alt="">
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                           <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

