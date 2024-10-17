<?php
    $contact_heading = get_sub_field('contact_heading');
    $contact_form_shortcode = get_sub_field('contact_form_shortcode');
    $contact_map = get_sub_field('contact_map');
    $section_remove_top_padding = get_sub_field('section_remove_top_padding');

    if ( !empty( $contact_heading ) || !empty( $contact_form_shortcode ) || !empty( $contact_map ) ) {
        ?>
        <!-- contact section -->
        <section class="contact_section <?php echo ( ! $section_remove_top_padding ) ? 'layout_padding' : 'layout_padding-bottom'; ?>">
            <div class="container">
                <?php
                    if ( !empty( $contact_heading ) ) {
                        ?>
                        <div class="heading_container">
                            <?php echo '<h2>' . $contact_heading . '</h2>'; ?>
                        </div>
                        <?php
                    }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php 
                            if ( !empty( $contact_form_shortcode ) ) {
                                echo do_shortcode( $contact_form_shortcode );
                            }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                            if ( !empty( $contact_map ) ) {
                                ?>
                                <div class="map_container">
                                    <div class="map">
                                        <div id="googleMap" style="width:100%;height:100%;"></div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                echo $contact_map;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact section -->
        <?php
    }
?>