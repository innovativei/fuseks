<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header(); ?>

<div id="careers">
    <?php include(get_stylesheet_directory() . '/parts/hero.php'); ?>

    <section class="bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if(get_field('intro_headline')):
                        ?>
                        <h2 class="black">
                            <?php the_field('intro_headline'); ?>
                        </h2>
                        <?php
                    endif;
                    if(get_field('intro_information')):
                        the_field('intro_information');
                    endif;
                    ?>
                    <div class="buttons">
                        <a href="#open-positions" class="button">View Open Positions</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="#mission-and-vision" class="in-page-link">Mission &amp; Vision</a>
                    <a href="#true-values" class="in-page-link">Values</a>
                    <a href="#benefits-and-perks" class="in-page-link">Benefits</a>
                    <a href="#open-positions" class="in-page-link">Job Postings</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-cream pt-3 pb-5">
        <div class="container">
            <h1 id="mission-and-vision" class="black">Mission &amp; Vision</h1>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if(get_field('mission')):
                        ?>
                        <h3 class="black">Mission</h3>
                        <?php
                        the_field('mission');
                    endif;
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    if(get_field('vision')):
                        ?>
                        <h3 class="black">Vision</h3>
                        <?php
                        the_field('vision');
                    endif;
                    ?>
                </div>
            </div>

            <h1 id="true-values" class="black">Fusek's True Values</h1>
            <?php
            if(have_rows('value_flip_boxes')):
                ?>
                <div class="row justify-content-center">
                    <?php
                    while(have_rows('value_flip_boxes')):
                        the_row();
                        $front  = get_sub_field('front');
                        $back   = get_sub_field('back');
                        $screens = array(
                            'desktop',
                            'mobile'
                        );
                        foreach($screens as $screen):
                            ?>
                            <div class="col-md-4 col-sm-6 mb-3 flip-box-wrapper <?php echo $screen; ?>">
                                <div class="flip-box">
                                    <div class="inner">
                                        <div class="front">
                                            <h2 class="white mb-0">
                                                <?php echo $front; ?>
                                            </h2>
                                        </div>
                                        <div class="back">
                                            <p class="white mb-0">
                                                <?php echo $back; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endwhile;
                    ?>
                </div>
                <?php
            endif;
            ?>

            <h1 id="benefits-and-perks" class="black">Benefits &amp; Perks</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <?php
                    if(get_field('benefits_perks_headline')):
                        ?>
                        <h2 class="black">
                            <?php the_field('benefits_perks_headline'); ?>
                        </h2>
                        <?php
                    endif;
                    if(get_field('benefits_perks_information')):
                        the_field('benefits_perks_information');
                    endif;
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    if(have_rows('benefit_list')):
                        ?>
                        <ul class="benefits">
                            <?php
                            while(have_rows('benefit_list')):
                                the_row();
                                echo '<li><strong>' . get_sub_field('benefit') . '</strong></li>';
                            endwhile;
                            ?>
                        </ul>
                        <?php
                    endif;
                    ?>
                </div>
            </div>

            <h1 id="open-positions" class="black">Open Positions</h1>
            <?php
            if(have_rows('open_positions')):
                ?>
                <ul class="positions">
                    <?php
                    while(have_rows('open_positions')):
                        the_row();
                        ?>
                        <li>
                            <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                <strong>
                                    <?php the_sub_field('job_title'); ?>
                                </strong>
                                <span></span>
                                <?php the_sub_field('location'); ?>
                                <span></span>
                                <?php the_sub_field('time'); ?>
                                <i class="fa-solid fa-caret-right"></i>
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
    </section>

</div>
<?php get_footer(); ?>
