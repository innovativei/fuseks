<nav class="secondary d-none d-lg-block">
    <div class="container-fluid d-flex justify-content-end">
        <ul class="d-flex align-items-center">
            <li><a href="#">Store Locations</a></li>
            <li><a href="#">Commercial Accounts</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <ul class="social d-flex">
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
        </ul>
    </div>
</nav>

<nav class="primary d-flex">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="#" class="brand">
            <img src="<?php bloginfo('template_directory'); ?>/img/fuseks-brand.png" alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid">
        </a>
        <ul class="d-none d-lg-flex">
            <li><a href="#">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Brands</a></li>
            <li><a href="#">Current Promotion</a></li>
        </ul>
        <div id="mobile-menu-trigger" class="d-flex justify-content-center align-items-start d-lg-none no-select">
            <div class="icon-container transition d-flex flex-column align-items-center">
                <div class="bars"></div>
                <i class="fa-solid fa-caret-down transition"></i>
            </div>
        </div>
    </div>
</nav>

<div id="mobile-menu">
        <nav>
            <ul class="primary">
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Brands</a></li>
                <li><a href="#">Current Promotion</a></li>
            </ul>
            <ul class="secondary">
                <li><a href="#">Store Locations</a></li>
                <li><a href="#">Commercial Accounts</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul class="social">
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            </ul>
        </nav>
</div>

<!--
<?php if(have_rows('navigation','options')): ?>
<nav class="navigation">
    <ul>
    <?php 
    while(have_rows('navigation','options')) : 
        the_row(); 
        $layout = get_row_layout();
        ?>

        <?php if($layout == 'simple_link'): ?>
        <li class="simple">
            <?php fount_output_link(get_sub_field('link')); ?>
        </li>
        <?php elseif($layout == 'dropdown_menu'): ?>
            <li class="dropdown">

                <?php
                $type = get_sub_field('menu_item');
                if($type == 'link'):
                    fount_output_link(get_sub_field('link'), 'dropdown-target');
                else: ?>
                <a href="#" class="dropdown-target"><?php the_sub_field('menu_item_text'); ?></a>
                <?php endif; ?>
                
                <?php if(have_rows('dropdown_menu')) : ?>
                <div class="dropdown-wrapper">
                    <ul>
                        <?php while(have_rows('dropdown_menu')) : the_row(); ?>
                        <li>
                            <?php fount_output_link(get_sub_field('link')); ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>

            </li>
        <?php endif; ?>
    <?php endwhile; ?>
    </ul>
</nav>
<?php endif; ?>
-->