<br>
<main>
    <div class="container">
        <h2>Daftar Publisher Game</h2>
        <div class="main-body">
          <ul class="list-group">
            <?php foreach ($publisher as $p) : ?>
                <li class="list-group-item"><?php echo $p["name"] ?></li>
            <?php endforeach ?>
          </ul>
        </div>
    </div>
</main>