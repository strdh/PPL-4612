<div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-4@s uk-text-center" uk-grid>
    <?php foreach ($games as $game): ?>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <div class="uk-card-media-top">
                        <img class="uk-height-medium" src="<?php echo base_url('asset/src/images/'.$game["covers"]) ?>" width="" height="" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title"><?php echo $game["title"] ?></h3>
                    </div>
                </div>
            </div>
    <?php endforeach ?>
</div>