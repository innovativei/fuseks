<section id="hero" class="home">
    <div class="pb-3">
        <?php
        if(have_rows('hero_slider')):
            ?>
            <div class="container">
                <div class="slider-wrapper home-hero-slider-wrapper">
                    <div class="shadow top"></div>
                    <div class="shadow bottom"></div>
                    <div class="shadow left"></div>
                    <div class="shadow right"></div>
                    <div class="corner tl"></div>
                    <div class="corner tr"></div>
                    <div class="corner bl"></div>
                    <div class="corner br"></div>
                    <div 
                        id="home-hero-slider" 
                        class="slider-hand-arrows drop-shadow" 
                        data-autoplay="true"
                    >
                        <?php
                        while(have_rows('hero_slider')):
                            the_row();
                            if(get_row_layout() == 'simple_image'):
                                $bg = get_sub_field('image');
                                ?>
                                <div class="static" style="background-image: url(<?php echo $bg; ?>);"></div>
                                <?php
                            elseif(get_row_layout() == 'linked_image'):
                                $bg = get_sub_field('image');
                                $link = get_sub_field('link');
                                $link_url       = $link['url'];
                                $link_title     = $link['title'];
                                $link_target    = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <div class="linked-image">
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" style="background-image: url(<?php echo $bg; ?>);"></a>
                                </div>
                                <?php
                            elseif(get_row_layout() == 'content'):
                                $bg = get_sub_field('background_image');
                                $header = get_sub_field('header');
                                $text = get_sub_field('text');
                                $link = get_sub_field('button_link');
                                $link_url       = $link['url'];
                                $link_title     = $link['title'];
                                $link_target    = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <div class="content" style="background-image: url(<?php echo $bg; ?>);">
                                    <div class="content-shade">
                                        <div class="slide-content header">
                                            <?php echo $header; ?>
                                        </div>
                                        <div class="slide-content copy">
                                            <?php echo $text; ?>
                                        </div>
                                        <div class="buttons mb-0">
                                            <a href="<?php echo esc_url($link_url); ?>" class="button mb-0" target="<?php echo esc_attr($link_target); ?>">
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            elseif(get_row_layout() == 'youtube_video'):
                                $vid = get_sub_field('youtube_video_share_link');
                                $vid_id = fount_yt_share_stripper($vid);
                                ?>
                                <div class="youtube">
                                    <div class="video-container">
                                        <iframe src="https://www.youtube.com/embed/<?php echo $vid_id; ?>?color=white" frameborder="0" allowfullscreen class="no-select"></iframe>
                                    </div>
                                </div>
                                <?php
                            elseif(get_row_layout() == 'vimeo_video'):
                                $vid = get_sub_field('vimeo_video_share_link');
                                ?>
                                <div class="vimeo">
                                    <div class="video-container">
                                        <?php echo fount_generate_vimeo_embed_code($vid); ?>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endwhile;
                        ?>
                    </div>
                    <div class="hand-arrows d-none d-lg-block">
                        <div class="arrow prev"></div>
                        <div class="arrow next"></div>
                    </div>
                    <div class="mobile-controls d-flex justify-content-center align-items-center d-lg-none">
                        <div class="arrow-sm prev"></div>
                        <div class="slider-dots"></div>
                        <div class="arrow-sm next"></div>
                    </div>
                </div>
            </div>
            <?php
        endif;
        ?>

        <div id="store-select" class="gen-wrapper">
            <div class="container">
                <h1 class="black">Select Your Store</h1>
                <?php
                include(get_stylesheet_directory() . '/parts/store-select.php');
                ?>
            </div>
        </div>
    </div>
</section>