<?php
  $why_background_image = get_sub_field('why_background_image');
  $why_heading = get_sub_field('why_heading');
  $why_button = get_sub_field('why_button');
  $whys_items = get_sub_field('whys_items');
  $section_remove_top_padding = get_sub_field('section_remove_top_padding');

  if ($why_background_image || $why_heading || $why_button || $whys_items) {
    ?>
    <!-- why section -->
    <section class="why_section <?php echo ( ! $section_remove_top_padding ) ? 'layout_padding' : 'layout_padding-bottom'; ?>">
      <div class="container">
        <div class="heading_container">
          <?php
            if ( !empty( $why_heading ) ) {
              ?>
              <h2><?php echo $why_heading; ?></h2>
              <?php
            }
          ?>
        </div>
        <div class="why_container">
          <div class="why_bg_box">
            <?php 
              if ( !empty( $why_background_image ) ) {
                ?>
                <img src="<?php echo esc_url( $why_background_image['url'] ); ?>" alt="<?php echo esc_attr( $why_background_image['alt'] ); ?>" />
                <?php
              }
            ?>
          </div>
          <?php
            if( have_rows('whys_items') ):
              ?>
              <div class="row">
              <?php
                while( have_rows('whys_items') ) : the_row();
                  $whys_item_icon = get_sub_field('whys_item_icon');
                  $whys_item_title = get_sub_field('whys_item_title');
                  $whys_item_description = get_sub_field('whys_item_description');
                  ?>
                  <div class="col-md-6">
                    <div class="box">
                      <?php
                        if ( !empty( $whys_item_icon ) ) {
                          ?>
                          <div class="img-box">
                            <img src="<?php echo esc_url( $whys_item_icon['url'] ); ?>" alt="<?php echo esc_attr( $whys_item_icon['alt'] ); ?>" />
                          </div>
                          <?php
                        }
                      ?>
                      <div class="detail-box">
                        <?php
                          if ( !empty( $whys_item_title ) ) {
                            ?>
                            <h6><?php echo $whys_item_title; ?></h6>
                            <?php
                          }
                          if ( !empty( $whys_item_description ) ) {
                            echo $whys_item_description;
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                <?php
                endwhile;
              ?>
              </div>
            <?php
            endif;
          ?>
        </div>
        <?php
          if ( !empty( $why_button ) ) {
            $why_button_url = $why_button['url'];
            $why_button_title = $why_button['title'];
            $why_button_target = $why_button['target'] ? $why_button['target'] : '_self';

            echo '<div class="btn-box"><a href="' . esc_url( $why_button_url ) . '" target="' . esc_attr( $why_button_target ) . '">' . esc_html( $why_button_title ) . '</a></div>';
          }
        ?>
      </div>
    </section>
    <!-- end why section -->
    <?php
  }
?>