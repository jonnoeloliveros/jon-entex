<?php
    get_header();
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();

            if( have_rows('flexible_content') ):
                while( have_rows('flexible_content') ): the_row();

                    if( get_row_layout() == 'services_section' ):
                        get_template_part( 'template-parts/service' );

                    elseif( get_row_layout() == 'about_section' ):
                        get_template_part( 'template-parts/about' );

                    elseif( get_row_layout() == 'why_section' ):
                        get_template_part( 'template-parts/why' );

                    elseif( get_row_layout() == 'clients_section' ):
                        get_template_part( 'template-parts/clients' );

                    elseif( get_row_layout() == 'contact_section' ):
                        get_template_part( 'template-parts/contact' );

                    endif;

                endwhile;
            endif;
        }
    }
    get_footer();
?>