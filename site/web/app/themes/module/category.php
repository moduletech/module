<?php get_header();?>


<main class="main u-container  blog-template" itemscope="itemscope" itemtype="http://schema.org/Blog">

	<?php get_sidebar();?>

	<section class="blog-index">

		<div class="blog-loop">
		    <div class="blog-loop container">
		        <?php if ( have_posts() ):
		        	$counter = 0;
		        	while ( have_posts() ) : the_post();
		        	$counter++;
		        ?>
		        <article class="post post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
		            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
		            	<?php the_post_thumbnail('little-helper');?>
		            </a>
		            <h2 class="blog-title" itemprop="headline">
		            	<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		            </h2>
		            <p class="blog-meta">
		            	<time datetime="<?php the_time( 'Y-m-d' ); ?>" itemprop="datePublished"><?php echo get_the_date( 'l, M. dS, Y' ); ?></time>
		            	<span class="blog-meta__sep"> / </span>
						By <?php the_author_link();?>
						<!--<span class="blog-meta__sep"> / </span>
						<a href="#">Share</a>-->
						<?php if(is_user_logged_in()) {
		                    echo "<span class='blog-meta__sep'> / </span>";
		                    edit_post_link('Edit Post');
		                }?>
		            </p>
		            <div class="blog-content" itemprop="articleBody">
			            <?php the_excerpt(); ?>
			        </div>
		        </article>
		        <?php if ($counter % 2 == 0){
		        	echo "</div><div class='container'>";
		        }
	            endwhile; ?>
		        <?php else: ?>
		        <h2>No posts to display</h2>
		        <?php endif; ?>
		    </div><!-- /blog-loop -->
		</div><!-- blog-loop -->
	</section>
</main>

<?php get_footer();?>