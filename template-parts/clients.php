<?php
  $clients_heading = get_sub_field('clients_heading');
  $clients_description = get_sub_field('clients_description');
  $section_remove_top_padding = get_sub_field('section_remove_top_padding');
  $args = array( 'post_type' => 'client', 'posts_per_page' => -1, 'post_status' => 'publish' );
  $clients = get_posts($args);
  $clients_query = new WP_Query( $args );

  if ( !empty( $clients_heading ) || !empty( $clients_description ) || !empty( $clients ) ) {
    ?>
    <!-- client section -->
    <section class="client_section <?php echo ( ! $section_remove_top_padding ) ? 'layout_padding' : 'layout_padding-bottom'; ?>">
      <div class="container">
        <?php
          if ( !empty( $clients_heading ) || !empty( $clients_description ) ) {
            ?>
            <div class="heading_container">
              <?php
                if ( !empty( $clients_heading )) {
                  ?>
                  <h2><?php echo $clients_heading; ?></h2>
                  <?php
                }
                if ( !empty( $clients_description ) ) {
                  echo $clients_description;
                }
              ?>
            </div>
            <?php
          }

          if ( $clients_query->have_posts() ) {
            ?>
            <div class="carousel-wrap layout_padding2-top ">
              <div div class="owl-carousel">
                <?php
                while ( $clients_query->have_posts()) {
                  $clients_query->the_post();
                  $client_name = get_the_title();
                  $client_star_rating = get_field('client_star_rating');
                  $client_feedback = get_field('client_feedback');
                  $image = get_the_post_thumbnail( get_the_ID(), 'full' );

                  if ( !empty( $client_feedback ) || !empty( $image ) ) {
                    ?>
                    <div class="item">
                      <div class="box">
                        <?php
                          if ( !empty( $image ) ) {
                            ?>
                            <div class="img-box">
                              <?php
                                echo $image;
                              ?>
                            </div>
                            <?php
                          }
                          if ( !empty( $client_star_rating ) || !empty( $client_feedback ) ) {
                            ?>
                            <div class="detail-box">
                              <div class="client_info">
                                <h6><?php echo $client_name; ?></h6>
                                <?php
                                  for ( $i=0; $i < $client_star_rating; $i++ ) { 
                                    ?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <?php
                                  }
                                ?>
                              </div>
                              <?php
                                if ( !empty( $client_feedback ) ) {
                                  echo $client_feedback;
                                }
                              ?>
                            </div>
                            <?php
                          }
                        ?>
                      </div>
                    </div>
                    <?php
                  }
                }
                ?>
                </div>
              </div>
            <?php    
          }
          wp_reset_postdata();
        ?>
      </div>
    </section>
    <!-- end client section -->
    <?php
  }
?>