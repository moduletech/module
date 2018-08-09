<?php get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
    <header class="model-header u-text-center">
        <div class="u-container-sm">

            <?php if ($_GET['first_name']) {?>
                <p class="model-header__copy"><?php echo ucfirst($_GET['first_name']);?>, based on your answers, we've selected</p>
                <h1 class="model-header__title"><?php the_title();?></h1>
                <p class="model-header__copy">as the right Module for you.</p>
            <?php } else { ?>
                <h1 class="model-header__title"><?php the_title();?></h1>
            <?php } ?>

        </div><!-- /u-container-sm-->
        <img class="u-img-responsive model-header__hero-image" src="<?php the_field('hero_image');?>">
    </header>
    <section class="model-intro u-text-center">
        <div class="u-container">
            <?php the_field('hero_copy');?>
        </div>
    </section>

    <section class="model-features u-container">
        <?php
        if (have_rows('hero_features')) :
            while (have_rows('hero_features')) :
                the_row();?>
                <div class="model-feature u-col-four u-text-center">
                    <img class="u-img-responsive u-center-block model-feature__icon" src="<?php the_sub_field('feature_icon');?>">
                    <p class="model-feature__number">
                        <?php the_sub_field('feature_number');?>
                    </p>
                    <p class="model-feature__text">
                        <?php the_sub_field('feature_text');?>
                    </p>
                </div><!-- /model-feature-->
            <?php
            endwhile;
        endif;
        ?>
    </section>

    <section class="model-floorplan">
        <div class="model-floorplan__floors u-container">
            <div class="model-floorplan__header">
                <h2 class="model-floorplan__title">
                    <?php the_field('configuration_title');?>
                </h2>
                <p class="model-floorplan__desc">
                    <?php the_field('configuration_description');?>
                </p>
                <?php if (have_rows('configurations')) :
                    $counter = 1;
                    while (have_rows('configurations')) :
                        the_row();?>
                        <a data-tab="<?php the_sub_field('configuration_name');?>" class="btn model-floorplan__nav-button <?php echo ($counter == 1 ? 'active' : '');?>" href="#">
                            <?php the_sub_field('configuration_name');?>
                        </a>
                    <?php
                    $counter++;
                    endwhile;
                endif;
                ?>
            </div>
            <?php
            if (have_rows('configurations')) :
                $counter = 1;
                while (have_rows('configurations')) :
                    the_row();?>
                    <div class="u-container model-floorplan__floor" data-tab-content="<?php the_sub_field('configuration_name'); ?>" class="model-floorplan__floor" <?php echo ($counter != 1 ? 'style="display: none"' : ''); ?>>
                        <!--<div class="u-col-eight model-floorplan__exterior">
                            <img src="<?php the_sub_field('exterior_image') ?>" class="u-img-responsive model-floorplan__floor-img">
                        </div><!-- /u-col-six-->
                        <div class="model-floorplan__interior">
                            <?php
                            if (have_rows('interior_images')) :
                                while (have_rows('interior_images')) :
                                the_row();?>
                                <div class="u-col-six">
                                    <img src="<?php the_sub_field('interior_image') ;?>" class="u-img-responsive model-floorplan__floor-img">
                                    <p class="model-floorplan__label"><?php the_sub_field('interior_image_label') ?></p>
                                </div>
                            <?php
                            endwhile;
                            endif;
                            ?>
                        </div><!-- /u-col-six-->
                    </div>
                <?php
                $counter++;
                endwhile;
            endif;
            ?>
        </div><!-- /model-floorplan__floors-->
    </section>

    <section class="model-form">
        <div class="u-container">
            <h2 class="mailing-list-headline">
                Like What You See?
            </h2>
            <div class="mailing-list-form">
                <?php echo do_shortcode('[gravityform id=8 title=false description=false ajax=true tabindex=49]'); ?>
            </div>
        </div>
    </section>

    <section class="model-demo-cta">
        <div class="u-container">
            <div class="model-demo-cta__content">
                <h2 class="model-demo-cta__headline">
                    Want to see a Module in person?
                </h2>
                <p class="model-demo-cta__copy">
                    Schedule an in-person tour of our demo unit today!
                </p>
            </div><!-- /model-demo-cta__content-->
            <div class="model-demo-cta__button">
                <a href="<?php echo bloginfo('url');?>/demo/" target="_blank" class="btn btn-outline-black">Schedule</a>
            </div>
        </div>
    </section>

    <section class="model-other-models u-border-bottom">
        <div class="u-container">
            <h2 class="model-other-models__headline u-text-center">Explore Other Modules</h2>
            <?php
            $id = get_the_ID();
            $args = array(
                'post_type' => 'models',
                'posts_per_page' => 3,
                'post__not_in' => array($id),
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();?>
                    <div class="model-other-model u-col-four u-text-center">
                        <a href="<?php echo the_permalink(); ?>">
                            <img class="u-img-responsive u-center-block" src="<?php the_field('hero_image'); ?>">
                        </a>
                        <h3 class="model-other-model__headline">
                            <?php the_title();?>
                        </h3>
                        <a class="btn btn-outline-black" href="<?php echo the_permalink();?>">
                            Explore
                        </a>
                    </div><!-- u-col-six -->
                <?php endwhile;
            endif;?>
        </div><!-- /u-container-->
    </section>


</main>


<?php include('templates/_mailing-list.php');
get_footer();?>