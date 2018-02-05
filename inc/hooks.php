<?php 

if(!function_exists( 'yinyang_add_related_posts')){

    function yinyang_add_related_posts(){

        if('1' === get_option( 'yinyang_show_related_posts', '0' )):

            get_template_part('template-parts/partials/related-posts');

        endif;
    }
}
    
add_action( 'yinyang_related_posts', 'yinyang_add_related_posts' ,10);




if(!function_exists( 'yinyang_add_share_icons')){

    function yinyang_add_share_icons(){

        get_template_part('template-parts/partials/share-icons');
    
    }
}

add_action( 'yinyang_shared_icons', 'yinyang_add_share_icons' ,10);


?>