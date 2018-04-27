<?php
/**
 * Template Name: Page with Right Sidebar
**/

get_header(); ?>

<div class="container">
    <div class="middle-align">       
		<div id="content-ts" class="container">
            <div class="middle-align">
                <div class="col-md-12">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content();?>
                    <?php
                        //If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-md-4">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>
        <div class="clear"></div>    
    </div>
</div>
<?php get_footer(); ?>