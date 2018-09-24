<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Module Marcomm
 */

get_header(); ?>

<main class="blog-main">
    <div class="u-container">
        <section class="blog-single">
          <div class="double-header">
            <h2 class="title"><?= get_the_title() ?></h2>
            <!--<h4 class="subtitle">Subtext</h4>-->
          </div>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) :
                    the_post(); ?>
                    <article class="blog-loop__post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
                        <div class="blog-loop__post-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('blog-page');?>
                            </a>
                            <meta itemprop="url" content="<?php the_post_thumbnail_url('blog-page'); ?> ">
                            <meta itemprop="width" content="800">
                            <meta itemprop="height" content="400">
                        </div>
                        <div class="blog-loop__post-content">
                            <div class="blog-content" itemprop="articleBody">
                                <?php the_content();?>
                            </div>
                            <div class="blog-social">
                                <hr>
                                <?php echo do_shortcode('[share]');?>
                            </div>
                        </div><!-- /blog-loop__post-content-->
                    </article>
                <?php endwhile; ?>
                <?php the_posts_navigation(); ?>
            <?php endif; ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>
