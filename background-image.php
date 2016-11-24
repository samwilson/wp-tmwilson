<?php
/*
Template Name: background-image
*/
?>

<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/print.css" type="text/css" media="print" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta http-equiv="imagetoolbar" content="false" />	
	<title>
	<?php bloginfo('name'); ?> <?php wp_title(); ?>
	</title>
	<style type="text/css">
		* { padding: 0; margin: 0; font-size:110%;
			font-family: Corbel, "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", "Bitstream Vera Sans", "Liberation Sans", Verdana, "Verdana Ref", sans-serif;
		}
		p { color: #fff; font-size: 16px; line-height: 24px; margin-bottom: 22px; -webkit-font-smoothing: antialiased; }
		a { color: #fff; text-decoration: none }
		a:hover { color: rgb(84,66,47); background-color:rgba(255,255,255,0.3); }
		h1 { padding: 50px 0 0 0; margin: 0 auto 0 50px; color:white; letter-spacing:0.12em; font-size:2.7em;
			font-family: Impact, Haettenschweiler, "Franklin Gothic Bold", Charcoal, "Helvetica Inserat", "Bitstream Vera Sans Bold", "Arial Black", sans-serif;
		}
		#content { width: 360px; padding: 0 0 0 150px; margin: -35px 50px 0 auto !important; text-align:justify }
		#read-on { position:absolute; bottom:50px; right:50px; width:360px; text-align:center; font-size:120% }
		#read-on a { padding:0.1em; border:1px solid rgba(255,255,255,0.3); }
	</style>
	<?php wp_head(); ?>
</head>	
    
<body>

	<h1>tom m wilson</h1>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

<div id="content"><?php the_content() ?></div>

<p id="read-on"><a href="/about">Read on…</a></p>


<!--include jquery & backstretch-->
<script type="text/javascript"
        src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/jquery.backstretch.min.js"></script>
<script type="text/javascript">
	$.backstretch("<?php echo get_post_meta($post->ID, 'background-image', true) ?>", {speed: 150});
</script>

<?php endwhile; endif ?>

</body>	

</html>
