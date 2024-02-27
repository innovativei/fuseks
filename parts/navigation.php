<?php

// Nav current page highlighter url finder
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}
$url.= $_SERVER['HTTP_HOST'];
$url.= $_SERVER['REQUEST_URI'];

if(
    have_rows('sec_nav', 'option') || 
    have_rows('social_media', 'option')
):
    ?>
    <nav class="secondary d-none d-lg-block">
        <div class="container-fluid d-flex justify-content-end">
            <?php
            if(have_rows('sec_nav', 'option')):
                ?>
                <ul class="d-flex align-items-center">
                    <?php
                    while(have_rows('sec_nav', 'option')):
                        the_row();
                        $link = get_sub_field('sec_link');
                        if($link):
                            $link_url       = $link['url'];
                            $link_title     = $link['title'];
                            $link_target    = $link['target'] ? $link['target'] : '_self';
                            if(
                                get_sub_field('sec_dropdown', 'option') && 
                                have_rows('sec_dropdown_links', 'option')
                            ):
                                $dd_class = "dropdown";
                            else:
                                $dd_class = "";
                            endif;
                            ?>
                            <li class="<?php echo $dd_class; ?>">
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="<?php if($url == $link_url){ echo 'highlight';} ?>">
                                    <?php echo esc_html($link_title); ?>
                                </a>
                                <div class="dropdown-wrapper">
                                    <div class="arrow"></div>
                                    <div class="links">
                                        <ul>
                                            <?php
                                            while(have_rows('sec_dropdown_links', 'option')):
                                                the_row();
                                                $link = get_sub_field('sec_dropdown_link');
                                                if($link):
                                                    $dd_link_url    = $link['url'];
                                                    $dd_link_title  = $link['title'];
                                                    $dd_link_target = $link['target'] ? $link['target'] : '_self';
                                                    ?>
                                                    <li class="<?php if($url == $dd_link_url){ echo 'highlight';} ?>">
                                                        <a href="<?php echo esc_url($dd_link_url); ?>" target="<?php echo esc_attr($dd_link_target); ?>">
                                                            <?php echo esc_html($dd_link_title); ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                endif;
                                            endwhile;
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endif;
                    endwhile;
                    ?>
                </ul>
                <?php
            endif;
            if(have_rows('social_media', 'option')):
                ?>
                <ul class="social d-flex">
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
    </nav>
    <?php
endif;

if(
    have_rows('pri_nav', 'option') || 
    get_field('logo', 'option')
):
    ?>
    <nav class="primary d-flex">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <?php
            if($logo = get_field('logo', 'option')):
                ?>
                <a href="/" class="brand">
                    <img src="<?php the_field('logo', 'option'); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid">
                </a>
                <?php
            endif;
            if(have_rows('pri_nav', 'option')):
                ?>
                <ul class="d-none d-lg-flex">
                    <?php
                    while(have_rows('pri_nav', 'option')):
                        the_row();
                        $link = get_sub_field('pri_link');
                        if($link):
                            $link_url       = $link['url'];
                            $link_title     = $link['title'];
                            $link_target    = $link['target'] ? $link['target'] : '_self';
                            if(
                                get_sub_field('pri_dropdown', 'option') && 
                                have_rows('pri_dropdown_links', 'option')
                            ):
                                $dd_class = "dropdown";
                            else:
                                $dd_class = "";
                            endif;
                            ?>
                            <li class="<?php echo $dd_class;?>">
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="<?php if($url == $link_url){ echo 'highlight';} ?>">
                                    <?php echo esc_html($link_title); ?>
                                </a>
                                <div class="dropdown-wrapper">
                                    <div class="arrow"></div>
                                    <div class="links">
                                        <ul>
                                            <?php
                                            while(have_rows('pri_dropdown_links', 'option')):
                                                the_row();
                                                $link = get_sub_field('pri_dropdown_link');
                                                if($link):
                                                    $dd_link_url    = $link['url'];
                                                    $dd_link_title  = $link['title'];
                                                    $dd_link_target = $link['target'] ? $link['target'] : '_self';
                                                    ?>
                                                    <li class="<?php if($url == $dd_link_url){ echo 'highlight';} ?>">
                                                        <a href="<?php echo esc_url($dd_link_url); ?>" target="<?php echo esc_attr($dd_link_target); ?>">
                                                            <?php echo esc_html($dd_link_title); ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                endif;
                                            endwhile;
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endif;
                    endwhile;
                    ?>
                </ul>
                <?php
            endif;
            ?>
            <div id="mobile-menu-trigger" class="d-flex justify-content-center align-items-start d-lg-none no-select">
                <div class="icon-container transition d-flex flex-column align-items-center">
                    <div class="bars"></div>
                    <i class="fa-solid fa-xmark transition"></i>
                </div>
            </div>
        </div>
    </nav>
    <?php
