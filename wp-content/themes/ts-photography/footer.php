<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ts-photography
 */
?>
    <div  id="footer" class="copyright-wrapper">
      <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-1');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-2');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-3');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-4');?>
            </div>        
        </div>
      </div>
    </div>
      <div class="abovecopyright">
        <div class="container">
          <div class="copyright col-md-6 col-sm-6">
            <p><?php echo esc_html(get_theme_mod('ts_photography_footer_copy',__('copyright 2018 Photography Theme By','ts-photography'))); ?> <?php echo esc_html(ts_photography_credit(),'ts-photography'); ?></p>
          </div>
          <div class="social-media col-md-6 col-sm-6">
            <?php if( get_theme_mod( 'ts_photography_facebook_url','' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'ts_photography_facebook_url','' ) ); ?>"><i class="fab fa-facebook-square"></i></a>
            <?php } ?>                       
            <?php if( get_theme_mod( 'ts_photography_twitter_url','' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'ts_photography_twitter_url','' ) ); ?>"><i class="fab fa-twitter-square"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'ts_photography_youtube_url','' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'ts_photography_youtube_url','' ) ); ?>"><i class="fab fa-youtube-square"></i></a>
            <?php } ?> 
            <?php if( get_theme_mod( 'ts_photography_rss_url','' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'ts_photography_rss_url','' ) ); ?>"><i class="fas fa-rss-square"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'ts_photography_insta_url','' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'ts_photography_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'ts_photography_pint_url','' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'ts_photography_pint_url','' ) ); ?>"><i class="fab fa-pinterest-square"></i></a>
            <?php } ?>
          </div>
          <div class="clear"></div>
        </div>       
      </div>
    <?php wp_footer(); ?>
  </body>
</html>