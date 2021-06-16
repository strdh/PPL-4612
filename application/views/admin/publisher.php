
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Publisher</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Publisher</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <a href="" class="btn btn-success">Tambah</a>                .
                </div>
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
                                <th>Deskripsi</th>
                                <th>Negara</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($publishers as $data): ?>
                                <tr>
                                    <td><?php echo $data["name"] ?></td>
                                    <td><?php echo $data["description"] ?></td>
                                    <td><?php echo $data["country"] ?></td>
                                    <td><a href=""><i class="fas fa-eye"></i></a></td>
                                    <td></td>
                                </tr>
                                <div class="modal fade" id="modal<?php echo $data["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
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
