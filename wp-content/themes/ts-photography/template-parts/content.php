<?php
/**
 * The template part for displaying services
 *
 * @package ts-photography
 * @subpackage ts-photography
 * @since ts-photography 1.0
 */
?>  
<div class="page-box">
    <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
    <hr>
    <span class="entry-date"><?php the_date(); ?></span>
    <div class="box-image">
        <?php the_post_thumbnail();  ?>
    </div>
    <p><?php the_excerpt();?></p>
    <hr class="con-hr">
    <div class="content-bttn">     
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'ts-photography' ); ?>"><?php esc_html_e('Read More','ts-photography'); ?></a>
    </div>
</div>