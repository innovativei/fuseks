<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header(); ?>

<div id="about">
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
                    if($photo = get_field('signature')):
                        ?>
                        <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" class="img-fluid">
                        <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    if($photo = get_field('photo')):
                        ?>
                        <div class="white-frame drop-shadow inset-shadow">
                            <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" class="img-fluid">
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php include(get_stylesheet_directory() . '/parts/testimonials.php'); ?>

    <div class="d-none d-md-block">
        <section class="bg-green py-5 part one">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-9">
                                <h1 class="white mb-0">
                                    <?php the_field('p1_title'); ?>
                                </h1>
                                <?php the_field('p1_text'); ?>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-md-5 offset-md-7">
                                <?php
                                if($p1_square = get_field('p1_square_image')):
                                    ?>
                                    <div class="white-frame drop-shadow inset-shadow my-3">
                                        <img src="<?php echo $p1_square['url']; ?>" alt="<?php echo $p1_square['alt']; ?>" class="img-fluid">
                                    </div>
                                    <?php
                                endif;
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <?php
                        if($p1_tall = get_field('p1_tall_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p1_tall['url']; ?>" alt="<?php echo $p1_tall['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 offset-md-6">
                        <?php
                        if($p1_wide = get_field('p1_wide_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow">
                                <img src="<?php echo $p1_wide['url']; ?>" alt="<?php echo $p1_wide['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-green pb-5 part two">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if($p2_wide = get_field('p2_wide_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p2_wide['url']; ?>" alt="<?php echo $p2_wide['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>

                        <div class="row">
                            <div class="col-md-8 offset-md-3">
                                <?php
                                if($p2_square = get_field('p2_square_image')):
                                    ?>
                                    <div class="white-frame drop-shadow inset-shadow">
                                        <img src="<?php echo $p2_square['url']; ?>" alt="<?php echo $p2_square['alt']; ?>" class="img-fluid">
                                    </div>
                                    <?php
                                endif;
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h1 class="white mb-0">
                            <?php the_field('p2_title'); ?>
                        </h1>
                        <?php the_field('p2_text'); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-green pb-5 part three">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="white mb-0">
                            <?php the_field('p3_title'); ?>
                        </h1>
                        <?php the_field('p3_text'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-md-2 pt-5">
                        <?php
                        if($p3_tall = get_field('p3_tall_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3 mt-5">
                                <img src="<?php echo $p3_tall['url']; ?>" alt="<?php echo $p3_tall['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <div class="col-md-7">
                        <?php
                        if($p3_wide = get_field('p3_wide_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p3_wide['url']; ?>" alt="<?php echo $p3_wide['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="d-block d-md-none">
        <section class="bg-green py-5 part one">
            <div class="container">
                <h1 class="white mb-0">
                    <?php the_field('p1_title'); ?>
                </h1>
                <?php the_field('p1_text'); ?>
                <div class="row">
                    <div class="col-sm-6 d-flex justify-content-center align-items-start">
                        <?php
                        if($p1_tall = get_field('p1_tall_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p1_tall['url']; ?>" alt="<?php echo $p1_tall['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        if($p1_square = get_field('p1_square_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p1_square['url']; ?>" alt="<?php echo $p1_square['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        if($p1_wide = get_field('p1_wide_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p1_wide['url']; ?>" alt="<?php echo $p1_wide['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-green pb-5 part two">
            <div class="container">
                <h1 class="white mb-0">
                    <?php the_field('p2_title'); ?>
                </h1>
                <?php the_field('p2_text'); ?>
                <div class="row">
                    <div class="col-sm-8">
                        <?php
                        if($p2_wide = get_field('p2_wide_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p2_wide['url']; ?>" alt="<?php echo $p2_wide['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        if($p2_square = get_field('p2_square_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow">
                                <img src="<?php echo $p2_square['url']; ?>" alt="<?php echo $p2_square['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-green pb-5 part three">
            <div class="container">
                <h1 class="white mb-0">
                    <?php the_field('p3_title'); ?>
                </h1>
                <?php the_field('p3_text'); ?>

                <div class="row">
                    <div class="col-sm-4 d-flex justify-content-center align-items-start">
                        <?php
                        if($p3_tall = get_field('p3_tall_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow mb-3">
                                <img src="<?php echo $p3_tall['url']; ?>" alt="<?php echo $p3_tall['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <div class="col-sm-8">
                        <?php
                        if($p3_wide = get_field('p3_wide_image')):
                            ?>
                            <div class="white-frame drop-shadow inset-shadow">
                                <img src="<?php echo $p3_wide['url']; ?>" alt="<?php echo $p3_wide['alt']; ?>" class="img-fluid">
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
