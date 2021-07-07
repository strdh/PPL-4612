<br>
<main>
    <div class="container">
      <h2>Daftar Forum Game</h2>
        <div class="main-body">
          <ul class="list-group">
            <?php foreach ($forum as $f) : ?>
                <li class="list-group-item"><a href="<?php echo base_url("game/forum/").$f["game_id"] ?>"><?php echo $f["name"] ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
    </div>
</main>