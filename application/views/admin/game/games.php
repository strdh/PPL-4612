    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Games</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Games</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <a href="<?php echo base_url('management/games/store') ?>" class="btn btn-success">Tambah</a>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show col-sm-5" role="alert">
                            <?php echo $this->session->flashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Games
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Publisher</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($games as $data): ?>
                                <tr>
                                    <td><?php echo $data["title"] ?></td>
                                    <td><?php echo $data["name"] ?></td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#modal<?php echo $data["id"] ?>">
                                            <h6><i class="fas fa-info-circle"></i>Detail</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('management/games/edit/'.$data["id"]) ?>">
                                            <h6><i class="fas fa-edit"></i>Edit</h6>
                                        </a>
                                        <a href="<?php echo base_url('management/games/delete/'.$data["id"]) ?>" onclick="return confirm('Yakin ingin dihapus')">
                                            <h6><i class="fas fa-trash-alt"></i>Hapus</h6>
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
                                                <h5>Judul : <?php echo $data["title"] ?></h5>
                                                <h5>Publisher : <?php echo $data["name"] ?></h5>
                                                <p><?php echo $data["description"] ?></p>
                                                <h5>Kategori</h5>
                                                <?php
                                                    $arr = explode(" ", $data["categories"]);
                                                    foreach ($arr as $a) :
                                                ?>
                                                    <span class="badge bg-success"><?php echo $a ?></span>
                                                <?php endforeach ?>
                                                <h5>Difficulty : <?php echo $data["difficulty"]?></h5>
                                                <h5>Rating Age : <?php echo $data["rating_age"]?></h5>
                                                <h5>Ratings : <?php echo $data["ratings"]?></h5>
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
