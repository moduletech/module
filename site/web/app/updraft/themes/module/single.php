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
        <section class="blog-loop">
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
                            <h2 class="blog-loop__post-title" itemprop="headline">
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
                            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                                <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                                    <meta itemprop="url" content="http://mach1.com/wp-content/uploads/2017/07/schema_logo.png">
                                    <meta itemprop="width" content="620">
                                    <meta itemprop="height" content="73">
                                </div>
                                <meta itemprop="name" content="MACH1">
                            </div>          
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
        <?php get_sidebar(); ?>
    </div>
</main>
<?php get_footer(); ?>
