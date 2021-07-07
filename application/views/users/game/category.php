<br>
<main>
    <div class="container">
      <h2>Daftar Kategori Game</h2>
        <div class="main-body">
          <ul class="list-group">
            <?php foreach ($categories as $c) : ?>
                <li class="list-group-item"><?php echo $c["name"] ?></li>
            <?php endforeach ?>
          </ul>
        </div>
    </div>
</main>