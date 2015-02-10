<?php get_header();?>

<?php if(have_posts()) : 
  while(have_posts()): the_post(); ?>

<article <?php post_class(); ?>>

<h1 class='post__title'><?php the_title(); ?></h1>

<div class="postinfo">
<time datetime="<?php echo get_the_date('c');?>">
<?php echo get_the_date();?>
</time>
</div>

<?php the_content(); ?>

<div class="navlink">
<span class="navlink-prev">
<?php previous_post_link('%link ', '<i class="icon-chevron-sign-left"></i> %title'); ?>
</span>

<span class="navlink-next">
<?php next_post_link('%link', '%title <i class="icon-chevron-sign-right"></i>'); ?>
</span>
</div>

<?php comments_template(); ?>

</article>

<?php endwhile; endif;?>


<?php get_footer();?>

