
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Games</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Games</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <a href="" class="btn btn-success">Tambah</a>                .
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
                                        <a href="">
                                            <h6><i class="fas fa-edit"></i>Edit</h6>
                                        </a>
                                        <a href="">
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
                                            <form>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                            </form>
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
