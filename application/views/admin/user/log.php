<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo base_url('adminhome') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('management/users') ?>">Daftar User</a></li>
                <li class="breadcrumb-item active">Logs <?php ?></li>
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
                                <th>Activity</th>
                                <th>Url</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($logs as $data): ?>
                                <tr>
                                    <td><?php echo $data["username"] ?></td>
                                    <td><?php echo $data["activity"] ?></td>
                                    <td><?php echo $data["url"] ?></td>
                                    <td><?php echo $data["time"] ?></td>
                                </tr>
                           <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>