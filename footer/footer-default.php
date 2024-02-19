<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); } if (CFCT_DEBUG) { cfct_banner(__FILE__); } ?>

</main>

<footer class="footer rel bg-black">
    <div class="brand d-flex justify-content-center">
        <img src="<?php bloginfo('template_directory'); ?>/img/fuseks-brand-wide.png" alt="" class="img-fluid">
    </div>
    <div class="container-lg">
        <?php
        $location_args = array(
            'post_type' => 'locations',
            'posts_per_page' => -1,
            'orderby' => 'menu_order title',
            'order' => 'ASC',
        );

        $location_query = new WP_Query($location_args);

        if($location_query->have_posts()):
            ?>
            <div class="row justify-content-center">
                <?php
                while($location_query->have_posts()):
                    $location_query->the_post();
                    ?>
                    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center">
                        <h2 class="white text-center mb-0">
                            Fusek's True Value<br />
                            <?php the_title(); ?>
                        </h2>
                        <?php
                        if(get_field('address')):
                            ?>
                            <p class="white text-center"><?php the_field('address'); ?></p>
                            <?php
                        endif;
                        if(get_field('phone')):
                            ?>
                            <p class="white text-center">
                                <strong>Phone:</strong>
                                <br />
                                <?php the_field('phone'); ?>
                            </p>
                            <?php
                        endif;
                        if(get_field('hours')):
                            ?>
                            <p class="white text-center mb-0">
                                <strong>Store Hours:</strong>
                            </p>
                            <table class="text-center mb-3 mb-md-0">
                                <?php
                                while(have_rows('hours')):
                                    the_row();
                                    ?>
                                    <tr>
                                        <td><?php the_sub_field('day'); ?></td>
                                        <td><?php the_sub_field('open_hours'); ?></td>
                                    </tr>
                                    <?php
                                endwhile;
                                ?>
                            </table>
                            <?php
                        endif;
                        ?>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php
        endif;
        ?>
    </div>
    <div class="jobs d-flex justify-content-center py-3 mt-3">
        <a href="/careers" class="d-flex align-items-center">
            <img src="<?php bloginfo('template_directory'); ?>/img/brush-in-hand.png" class="img-fluid d-inline-block">
            <h3 class="white text-uppercase d-inline-block mb-0">Join Our Team</h3>
        </a>
    </div>
</footer>

</body>
<?php wp_footer(); ?>
</html>
