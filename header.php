<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta content="<?php bloginfo('description'); ?>" name="description">
  <meta name="author" content="" />
  <link rel="icon" href="<?php echo (get_site_icon_url()) ? get_site_icon_url() : get_template_directory_uri() . '/images/favicon.png'; ?>" type="image/x-icon">

  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700|Open+Sans:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet" />

  <!-- WordPress Head -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  //header options
  $header_site_logo = get_field('header_site_logo', 'option');
  $header_site_title = get_field('header_site_title', 'option');
  $header_phone = get_field('header_phone', 'option');
  $header_email = get_field('header_email', 'option');
  $header_navigation_menu = get_field('header_navigation_menu', 'option');
  ?>
  <div class="hero_area">
    <div class="hero_bg_box">
      <?php
        if( have_rows('flexible_content') ):
          while ( have_rows('flexible_content') ) : the_row();
              if( get_row_layout() == 'hero_section' ):
                  $hero_image = get_sub_field('hero_image');

                  if ( !empty( $hero_image ) ) {
                    echo '<img src="' . esc_url( $hero_image['url'] ) . '" alt="' . esc_attr( $hero_image['alt'] ) . '" />';
                  }
              endif;
          endwhile;
        endif;
      ?>
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <div class="header_nav">
          <?php
            if (!empty( $header_site_logo ) || !empty( $header_site_title )) {
              echo '<a class="navbar-brand brand_desktop" href="' . home_url() . '">';
                if ( !empty( $header_site_logo ) ) {
                  echo '<img src="' . esc_url( $header_site_logo['url'] ) . '" alt="' . esc_attr( $header_site_logo['alt'] ) . '" />';
                }
                if ( !empty( $header_site_title ) ) {
                  echo '<span>' . $header_site_title . '</span>';
                }
              echo '</a>';
            }
          ?>
          <div class="main_nav">
            <div class="top_nav">
                <?php
                  if ( !empty( $header_phone ) || !empty( $header_email ) ) {
                    echo '<ul class=" ">';
                      if ( !empty( $header_phone ) ) {
                        echo '<li class="">
                                <a class="" href="tel:' . $header_phone . '">
                                  <i class="fa fa-phone" aria-hidden="true"></i>
                                  Call : ' . $header_phone . '
                                </a>
                              </li>';
                      }
                      if ( !empty( $header_email ) ) {
                        echo '<li class="">
                                <a class="" href="mailto:' . $header_email . '">
                                  <i class="fa fa-envelope" aria-hidden="true"></i>
                                  Email : ' . $header_email . '
                                </a>
                              </li>';
                      }
                    echo '</ul>';
                  }
                ?>
              <form class="form-inline">
                <button class="btn nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </div>
            <div class="bottom_nav">
              <nav class="navbar navbar-expand-lg custom_nav-container">
                <?php
                  if (!empty( $header_site_logo ) || !empty( $header_site_title )) {
                    echo '<a class="navbar-brand brand_mobile" href="' . home_url() . '">';
                      if ( !empty( $header_site_logo ) ) {
                        echo '<img src="' . esc_url( $header_site_logo['url'] ) . '" alt="' . esc_attr( $header_site_logo['alt'] ) . '" />';
                      }
                      if ( !empty( $header_site_title ) ) {
                        echo '<span>' . $header_site_title . '</span>';
                      }
                    echo '</a>';
                  }
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <?php
                  if ( !empty( $header_navigation_menu ) ) {
                    wp_nav_menu(array(
                      'theme_location' => $header_navigation_menu,
                      'container' => false, // No container
                      'menu_class' => 'navbar-nav  ', // Bootstrap class for <ul>
                      'walker' => new Custom_Walker_Nav_Menu(), // Use the custom walker
                      'fallback_cb' => false, // No fallback
                    ));
                  }
                  ?>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header section -->

    <?php 
      if( have_rows('flexible_content') ):
        while ( have_rows('flexible_content') ) : the_row();
          if( get_row_layout() == 'hero_section' ):
            get_template_part('template-parts/slider');
          endif;
        endwhile;
      endif;
    ?>
  </div>