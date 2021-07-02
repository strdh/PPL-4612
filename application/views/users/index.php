<main>
    <section class="py-5 text-center container">
    <div class="row py-lg-3">
      <div class="col-lg-8 col-md-8 mx-auto">
        <h1 class="fw-light">Selamat Datang Di Catalogue Game Semarang</h1>
        <p class="lead text-muted">Tempat guyub rukun para gamer di Semarang</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($games as $data) : ?>
            <div class="col">
              <div class="card shadow-sm">
               
                <img src="<?php echo base_url("asset/src/images/").$data["cover"] ?>" alt="" height="300">
                
                <div class="card-body">
                  <p class="card-text"><?php echo $data["title"] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?php echo base_url('game/').$data['id'] ?>" class="btn btn-sm btn-success">View</a>
                    </div>
                    <small class="text-muted"></small>
                    <span class="badge bg-primary"><?php echo $data["rating_age"] ?> +</span>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</main>