    <?php
    $header_site_logo = get_field('header_site_logo', 'option');
    $header_site_title = get_field('header_site_title', 'option');
    ?>
    <!-- info section -->
    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row info_main-row">
                <div class="col-lg-3 info_logo_social">
                    <?php
                    if ( !empty( $header_site_logo ) || !empty( $header_site_title ) ) {
                        ?>
                        <div class="info_logo">
                            <a href="<?php echo home_url(); ?>">
                                <?php
                                    if ( !empty( $header_site_logo ) ) {
                                        ?>
                                        <img src="<?php echo esc_url( $header_site_logo['url'] ); ?>" alt="<?php echo esc_attr( $header_site_logo['alt'] ); ?>">
                                        <?php
                                    }
                                    if ( !empty( $header_site_title ) ) {
                                        ?>
                                        <span><?php echo $header_site_title; ?></span>
                                        <?php
                                    }
                                ?>
                            </a>
                        </div>
                        <?php
                    }
                    if( have_rows('footer_column_1', 'option') ):
                        ?>
                        <div class="info_social">
                            <?php
                            while( have_rows('footer_column_1', 'option') ): the_row();
                                $footer_facebook_link = get_sub_field('footer_facebook_link');
                                $footer_twitter_link = get_sub_field('footer_twitter_link');
                                $footer_linkedin_link = get_sub_field('footer_linkedin_link');

                                if ( !empty( $footer_facebook_link ) ) {
                                    ?>
                                    <a href="<?php esc_url( $footer_facebook_link ); ?>" target="_blank">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( !empty( $footer_twitter_link ) ) {
                                    ?>
                                    <a href="<?php esc_url( $footer_facebook_link ); ?>" target="_blank">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                                if ( !empty( $footer_linkedin_link ) ) {
                                    ?>
                                    <a href="<?php esc_url( $footer_facebook_link ); ?>" target="_blank">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                }
                            endwhile;
                            ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                <div class="col-lg-9">
                    <div class="row info_bottom_row">
                        <div class="col-md-4">
                            <?php
                            if( have_rows('footer_column_2', 'option') ):
                                while( have_rows('footer_column_2', 'option') ): the_row();
                                    $footer_col_2_title = get_sub_field('footer_col_2_title');
                                    $footer_col_2_description = get_sub_field('footer_col_2_description');

                                    if ( !empty( $footer_col_2_title ) ) {
                                        ?>
                                        <h4><?php echo $footer_col_2_title; ?></h4>
                                        <?php
                                    }
                                    if ( !empty( $footer_col_2_description ) ) {
                                        echo $footer_col_2_description;
                                    }
                                endwhile;
                            endif;
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if( have_rows('footer_column_3', 'option') ):
                                while( have_rows('footer_column_3', 'option') ): the_row();
                                    $footer_col_3_title = get_sub_field('footer_col_3_title');
                                    $footer_col_3_description = get_sub_field('footer_col_3_description');

                                    if ( !empty( $footer_col_3_title ) ) {
                                        ?>
                                        <h4><?php echo $footer_col_3_title; ?></h4>
                                        <?php
                                    }
                                    if ( !empty( $footer_col_3_description ) ) {
                                        echo $footer_col_3_description;
                                    }
                                endwhile;
                            endif;
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if( have_rows('footer_column_4', 'option') ):
                                while( have_rows('footer_column_4', 'option') ): the_row();
                                    $footer_col_4_title = get_sub_field('footer_col_4_title');
                                    $footer_col_4_address = get_sub_field('footer_col_4_address');
                                    $footer_col_4_phone = get_sub_field('footer_col_4_phone');
                                    $footer_col_4_email = get_sub_field('footer_col_4_email');

                                    if ( !empty( $footer_col_4_title ) ) {
                                        ?>
                                        <h4><?php echo $footer_col_4_title; ?></h4>
                                        <?php
                                    }
                                    if ( $footer_col_4_address || $footer_col_4_phone || $footer_col_4_email ) {
                                        ?>
                                        <div class="info_contact">
                                            <?php
                                                if ( !empty( $footer_col_4_address ) ) {
                                                    ?>
                                                    <a href="<?php echo esc_url( $footer_col_4_address['url'] ); ?>" target="<?php echo esc_attr( $footer_col_4_address['target'] ); ?>">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        <span><?php echo esc_html( $footer_col_4_address['title'] ); ?></span>
                                                    </a>
                                                    <?php
                                                }
                                                if ( !empty( $footer_col_4_phone ) ) {
                                                    ?>
                                                    <a href="tel:<?php echo $footer_col_4_phone; ?>">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                        <span>Call <?php echo $footer_col_4_phone; ?></span>
                                                    </a>
                                                    <?php
                                                }
                                                if ( !empty( $footer_col_4_email ) ) {
                                                    ?>
                                                    <a href="mailto:<?php echo $footer_col_4_email; ?>">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        <span><?php echo $footer_col_4_email; ?></span>
                                                    </a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                    <form action="" class="info_form">
                        <input type="email" placeholder="Enter Your email">
                        <button type="submit">
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end info section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
            &copy; <span id="displayDateYear"></span> All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->

    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
    <?php
        $google_api_key = get_field('theme_google_api_key', 'option');
        if ( !empty( $google_api_key ) ) {
            ?>
            <!-- Google Map -->
            <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_api_key; ?>&callback=myMap"></script>
            <!-- End Google Map -->
            <?php
        }
    ?>
    <!-- WordPress Footer Hook -->
    <?php wp_footer(); ?>
</body>

</html>