<?php
/*
Template Name: background-image
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
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

	<h1><?php bloginfo('name'); ?></h1>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<div id="content"><?php the_content() ?></div>
		<p id="read-on"><a href="<?php echo site_url('about') ?>">Read on…</a></p>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js" integrity="sha256-V52dl3OFjoY+fYAkifhLJ7f1V7mZAKPGCQoWzoQxrEU=" crossorigin="anonymous"></script>
		<script type="text/javascript">
			$.backstretch("<?php bloginfo('template_directory'); ?>/images/front-page.jpg");
		</script>

	<?php endwhile; endif ?>

</body>
</html>
