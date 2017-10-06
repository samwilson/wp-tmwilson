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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
		  integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" />
	<style type="text/css">
		a, h1, div, p { color:white }
		a:hover { color: rgb(84,66,47); background-color:rgba(255,255,255,0.3); }
		#read-on { margin-top:4em; text-align:right }
		#read-on a { border:1px solid rgba(255,255,255,0.3); padding:0.2em; font-size:135% }
	</style>
	<?php wp_head(); ?>
</head>

<body>

	<main class="container-fluid">
		<div class="row mt-5">
			<header class="col-md-8">
				<h1 class="display-3"><?php bloginfo('name') ?></h1>
				<p class="mt-4 h1"><?php bloginfo('description') ?></p>
			</header>
			<article class="col-md-4">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<div class="text-justify"><?php the_content() ?></div>
				<p id="read-on" class="fixed-bottom mr-3"><a href="/about">Read on…</a></p>
				<?php endwhile; endif ?>
			</article>
		</div>
	</main>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js" integrity="sha256-V52dl3OFjoY+fYAkifhLJ7f1V7mZAKPGCQoWzoQxrEU=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$.backstretch("<?php bloginfo('template_directory'); ?>/images/front-page.jpg");
	</script>
</body>
</html>
