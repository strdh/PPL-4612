                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo base_url('management/games/') ?>">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Games</h6>
                                            <h2 class="text-right"><i class="fa fa-gamepad f-left"></i><span class="f-right"><?php echo $games ?></span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo base_url('management/publishers/') ?>">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Publisher</h6>
                                            <h2 class="text-right"><i class="fa fa-book f-left"></i><span class="f-right"><?php echo $publisher ?></span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo base_url('management/categories/') ?>">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Games Category</h6>
                                            <h2 class="text-right"><i class="fa fa-bars f-left"></i><span class="f-right"><?php echo $category ?></span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo base_url('management/users/') ?>">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Users</h6>
                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span class="f-right"><?php echo $users ?></span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo base_url('management/forums/') ?>">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Forums</h6>
                                            <h2 class="text-right"><i class="fa fa-comments f-left"></i><span class="f-right"><?php echo $forums ?></span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Activity</h6>
                                            <h2 class="text-right"><i class="fa fa-history f-left"></i><span class="f-right"><?php echo $comments ?></span></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </main>