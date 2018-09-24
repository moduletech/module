<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Module Housing Marcomm
 */

get_header(); ?>
<main class="blog-main">
	<div class="u-container">

    <div class="double-header">
      <h2 class="title"><?= get_the_title() ?></h2>
      <!--<h4 class="subtitle">Subtext</h4>-->
    </div>

		<section class="blog-loop">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
                    <article class="blog-loop__post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
                        <div class="blog-loop__post-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('blog-page');?>
                            </a>
                        </div>
                        <div class="blog-loop__post-content">
                            <h2 class="blog-loop__post-title">
                            	<a class="u-link-black" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                              </a>
                            </h2>
                            <?php the_excerpt();?>
                        </div><!-- /blog-loop__post-content-->
                    </article>
				<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
			<?php endif; ?>
		</section>
	</div>
</main>

<?php get_footer(); ?>
