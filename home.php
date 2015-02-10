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

<time datetime="<?php echo get_the_date('c');?>">
<?php echo get_the_date();?>
</time>
<h1 class='post__title'><?php the_title(); ?></h1>


<?php the_excerpt(); ?>

</a>
</article>

<?php endwhile; endif;?>
</section>


<?php get_footer();?>

