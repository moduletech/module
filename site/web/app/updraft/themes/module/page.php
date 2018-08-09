<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Module Housing Marcomm
 */

get_header(); ?>

<div class="page-container">
	<?php while ( have_posts() ) : the_post(); ?>

		<article class="post post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h2 class="single-title">
					<?php the_title(); ?>
				</h2>
				<p class="blog-meta">
	            	Last Updated <time datetime="<?php the_modified_time( 'Y-m-d' ); ?>" itemprop="datePublished"><?php echo the_modified_time( 'M. dS, Y' ); ?></time>
					<!--<span class="blog-meta__sep"> / </span>
					<a href="#">Share</a>-->
					<?php if(is_user_logged_in()) {
	                    echo "<span class='blog-meta__sep'> / </span>";
	                    edit_post_link('Edit Post');
	                }?>
	            </p>
			</header><!-- .entry-header -->
				<?php the_content(); ?>
		</article><!-- #post-## -->
	<?php endwhile; // End of the loop. ?>
</div>

<?php get_footer(); ?>
