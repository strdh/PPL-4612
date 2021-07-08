<html>
  <head>
    <title>
      GSC
    </title>
    <link rel="stylesheet" href="<?php echo base_url("asset/css/user.css") ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo base_url("home") ?>">Home</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Game
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo base_url("gamecategories") ?>">Categories</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("gamepublisher") ?>">Publisher</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo base_url("gameforum") ?>">Forum</a>
            </li>
            <li class="nav-item">
                  <?php echo form_open('search', 'class="d-flex"') ?>
                 
                  <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search" required>
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </li>
            <?php if ($this->session->userdata('login_status') === NULL) : ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo base_url("createuser") ?>">Join</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo base_url("login") ?>">Login</a>
              </li>
            <?php else : ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $this->session->userdata("username") ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo base_url("profile/").$this->session->userdata("username") ?>">Profil</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url("logout") ?>">Logout</a></li>
                </ul>
            </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
   