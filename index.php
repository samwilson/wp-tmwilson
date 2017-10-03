<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=2" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
		  integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed"
		  href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<title><?php bloginfo( 'name' ) ?><?php wp_title() ?></title>
	<style type="text/css">
		header, footer {
			background-image: url('<?php bloginfo('template_directory'); ?>/images/vert_grey_bars.jpg');
		}
		header .banner {
			background-image: url('<?php bloginfo('template_directory'); ?>/images/site_banner.jpg');
		}
	</style>
	<?php wp_head(); ?>
</head>
<body>

<div class="container" id="everything">
	<header class="row">
		<h1 class="col-12">
			<a href="<?php echo get_option( 'home' ) ?>" title="Go to home page">
				thomas <span id="m">m</span> wilson
			</a>
		</h1>
		<p class="col-12 banner"></p>
	</header>

	<div class="row">

		<nav id="menu" class="col-12 col-sm-2 order-sm-2">
			<p id="portrait" class="d-none d-sm-block">
				<a href="<?php echo get_option( 'home' ) ?>" title="Go to home page">
					<img src="https://tmwilson.org/wordpress/wp-content/uploads/2014/thomas.jpg" alt="Portrait of Tom"
						 class="img-fluid" />
				</a>
			</p>
			<ol class="text-center text-sm-right">
				<li class="d-inline">
					<a class="d-inline d-sm-block" href="<?php echo site_url( 'about' ) ?>">About me</a>
				</li>
				<li class="d-inline">
					<a class="d-inline d-sm-block" href="<?php echo site_url( 'blog' ) ?>" id="blog-menu-link">Blog</a>
				</li>
				<li class="d-inline">
					<a class="d-inline d-sm-block" href="<?php echo site_url( 'links' ) ?>">Links</a>
				</li>
			</ol>
		</nav>

		<main id="body" class="col-12 col-sm-10 order-sm-1">

			<?php if ( is_archive() ): ?>
				<?php query_posts( $query_string . '&posts_per_page=-1&order=asc' ) ?>
				<p class="archive-title">
					<?php
					if ( is_day() ) {
						echo get_the_date();
					} elseif ( is_month() ) {
						echo get_the_date( 'F Y' );
					} elseif ( is_year() ) {
						echo get_the_date( 'Y' );
					} elseif ( is_category() ) {
						$category = get_the_category();
						echo 'the ' . $category[0]->cat_name . ' Category';
					}
					?>
				</p>
			<?php endif ?>


			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();
					if ( is_archive() ) {
						global $more;
						$more = 1;
					} ?>
					<article class="post container" id="post-<?php the_ID(); ?>">
						<h2>
							<a href="<?php the_permalink() ?>"
							   rel="bookmark"
							   title="Permanent Link to <?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						<?php if ( ! is_page() ) : ?>
							<p class='date'><strong><?php the_time( 'F j<\sup>S</\sup>, Y' ) ?></strong></p>
						<?php endif; ?>

						<div class="entry">
							<?php the_content( 'Read the rest of this entry &raquo;' ); ?>
							<?php if ( 'open' == $post->comment_status && ! is_page() && ! is_single() ) { ?>
								<p id="leave-a-comment">
									<?php comments_popup_link( 'Leave a comment &raquo;', 'One comment &raquo;',
										'% comments so far &raquo;', '', '' ); ?>
								</p>
							<?php } ?>
						</div>

						<?php
						if ( the_title( '', '', false ) == "Links" ) {
							$bookmark_options = array(
								'hide_invisible'   => 1,
								'show_updated'     => 0,
								'echo'             => 1,
								'categorize'       => 1,
								'title_li'         => __( 'Bookmarks' ),
								'title_before'     => '<h3>',
								'title_after'      => '</h3><dl>',
								'class'            => 'linkcat',
								'show_description' => 1,
								'category_before'  => '<dt>',
								'category_after'   => '</dt>'
							);
							wp_list_bookmarks( $bookmark_options );
						}
						?>

					</article>
				<?php endwhile; ?>

				<?php if ( ! is_page() && ! is_single() ): ?>
					<p class="text-center noprint">
						<?php posts_nav_link( ' | ', '&laquo; Previous Page', 'Next Page &raquo;' ); ?>
					</p>
				<?php elseif ( ! is_page() ): ?>
					<hr/>
					<p class="row">
						<span class="col-6 text-left"><?php previous_post_link(); ?></span>
						<span class="col-6 text-right"><?php next_post_link(); ?></span>
					</p>
					<?php comments_template(); ?>
				<?php endif; ?>

			<?php else : ?>
				<article class="container">
					<h2>Not Found</h2>
					<p>Sorry, but you seem to be looking for something that isn't here.</p>
				</article>
			<?php endif; ?>

		</main>
	</div>

	<footer class="row pt-3">
		<p class="col-<?php echo is_user_logged_in() ? 3 : 4 ?> text-center"><a href="<?php bloginfo( 'atom_url' ); ?>">News feed</a></p>
		<p class="col-<?php echo is_user_logged_in() ? 3 : 4 ?> text-center">Content &copy; Thomas M. Wilson 2000&ndash;<?php echo date( 'Y' ); ?></p>
		<?php if ( is_user_logged_in() ): ?>
		<p class="col-<?php echo is_user_logged_in() ? 3 : 4 ?> text-center"><a href="<?php echo admin_url() ?>">Admin</a></p>
		<?php endif ?>
		<p class="col-<?php echo is_user_logged_in() ? 3 : 4 ?> text-center"><?php wp_loginout() ?></p>
	</footer>

</div><!-- End div#everything -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
		integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
		integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
		crossorigin="anonymous"></script>

<?php wp_footer() ?>
</body>
</html>
