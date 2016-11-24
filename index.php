<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/print.css" type="text/css" media="print" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <title>
    <?php bloginfo('name'); ?> <?php wp_title(); ?>
  </title>
  <style type="text/css">
    <!--
    /* Images included here for portability. */
    #heading, #footer {
      background-image:
      url('<?php bloginfo('template_directory'); ?>/images/vert_grey_bars.jpg');
    }
    #blog-menu-link {
      background-repeat: no-repeat;
      background-position: right center;
      background-image:url('<?php bloginfo('template_directory'); ?>/images/feed-icon-14x14.png');
      padding-right: 16px;
    }
    -->
  </style>
  <?php wp_head(); ?>
</head>
<body>

<div id="everything">
  <div id="heading">
    <h1>
      <a href="<?php echo get_option('home') ?>" title="Go to home page">
        tom <span id="m">m</span> wilson
      </a>
    </h1>
    <p>
      <img src="<?php bloginfo('template_directory'); ?>/images/site_banner.jpg"
           alt="Site Banner" />
    </p>
    <hr class="hide" />
  </div><!-- End div#heading -->
  
  <div id="menu">
    <p id="portrait">
      <a href="<?php echo get_option('home'); ?>" title="Welcome">
        <img src="http://tmwilson.org/wordpress/wp-content/uploads/2014/thomas.jpg" alt="Portrait of Tom." />
      </a>
    </p>
    <ol>
      <!--li><a href="/">welcome</a></li-->
      <li><a href="/about">about me</a></li>
      <!--li><a href="/podcast">podcast</a></li-->
      <li><a id="blog-menu-link" href="/blog">blog</a></li>
      <li><a href="/links">links</a></li>
    </ol>
    <hr class='hide' />
  </div><!-- End div#menu -->

  <div id="body">
  
	<?php if (is_archive()): ?>
		<?php query_posts( $query_string . '&posts_per_page=-1&order=asc' ) ?>
		<p class="archive-title">
			<?php
			if (is_day()) echo get_the_date();
			elseif (is_month()) echo get_the_date('F Y');
			elseif (is_year()) echo get_the_date('Y');
			elseif (is_category()) { $category = get_the_category(); echo 'the '.$category[0]->cat_name.' Category'; }
			?>
		</p>
	<?php endif ?>
  
  
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); if (is_archive()) { global $more; $more=1; } ?>
            <div class="post" id="post-<?php the_ID(); ?>">
                <h2>
                  <a  href="<?php the_permalink() ?>"
                      rel="bookmark"
                      title="Permanent Link to <?php the_title(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h2>
                <?php if (!is_page()) : ?>
                  <p class='date'><strong><?php the_time('F j<\sup>S</\sup>, Y') ?></strong></p>
                <?php endif; ?>

                <div class="entry">
                    <?php the_content('Read the rest of this entry &raquo;'); ?>
                    <?php if ('open' == $post->comment_status && !is_page() && !is_single()) { ?>
                      <p id="leave-a-comment">
                        <?php comments_popup_link( 'Leave a comment &raquo;', 'One comment &raquo;', '% comments so far &raquo;', '', ''); ?>
                      </p>
                    <?php } ?>
                </div>
                
                <?php
                if (the_title('','',FALSE)=="Links") {

                    /*$link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->categories WHERE cat_id!=1");
                    echo "<ul>";
                    foreach ($link_cats as $link_cat) {
                        echo "<li><a href='#".$link_cat->cat_name."'>".$link_cat->cat_name."</a></li>";
                    }
                    echo "</ul>";
                    echo "<dl>";  
                    foreach ($link_cats as $link_cat) {
                        echo "<h3><a name='".$link_cat->cat_name."'>".$link_cat->cat_name."</a></h3><dl>";
                        get_links($link_cat->cat_id, "<dt>", "</dd>", "</dt><dd>");
                    }
                    echo "</dl>";  */
                
                    $bookmark_options = array( 'hide_invisible' => 1, 'show_updated' => 0, 'echo' => 1,
                      'categorize' => 1, 'title_li' => __('Bookmarks'), 'title_before' => '<h3>',
                      'title_after' => '</h3><dl>', 'class' => 'linkcat', 'show_description' => 1,
                      'category_before' => '<dt>', 'category_after' => '</dt>');
                    wp_list_bookmarks($bookmark_options);

                }
                ?>
                
            </div>
        <?php endwhile; ?>

        <?php if(!is_page() && !is_single()): ?>
        <p class="prev-next-navigation noprint">
          <?php //next_posts_link('&laquo; Previous Entries |'); previous_posts_link('| Next Entries &raquo;') ?>
          <?php posts_nav_link(' | ','&laquo; Previous Page','Next Page &raquo;'); ?>
        </p>
        <?php elseif(!is_page()): ?>
        <hr />
        <p style="text-align:center">
        <?php previous_post_link(); ?> | <?php next_post_link(); ?>
        </p>
        <?php comments_template(); ?>
        <?php endif; ?>

        <?php if(!is_page()) { ?>
        <!--
        <hr />
        <p class="archives">View archives: <?php wp_get_archives("type=monthly&format=custom&after= | "); ?></p>
        -->
        <?php } ?>
          
    <?php else : ?>
        <h2>Not Found</h2>
        <p>Sorry, but you seem to be looking for something that isn't here.</p>
    <?php endif; ?>

    <!--p class="initials">
      <img src="<?php bloginfo('template_directory'); ?>/images/tmw.jpg" alt="T.M.W." />
    </p-->
  </div><!-- End div#body -->
  
  <div id="footer">
    <hr class='hide' />
    <ul>
      <li><a href="<?php bloginfo('atom_url'); ?>">News Feed</a></li>
      <li>Content &copy; Tom Wilson 2000&ndash;<?php echo date('Y'); ?></li>
      <!--li>Valid <a href="http://validator.w3.org/check?referer">HTML</a> &amp;
        <a href="http://jigsaw.w3.org/css-validator/validator?uri=">CSS</a></li-->
      <li><?php if (is_user_logged_in()) echo '<a href="/wordpress/wp-admin">Admin</a> | ' ?><?php wp_loginout() ?> |</li>
    </ul>
    <?php /* wp_footer(); Nothing but firestats was using this. */ ?>
  </div><!-- End div#footer -->
  
</div><!-- End div#everything -->
</body>
</html>
