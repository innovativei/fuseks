<div class="row">
    <?php
    $location_args = array(
        'post_type' => 'locations',
        'posts_per_page' => -1,
        'orderby' => 'ID',
        'order' => 'ASC',
    );

    $location_query = new WP_Query($location_args);

    if($location_query->have_posts()):
        while($location_query->have_posts()):
            $location_query->the_post();
            $location_image = get_field('location_image');
            $location_phone = get_field('phone');
            ?>
            <div class="col-md-6 mb-3">
                <a href="<?php the_permalink(); ?>" class="d-block white-frame drop-shadow inset-shadow img-link mb-0">
                    <img src="<?php echo $location_image['url']; ?>" class="img-fluid">
                </a>
                <h2 class="black mb-0 pt-1">
                    <a href="<?php the_permalink(); ?>">Fusek's True Value <?php the_title(); ?></a>
                </h2>
                <?php
                if(is_page_template('single-contact.php')):
                    ?>
                    <h2 class="red">
                        <?php echo $location_phone; ?>
                    </h2>
                    <?php
                endif;
                ?>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>