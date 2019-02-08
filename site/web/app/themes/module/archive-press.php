<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Module Marcomm
 */

get_header(); ?>

<main class="blog-main">
    <div class="u-container">
        <section class="blog-loop">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) :
                    the_post(); ?>
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
                            <div class="blog-loop__post-meta">
                                <p>
                                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                                        Posted by <span itemprop="name">Module</span>
                                    </span> / 
                                    <time datetime="<?php the_time('Y-m-d'); ?>" pubdate itemprop="datePublished">
                                    <meta itemprop="dateModified" content="<?php the_time('Y-m-d'); ?>"/>
                                    Published on <?php echo get_the_date('F j, Y'); ?></time>
                                    <?php
                                    if (is_user_logged_in()) {
                                        echo " / ";
                                        edit_post_link('Edit Post');
                                    }
                                    ?>
                                </p>
                            </div><!-- /blog-loop__post-meta-->
                                <?php the_excerpt();?>
                        </div><!-- /blog-loop__post-content-->
                    </article>
                <?php endwhile; ?>
                <?php the_posts_navigation(); ?>
            <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
    </div>
</main>
<?php get_footer(); ?>
