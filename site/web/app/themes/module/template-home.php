<?php /*
/* Template Name: Home
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
<?php
if (have_rows('home_content')) :
    while (have_rows('home_content')) :
    	the_row();
        if (get_row_layout() == 'hero') :?>
		    <section class="home-hero u-text-center">
		    	<div class="home-hero__content">
		    		<h2 class="home-hero__firstline u-text-white" itemprop="firstline">
		            	<?php the_sub_field('firstline'); ?>
		            </h2>
		            <h1 class="home-hero__headline u-text-white" itemprop="headline">
		            	<?php the_sub_field('headline'); ?>
		            </h1>
		    	</div>

        <?php elseif (get_row_layout() == 'intro') :?>
	        <section class="home-intro u-center-block u-text-center">
				<div class="home-intro__wrapper">
					<h2 class="home-intro__headline">
						<?php the_sub_field('headline'); ?>
					</h2>
					<div class="home-intro__desc">
						<?php the_sub_field('copy'); ?>
					</div>
					<!--<a class="btn btn-yellow" href="<?php the_sub_field('btn-link'); ?>">
		                <?php the_sub_field('btn-text'); ?>
		            </a>-->
				</div>
			</section>
		</section>
        <?php elseif (get_row_layout() == 'demo') :?>
        	<section class="home-pay js-home-pay u-text-center u-bg-light-yellow">
		    	<div class="home-pay__wrapper u-container">
		    		<div class="u-col-four u-text-left">
				    	<h2 class="home-pay__headline">
				    		<?php the_sub_field('left_headline'); ?>
				    	</h2>
				    	<?php the_sub_field('left_copy'); ?>
					</div>
					<div class="u-col-four u-text-left">
						<h2 class="home-pay__headline">
							<?php the_sub_field('middle_headline'); ?>
						</h2>
						<?php the_sub_field('middle_copy'); ?>
					</div>
					<div class="u-col-four u-text-left">
						<h2 class="home-pay__headline">
							<?php the_sub_field('right_headline'); ?>
						</h2>
						<?php the_sub_field('right_copy'); ?>
					</div>
				</div><!-- u-container-->
				<!--<a class="btn btn-yellow" href="<?php the_sub_field('btn-link'); ?>">
	                <?php the_sub_field('btn-text'); ?>
	            </a>-->
			</section>
		<?php elseif(get_row_layout() == 'process') :?>
			<section class="home-process u-border-bottom u-text-center">
				<h2 class="home-process__headline"><?php the_sub_field('process_headline'); ?></h2>
				<p class="home-process__subheadline"><?php the_sub_field('process_copy'); ?></p>
				<div class="u-container home-process__container">
					<?php
					if (have_rows('process_steps')) :
						$index = 0;
						while (have_rows('process_steps')) : the_row();
							$index++; ?>
								<div class="home-process__step u-col-four u-text-center">
									<div class="home-process__number u-center-block"><?php echo $index; ?></div>
									<p class="home-process__copy"><?php the_sub_field('copy'); ?></p>
									<?php
								$image = get_sub_field('image');
								if (!empty($image)) : ?>
										<img class="home-process__image u-center-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									<?php endif; ?>
								</div>
						<?php
						if ($index % 3 == 0) {
							echo "</div><div class='u-container home-process__container'>";
						}
						endwhile;
						echo "</div>";
					endif;?>
				</div><!-- /u-container-->
				<div class="u-container home-process__container">
					<p class="home-process__subheadline"><?php the_sub_field('process_footer'); ?></p>
					<div class="u-flex-justify-center">
						<?php
						if (have_rows('process_ctas')) :
							$index = 0;
							while (have_rows('process_ctas')) : the_row(); ?>
								<a href="<?php the_sub_field('link');?>" class="btn btn-outline-black u-ml-5 u-mr-5">
									<?php the_sub_field('text');?>
								</a>
							<?php
							endwhile;
						endif; ?>
					</div>
				</div>
			</section>
        <?php endif;
    endwhile;
else :
endif;
?>
</main>



<section class="model-other-models u-border-bottom">
	<div class="u-container u-mb-60">
		<h2 class="model-other-models__headline u-text-center">Explore Our Modules</h2>
		<?php
			$id = get_the_ID();
			$args = array(
				'post_type' => 'models',
				'posts_per_page' => 4,
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) :
				$counter = 0;
				while ($query->have_posts()) : $query->the_post();
				$counter++?>
				<div class="model-other-model u-col-six u-text-center">
					<a href="<?php echo the_permalink(); ?>">
						<img class="u-img-responsive u-center-block" src="<?php the_field('hero_image'); ?>">
					</a>
					<h3 class="model-other-model__headline">
						<?php the_title(); ?>
					</h3>
					<a class="btn btn-outline-black btn-small" href="<?php echo the_permalink(); ?>">
						Explore
					</a>
				</div><!-- u-col-six -->
				<?php if ($counter % 2 == 0) {
					echo "</div><div class='u-container'>";
				}
			endwhile;
		endif; ?>
	</div><!-- /u-container-->
</section>

<?php include('templates/_mailing-list.php');
get_footer();?>