endif;

if(
    have_rows('pri_nav', 'option') || 
    have_rows('sec_nav', 'option') || 
    have_rows('social_media', 'option')
):
    ?>
    <div id="mobile-menu">
        <nav>
            <?php
            if(have_rows('pri_nav', 'option')):
                ?>
                <ul class="primary">
                    <?php
                    while(have_rows('pri_nav', 'option')):
                        the_row();
                        $link = get_sub_field('pri_link');
                        if($link):
                            $link_url       = $link['url'];
                            $link_title     = $link['title'];
                            $link_target    = $link['target'] ? $link['target'] : '_self';
                            if(
                                get_sub_field('pri_dropdown', 'option') && 
                                have_rows('pri_dropdown_links', 'option')
                            ):
                                ?>
                                <li class="flyout">
                                    <div class="flyout-trigger"><?php echo esc_html($link_title); ?></div>
                                    <div class="flyout-wrapper invisible">
                                        <div class="flyout-return">Main Menu</div>
                                        <nav>
                                            <ul>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <?php
                                                while(have_rows('pri_dropdown_links', 'option')):
                                                    the_row();
                                                    $link = get_sub_field('pri_dropdown_link');
                                                    if($link):
                                                        $dd_link_url    = $link['url'];
                                                        $dd_link_title  = $link['title'];
                                                        $dd_link_target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($dd_link_url); ?>" target="<?php echo esc_attr($dd_link_target); ?>">
                                                                <?php echo esc_html($dd_link_title); ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    endif;
                                                endwhile;
                                                ?>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            </ul>
                                        </nav>
                                        <a href="<?php echo $link_url; ?>" class="view-all">View all <?php echo esc_html($link_title); ?></a>
                                    </div>
                                </li>
                                <?php
                            else:
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>
                                </li>
                                <?php
                            endif;
                        endif;
                    endwhile;
                    ?>
                    <li>
                        <div class="divider"></div>
                    </li>
                </ul>
                <?php
            endif;
            if(have_rows('sec_nav', 'option')):
                ?>
                <ul class="secondary">
                    <?php
                    while(have_rows('sec_nav', 'option')):
                        the_row();
                        $link = get_sub_field('sec_link');
                        if($link):
                            $link_url       = $link['url'];
                            $link_title     = $link['title'];
                            $link_target    = $link['target'] ? $link['target'] : '_self';
                            if(
                                get_sub_field('sec_dropdown', 'option') && 
                                have_rows('sec_dropdown_links', 'option')
                            ):
                                ?>
                                <li class="flyout">
                                    <div class="flyout-trigger"><?php echo esc_html($link_title); ?></div>
                                    <div class="flyout-wrapper invisible">
                                        <div class="flyout-return">Main Menu</div>
                                        <nav>
                                            <ul>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                                <?php
                                                while(have_rows('sec_dropdown_links', 'option')):
                                                    the_row();
                                                    $link = get_sub_field('sec_dropdown_link');
                                                    if($link):
                                                        $dd_link_url    = $link['url'];
                                                        $dd_link_title  = $link['title'];
                                                        $dd_link_target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($dd_link_url); ?>" target="<?php echo esc_attr($dd_link_target); ?>">
                                                                <?php echo esc_html($dd_link_title); ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    endif;
                                                endwhile;
                                                ?>
                                                <li>
                                                    <div class="divider"></div>
                                                </li>
                                            </ul>
                                        </nav>
                                        <a href="<?php echo $link_url; ?>" class="view-all">View all <?php echo esc_html($link_title); ?></a>
                                    </div>
                                </li>
                                <?php
                            else:
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>
                                </li>
                                <?php
                            endif;
                        endif;
                    endwhile;
                    ?>
                    <li>
                        <div class="divider"></div>
                    </li>
                </ul>
                <?php
            endif;
            if(have_rows('social_media', 'option')):
                ?>
                <ul class="social">
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
        </nav>
    </div>
    <?php
endif;
?>