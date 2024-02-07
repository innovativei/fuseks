<?php
if (get_field('show_testimonials_toggle')):
    ?>
    <section id="testimonial" class="py-xl-5 py-md-4 py-5">
        <?php
        if($testimonials = get_field('active_testimonials', 'options')):
            shuffle($testimonials);
            ?>
            <div class="container">
                <div
                    class="slider-hand-arrows" 
                    data-adaptiveHieght="true" 
                    data-fade="true" 
                    data-autoplay="true" 
                    data-autoplaySpeed="5000"
                >
                    <?php
                    foreach($testimonials as $testimonial):
                        $quote  = get_field('testimonial', $testimonial);
                        $name   = get_field('reviewer_name', $testimonial);
                        ?>
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-10">
                                    <h2 class="black text-center my-md-3">
                                        &quot;<?php echo($quote); ?>&quot;
                                    </h2>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-4 col-md-5">
                                    <h2 class="black text-center text-md-left mb-0">
                                        &mdash;&nbsp;<?php echo($name); ?>
                                    </h2>
                                    <?php
                                    if($info = get_field('reviewer_info', $testimonial)):
                                        ?>
                                        <div class="d-flex justify-content-center justify-content-md-start mb-md-2">
                                            <h2 class="black mb-0"><span>&mdash;&nbsp;</span></h2>
                                            <h3 class="black mb-0"><?php echo($info); ?></h3>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                                <div class="col-lg-2 col-md-1"></div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
        endif;
        ?>
    </section>
    <?php
else:
    echo('<div class="my-5"></div>');
endif;
?>