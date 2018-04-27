<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<?php /** slider section **/ ?>
<div class="slider-main">
  <?php
    // Get pages set in the customizer (if any)
    $pages = array();
    for ( $count = 1; $count <= 5; $count++ ) {
      $mod = absint( get_theme_mod( 'ts_photography_slidersettings-page-' . $count ) );
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
    }
    
    if( !empty($pages) ) :
      $args = array(
        'posts_per_page' => 5,
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 1;
        ?>
        <div id="slider" class="nivoSlider">
          <?php
            $ts_photography_n = 0;
          while ( $query->have_posts() ) : $query->the_post();
              
              $ts_photography_n++;
              $ts_photography_slideno[] = $ts_photography_n;
              $ts_photography_slidetitle[] = get_the_title();
              $ts_photography_slidelink[] = esc_url( get_permalink() );
              ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $ts_photography_n ); ?>" />
              <?php
            $count++;
          endwhile;
          ?>
        </div>

        <?php
        $ts_photography_k = 0;
          foreach( $ts_photography_slideno as $ts_photography_sln ){ ?>
            <div id="slidecaption<?php echo esc_attr( $ts_photography_sln ); ?>" class="nivo-html-caption">
              <div class="slide-cap  ">
                <div class="container">
                  <h2><?php echo esc_html( $ts_photography_slidetitle[$ts_photography_k] ); ?></h2>
                  <a class="read-more" href="<?php echo esc_url( $ts_photography_slidelink[$ts_photography_k] ); ?>"><?php esc_html_e( 'DISCOVER MORE','ts-photography' ); ?></a>
                </div>
              </div>
            </div>
            <?php $ts_photography_k++;
        }
      else : ?>
          <div class="header-no-slider"></div>
        <?php
      endif;
    else : ?>
        <div class="header-no-slider"></div>
    <?php
    endif; 
  ?>
</div>

<?php /** post section **/ ?>
<section id="ts-photography">
  <div class="container">
    <?php 
      $page_query = new WP_Query(array( 'category_name' => get_theme_mod('ts_photography_category','theblog')));?>
      <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
        <div class="col-md-4 col-sm-4"> 
          <div class="imagebox">
            <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
          </div>
          <div class="contentbox">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
          </div>
        </div>
        <?php endwhile; 
        wp_reset_postdata();
    ?>      
    <div class="clearfix"></div>
  </div>
</section>

<?php get_footer(); ?>