<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<title>Tom M. Wilson &raquo; <?php the_title(); ?></title>
	<link rel="stylesheet" href="http://tmwilson.org/wordpress/wp-content/themes/tmwilson.org/style.css" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="Tom M. Wilson RSS Feed" href="http://tmwilson.org/feed/" />
	<link rel="pingback" href="http://tmwilson.org/wordpress/xmlrpc.php" />
	<style type="text/css" media="screen">
		* {
			border: 0;
			padding: 0;
			margin: 0;
			text-align: center;
		}
		body, a, h1 {
			background-color: black;
			color: white;
			text-decoration:none;
			margin: 0;
			padding: 0;
		}
		h1 {
			font-size: 1em;
		}
		a:hover {
			color: #ab583e;
		}
		img {
			height: 95%;
			border:0
		}
		.caption {
		}
		.nav-link {
			font-size: 7em;
			color: #eee;
			font-family: Impact, Haettenschweiler, "Franklin Gothic Bold", Charcoal, "Helvetica Inserat", "Bitstream Vera Sans Bold", "Arial Black", sans-serif;
			position: absolute;
			top: 40%;
		}
		.nav-link.prev {
			left: 5px
		}
		.nav-link.next {
			right: 5px
		}
	</style>
</head>
<body <?php body_class(); ?>>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

<h1>
	<a href="<?php echo get_permalink( $post->post_parent ); ?>" rev="attachment" title="Return to blog post.">
		<?php echo the_title(); ?>
	</a>
</h1>

<p>
	<span class='nav-link prev'><?php previous_image_link( 0, '&larr;' ); ?></span>
	<a href="<?php echo get_permalink( $post->post_parent ); ?>" rev="attachment" title="Return to blog post.">
		<?php wp_get_attachment_image( $post->ID, 'full' ); ?>
	</a>
	<span class='nav-link next'><?php next_image_link( 0, '&rarr;' ); ?></span>
</p>

<div class="caption">
		<?php
		if ( ! empty( $post->post_excerpt ) ) {
			the_excerpt();
		}
		?>
		<br />
</div>

		<?php
	endwhile;
endif;
?>

</body>
</html>
