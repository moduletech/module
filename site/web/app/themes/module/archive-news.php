<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Module Marcomm
 */
// if(!current_user_can('edit_posts')) { header("Location: /press"); }
get_header(); ?>

<main class="press-main">
    <div class="u-container">
        <h2 class="u-text-center u-pt-20">Module in the News</h2>
        <section class="news_articles">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) :
                    the_post();
                    $article = article_meta(get_the_ID());
                 ?>
                    <article class="news_article" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
                            <a href="<?php echo $article['url']; ?>" target="_blank" class="news_article__logo" style="background-image:url('<?=get_the_post_thumbnail_url(get_the_ID(),'large');?>');"></a>
                            <h3>
                                <a class="u-link-black" href="<?php echo $article['url']; ?>" target="_blank">
                                    <?php echo $article['title']; ?>
                                </a>
                            </h3>
                            <p class="news_article__description u-text-gray">
                              <?php echo $article['description']; ?>
                            </p>
                    </article>
                <?php endwhile; ?>
                <?php the_posts_navigation(); ?>
            <?php endif; ?>
        </section>
    </div>
</main>


<main class="blog-main u-bg-light-blue">
    <div class="u-container">
        <h2>Press Releases</h2>
        <section class="blog-loop">
        <?php
          $args = array(
            'post_type' => 'press',
            'order_by' => 'date',
            'order' => 'DESC'
          );
          $press_query = new WP_Query( $args );
        ?>
           <?php if ($press_query->have_posts()) : ?>
                <?php while ($press_query->have_posts()) :
                    $press_query->the_post(); ?>
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
          <?php wp_reset_query(); ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
