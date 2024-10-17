<?php
  $about_title = get_sub_field('about_title');
  $about_description = get_sub_field('about_description');
  $about_button = get_sub_field('about_button');
  $about_image = get_sub_field('about_image');
  $section_remove_top_padding = get_sub_field('section_remove_top_padding');

  if ( !empty($about_title) || !empty($about_description) || !empty($about_button) || !empty($about_image) ) {
    ?>
    <!-- about section -->
    <section class="about_section <?php echo ( ! $section_remove_top_padding ) ? 'layout_padding' : 'layout_padding-bottom'; ?>">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6">
            <div class="detail-box">
              <?php
                if ( !empty($about_title) ) {
                  echo '<h2>' . $about_title . '</h2>';
                }
                if ( !empty($about_description) ) {
                  echo $about_description;
                }
                if ( !empty( $about_button ) ) {
                  $about_button_url = $about_button['url'];
                  $about_button_title = $about_button['title'];
                  $about_button_target = $about_button['target'] ? $about_button['target'] : '_self';
      
                  echo '<div class="btn-box"><a href="' . esc_url( $about_button_url ) . '" target="' . esc_attr( $about_button_target ) . '">' . esc_html( $about_button_title ) . '</a></div>';
                }
              ?>
            </div>
          </div>
          <div class="col-lg-7 col-md-6">
            <?php
              if ( !empty( $about_image ) ) {
                echo '<div class="img-box"><img src="' . esc_url( $about_image['url'] ) . '" alt="' . esc_attr( $about_image['alt'] ) . '" /></div>';
              }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- end about section -->
    <?php
  }
?>