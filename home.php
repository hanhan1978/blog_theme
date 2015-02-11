<?php get_header();?>
<section class="list">

<?php if(have_posts()) : 
  while(have_posts()): the_post(); ?>

<article <?php post_class(); ?>>
<a href="<?php the_permalink(); ?>">

<?php if(has_post_thumbnail()) : ?>
<div style='width:200px;height:150px;float:left;margin-right:15px;'>
    <?php the_post_thumbnail(); ?>
</div>
<?php else : ?>
    <?php if(preg_match('/wp-image-(\d+)/', $post->post_content, $thum)) : ?>
        <div style='width:200px;height:150px;float:left;margin-right:15px;'>
        <?php echo wp_get_attachment_image($thum[1]); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<h1 class='post__title'><?php the_title(); ?></h1>
<div class="postinfo">
<time datetime="<?php echo get_the_date('c');?>">
<?php echo get_the_date(); ?>
</time>
</div>
<?php the_excerpt(); ?>
</a>
</article>

<?php endwhile; endif;?>


<!--ページャー-->
<div class="pager">
  <?php global $wp_rewrite;
  $paginate_base = get_pagenum_link(1);
  if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
    $paginate_format = '';
    $paginate_base = add_query_arg('paged','%#%');
  }
  else{
    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
    user_trailingslashit('page/%#%/','paged');;
    $paginate_base .= '%_%';
  }
  echo paginate_links(array(
    'base' => $paginate_base,
    'format' => $paginate_format,
    'total' => $wp_query->max_num_pages,
    'mid_size' => 5,
    'current' => ($paged ? $paged : 1),
    'prev_text' => '«',
    'next_text' => '»',
  )); ?>
</div>


</section>


<?php get_footer();?>

