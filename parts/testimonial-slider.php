<?php
if ($show_testimonials = get_field('show_testimonials')):
    echo $show_testimonials;

    $testimonials = get_field('active_testimonials', 'options');
    print_r($testimonials);

    ?>
    <section id="testimonial" class="py-xl-5 py-md-4 py-5">
        <div class="container">
            <div class="slider-hand-arrows">



            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <h2 class="black text-center my-md-3">"Fusek's hardware is a very convenient location for people in the downtown area. They have competitive prices and competent emplyees. I am very well treated and always welcome to shop at my leisure or just visit to see what is new or on sale."</h2>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 col-md-5">
                    <h2 class="black mb-0">&mdash;&nbsp;Clayton P.</h2>
                    <div class="d-flex mb-md-2">
                        <h2 class="black mb-0"><span>&mdash;&nbsp;</span></h2>
                        <h3 class="black mb-0">Customer since 2018</h3>
                    </div>
                </div>
                <div class="col-lg-2 col-md-1"></div>
            </div>
        </div>
    </section>
    <?php
endif;
?>
