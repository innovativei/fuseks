<div id="shop-online-van" class="bg-dark-green pb-4 pb-lg-5">
    <div class="van" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/van.png);"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 d-flex flex-column align-items-center">
                <?php
                if(get_field('van_headline', 'option')):
                    ?>
                    <h2 class="white text-center text-uppercase">
                        <?php the_field('van_headline', 'option'); ?>
                    </h2>
                    <?php
                endif;
                if(get_field('van_call_to_action_text', 'option')):
                    ?>
                    <p class="white text-center">
                        <?php the_field('van_call_to_action_text', 'option'); ?>
                    </p>
                    <?php
                endif;
                if(get_field('van_shop_online_link', 'option')):
                    ?>
                    <div class="buttons">
                        <a href="<?php the_field('van_shop_online_link', 'option'); ?>" class="button" target="_blank">Shop Online</a>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>