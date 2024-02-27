<div id="get-social" class="bg-dark-green pb-4 pt-3">
    <div class="phone-man d-none d-sm-block" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/phone-man.png);"></div>

    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-sm-6 offset-sm-6">
                <h2 class="white mt-lg-2 mb-1 text-center text-sm-left">Get Social<br class="d-none d-sm-block" /><span class="d-inline d-md-none"> </span>With Us!</h2>
                <?php
                if(have_rows('social_media', 'options')):
                    ?>
                    <ul class="mb-lg-4 mb-md-2 text-center text-sm-left">
                        <?php
                        while(have_rows('social_media', 'option')):
                            the_row();
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                            ?>
                            <li>
                                <a href="<?php echo esc_url($link); ?>" target="_blank">
                                    <?php echo $icon; ?>
                                </a>
                            </li>
                            <?php
                        endwhile;
                        ?>
                    </ul>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>