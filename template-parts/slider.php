<?php
    $hero_slider_show_slider = get_sub_field('hero_slider_show_slider');
    $hero_silder = get_sub_field('hero_silder');

    if ( $hero_slider_show_slider === true && !empty( $hero_silder ) ) {
        ?>
        <!-- slider section -->
        <section class=" slider_section position-relative">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                        $count = 0;
                        if( have_rows('hero_silder') ):
                            while( have_rows('hero_silder') ) : the_row();
                                $hero_slider_title = get_sub_field('hero_slider_title');
                                $hero_slider_description = get_sub_field('hero_slider_description');
                                $hero_slider_button = get_sub_field('hero_slider_button');

                                if ( !empty( $hero_slider_title ) || !empty( $hero_slider_description ) || !empty( $hero_slider_button ) ) {
                                    ?>
                                    <div class="carousel-item <?php echo ( $count == 0) ? 'active' : ''; ?>">
                                        <div class="container">
                                            <div class="col-md-8 col-lg-7 px-0">
                                                <div class="box">
                                                    <div class="detail-box">
                                                        <?php
                                                            if ( !empty( $hero_slider_title ) ) {
                                                                echo '<h1>' . $hero_slider_title . '</h1>';
                                                            }
                                                            if ( !empty( $hero_slider_description ) ) {
                                                                echo $hero_slider_description;
                                                            }
                                                            if ( !empty( $hero_slider_button ) ) {
                                                                $hero_slider_button_url = $hero_slider_button['url'];
                                                                $hero_slider_button_title = $hero_slider_button['title'];
                                                                $hero_slider_button_target = $hero_slider_button['target'] ? $hero_slider_button['target'] : '_self';
                                                                ?>
                                                                <div class="btn-box">
                                                                    <a class="btn-1" href="<?php echo esc_url( $hero_slider_button_url ); ?>" target="<?php echo esc_attr( $hero_slider_button_target ); ?>"><?php echo esc_html( $hero_slider_button_title ); ?></a>
                                                                </div>
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $count += 1;
                                }
                            endwhile;
                        endif;
                    ?>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- end slider section -->
        <?php
    }
?>