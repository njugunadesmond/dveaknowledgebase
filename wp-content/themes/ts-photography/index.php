<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ts-photography
 */

get_header(); ?>
<?php /** post section **/ ?>
  <section id="our-services">
    <div class="innerlightbox">
		  <div class="container">
        <?php
          $left_right = get_theme_mod( 'ts_photography_layout_options','Right Sidebar');
          if($left_right == 'Left Sidebar'){ ?>
          <div class="col-md-4 col-sm-4">
            <?php get_sidebar();?>
          </div>
          <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-8 col-sm-8 col-xs-12'); ?>>
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content' ); 
              endwhile;
              else :
                get_template_part( 'no-results' );
              endif; 
            ?>
        	  <div class="navigation">
              <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'ts-photography' ),
                    'next_text'          => __( 'Next page', 'ts-photography' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ts-photography' ) . ' </span>',
                ) );
              ?>
             </div> 
    	    </div>
        <?php }else if($left_right == 'Right Sidebar'){ ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-8 col-sm-8 col-xs-12'); ?>>
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content' ); 
              endwhile;
              else :
                get_template_part( 'no-results' );
              endif; 
            ?>
            <div class="navigation">
              <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'ts-photography' ),
                    'next_text'          => __( 'Next page', 'ts-photography' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ts-photography' ) . ' </span>',
                ) );
              ?>
             </div> 
          </div>
      	  <div class="col-md-4 col-sm-4">
      			<?php get_sidebar();?>
      	  </div>
        <?php }else if($left_right == 'One Column'){ ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 col-xs-12'); ?>>
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content' ); 
              endwhile;
              else :
                get_template_part( 'no-results' );
              endif; 
            ?>
            <div class="navigation">
              <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'ts-photography' ),
                    'next_text'          => __( 'Next page', 'ts-photography' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ts-photography' ) . ' </span>',
                ) );
              ?>
             </div> 
          </div>
         <?php }else if($left_right == 'Three Columns'){ ?>
          <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1');?></div>
          <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 col-xs-12'); ?>>
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content' ); 
              endwhile;
              else :
                get_template_part( 'no-results' );
              endif; 
            ?>
            <div class="navigation">
              <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'ts-photography' ),
                    'next_text'          => __( 'Next page', 'ts-photography' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ts-photography' ) . ' </span>',
                ) );
              ?>
             </div> 
          </div>
          <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2');?></div>
        <?php }else if($left_right == 'Four Columns'){ ?>
          <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
          <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-3 col-sm-3 col-xs-12'); ?>>
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content' ); 
              endwhile;
              else :
                get_template_part( 'no-results' );
              endif; 
            ?>
            <div class="navigation">
              <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'ts-photography' ),
                    'next_text'          => __( 'Next page', 'ts-photography' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ts-photography' ) . ' </span>',
                ) );
              ?>
             </div> 
          </div>
          <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2');?></div>
          <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-3');?></div>
        <?php }else if($left_right == 'Grid Layout'){ ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 col-xs-12'); ?>>
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/grid-layout' ); 
              endwhile;
              else :
                get_template_part( 'no-results' );
              endif; 
            ?>
            <div class="navigation">
              <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'ts-photography' ),
                    'next_text'          => __( 'Next page', 'ts-photography' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ts-photography' ) . ' </span>',
                ) );
              ?>
             </div> 
          </div>
        <?php }?>
  		  <div class="clearfix"></div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>