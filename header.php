
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php wp_title('-', true, 'right');?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<?php if( is_smartphone()): ?>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-smartphone.css" media="(max-width: 899px)">
<?php endif; ?>
</head>
<?php wp_head(); ?>
<body>
<header>
<h1>
<a href="<?php echo home_url(); ?>">
<i class="fa fa-paw"></i>
<?php bloginfo('name'); ?></span>
</a>
</h1>
</header>
