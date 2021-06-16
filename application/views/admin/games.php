
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
                                        <a href=""><h6><i class="fa fa-info-circle"></i>Detail</h6></a>
                                    </td>
                                    <td>
                                        <a href=""><h6><i class="fa fa-info-circle"></i>Edit</h6></a>
                                        <a href=""><h6><i class="fa fa-info-circle"></i>Hapus</h6></a>
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
