<?php
  $services_heading = get_sub_field('services_heading');
  $services_service_button = get_sub_field('services_service_button');
  $section_remove_top_padding = get_sub_field('section_remove_top_padding');

  if ( !empty( $services_heading ) || !empty( $services_service_button ) ) {
    ?>
    <!-- service section -->
    <section class="service_section <?php echo ( ! $section_remove_top_padding ) ? 'layout_padding' : 'layout_padding-bottom'; ?>">
      <div class="container">
        <?php
          if ( !empty( $services_heading ) ) {
            ?>
            <div class="heading_container">
              <h2><?php echo esc_html( $services_heading ); ?></h2>
            </div>
            <?php
          }

          // Loop through the nested repeater field "services_services"
          if( have_rows('services_services') ):
            ?>
            <div class="row">
              <?php
              while( have_rows('services_services') ) : the_row();
                $services_service_icon = get_sub_field('services_service_icon');
                $services_service_title = get_sub_field('services_service_title');
                $services_service_description = get_sub_field('services_service_description');
            
                if ( !empty( $services_service_icon ) || !empty( $services_service_title ) || !empty( $services_service_description) ) {
                  ?>
                  <div class="col-md-4">
                    <div class="box">
                      <?php
                      if ( !empty( $services_service_icon ) ) {
                        ?>
                        <div class="img-box">
                          <img src="<?php echo esc_url( $services_service_icon['url'] ); ?>" alt="<?php echo esc_attr( $services_service_icon['alt'] ); ?>" />
                        </div>
                        <?php
                      }
                      ?>
                      <div class="detail-box">
                        <?php
                            if ( !empty( $services_service_title ) ) {
                              ?>
                              <h4><?php echo esc_html( $services_service_title ); ?></h4>
                              <?php
                            }
                            if ( !empty( $services_service_description ) ) {
                              echo wp_kses_post( $services_service_description );
                            }
                        ?>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              endwhile;
              ?>
            </div>
            <?php
          endif;

          if ( !empty( $services_service_button ) ) {
            $services_service_button_url = $services_service_button['url'];
            $services_service_button_title = $services_service_button['title'];
            $services_service_button_target = $services_service_button['target'] ? $services_service_button['target'] : '_self';
            ?>
            <div class="btn-box">
              <a href="<?php echo esc_url( $services_service_button_url ); ?>" target="<?php echo esc_attr( $services_service_button_target ); ?>"><?php echo esc_html( $services_service_button_title ); ?></a></div>
            <?php
          }
        ?>
      </div>
    </section>
    <!-- end service section -->
    <?php
  }
?>