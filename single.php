<?php get_header();?>

<?php if(have_posts()) : 
  while(have_posts()): the_post(); ?>

<article <?php post_class(); ?>>

<h1 class='post__title'><i class="fa fa-paw"></i><?php the_title(); ?></h1>

<div class="postinfo">
<time datetime="<?php echo get_the_date('c');?>">
<?php echo get_the_date();?>
</time>
<?php if(has_category()) : ?>
&nbsp;<span><i class="fa fa-folder-open"></i>
<?= the_category(', '); ?>
</span>
<?php endif; ?>
<?php the_tags('<span><i class="fa fa-tags"></i> ', ', ', '</span>'); ?>
</div>
</div>

<div class="content">
<?php the_content(); ?>
</div>

<div class="navlink">
<?php if(is_smartphone()): ?>
<span class="navlink-prev">
<?php previous_post_link('%link ', '<i class="fa fa-arrow-circle-left"></i> 前の記事'); ?>
</span>
<span class="navlink-next">
<?php next_post_link('%link', '次の記事 <i class="fa fa-arrow-circle-right"></i>'); ?>
</span>
<?php else: ?>
<span class="navlink-prev">
<?php previous_post_link('%link ', '<i class="fa fa-arrow-circle-left"></i> %title'); ?>
</span>
<span class="navlink-next">
<?php next_post_link('%link', '%title <i class="fa fa-arrow-circle-right"></i>'); ?>
</span>
<?php endif; ?>
</div>

<?php comments_template(); ?>

</article>

<?php endwhile; endif;?>


<?php get_footer();?>

