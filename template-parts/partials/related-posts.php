<?php
/**
 * Partial for related posts view
 */


    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);

    if ($tags) {?>
    
    <div class="related-posts">
    <h3 class="title-section"><?php echo __('Related Posts','yinyang')?></h3>
    <div class="separator-bis">
        <span class="icon-color-mode"></span>
    </div>
    
    <ul class="related-slider">
        <?php $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=>6, // Number of related posts to display.
                'ignore_stiky_posts'=> 1
            );

        $my_query = new wp_query( $args );

        while( $my_query->have_posts()) : $my_query->the_post();
            
        ?>

        <li class="relatedthumb">
            <a href="<?php the_permalink()?>">
                <img src="<?php esc_url(yinyang_get_thumbnail($post,'post-thumb'));?>">

                <div class="related-info">
                    <?php the_title('<H4>','</H4>'); ?>
                    <span><?php the_date(); ?></span>
                    <span class="moretag" ><?php echo __('Read more','yinyang');?></span> 
                </div>
            </a>
           
        </li>

        <?php endwhile;
    }
    $post = $orig_post;
    wp_reset_query();
    ?>
</ul>
</div>
