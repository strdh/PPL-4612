
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar User</>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
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
                    Daftar User
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($users as $data): ?>
                                <tr>
                                    <td><?php echo $data["username"] ?></td>
                                    <td><?php echo $data["email"] ?></td>
                                    <td><?php echo $data["name"] ?></td>
                                    <td>
                                        <?php if ($data["status"] == "AKTIF") : ?>
                                            <span class="badge rounded-pill bg-success"><?php echo $data["status"] ?></span>
                                        <?php else : ?>
                                            <span class="badge rounded-pill bg-danger"><?php echo $data["status"] ?></span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('management/users/logs/').$data["id"] ?>"><i class="fas fa-history"></i>Logs</a>| 
                                        <?php if ($data["status"] == "AKTIF") : ?>
                                            <a href="<?php echo base_url('management/users/block/'.$data["id"]) ?>" onclick="return confirm('Yakin ingin diblokir ?')">
                                                <i class="fas fa-ban"></i>Block
                                            </a>
                                        <?php else : ?>
                                             <a href="<?php echo base_url('management/users/unblock/'.$data["id"]) ?>" onclick="return confirm('Yakin ingin dipulihkan ?')">
                                                <i class="fas fa-unlock"></i>Unblock
                                            </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                           <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

