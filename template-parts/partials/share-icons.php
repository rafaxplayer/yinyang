
<?php
 if(is_front_page()){
     return;
 }
?>
<div class="social">
    <ul>
        <li class="displayer"><i class="icon-share"></i></li>
        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook."><i class="icon-facebook"></i></a></li>
        <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="icon-google-plus"></i></a></li>
        <li><a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!"><i class="icon-twitter"></i></a></li>
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"><i class="icon-linkedin2"></i></a></li>
        <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>"><i class="icon-pinterest2"></i></a></li>
    </ul>
</div>