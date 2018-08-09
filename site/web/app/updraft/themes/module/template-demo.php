<?php /*
/* Template Name: Demo
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
    <header class="page-header u-bg-light-blue u-text-center">
        <div class="u-container-sm">
            <h1 class="page-header__title"><?php the_field('headline');?></h1>
            <p class="page-header__desc"><?php the_field('copy');?></p>
            <a href="#scroll" class="page-header__scroll-trigger" id="js-scroll">
                <svg class="icon-scroll" width="28" height="15" viewBox="0 0 28 15" xmlns="http://www.w3.org/2000/svg"><path stroke="#1C496F" stroke-width="2" d="M1 1l12.552 12L27 1.41" fill="none" fill-rule="evenodd"/></svg>
            </a>
        </div><!-- /u-container-sm-->
    </header>
    <div class="u-container-lg demo-images" id="scroll">
        <?php
        if (have_rows('images')) :
            while (have_rows('images')) :
                the_row();?>
                <?php if (get_sub_field('image_type') == "full") { ?>
                    <?php
                    $image = get_sub_field('full_image');
                    if (!empty($image)) : ?>
                        <img class="u-img-responsive u-center-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php
                    endif; ?>
                <?php } else { ?>
                    <div class="u-container">
                    <?php
                    $image = get_sub_field('left_image');
                    if (!empty($image)) : ?>
                        <div class="u-col-six">
                            <img class="u-img-responsive u-center-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </div><!-- /u-col-six-->
                    <?php
                    endif;
                    $image = get_sub_field('right_image');
                    if (!empty($image)) : ?>
                        <div class="u-col-six">
                            <img class="u-img-responsive u-center-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </div><!-- /u-col-six-->
                    <?php
                    endif; ?>
                <?php } ?>
            <?php
            endwhile;
        endif;
        ?>
    </div><!-- /u-container-->

    <div class="u-container-lg demo-form u-text-center">
        <img class="demo-form__icon u-center-block u-img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img-dist/demo/demo-icon.svg">
        <h1 class="demo-form__headline">
            <?php the_field('form_headline');?>
        </h1>
        <?php the_field('form_copy');?>
        <?php $formId = get_field('form_id');
        echo do_shortcode('[gravityform id=' . $formId . ' title=false description=false ajax=true tabindex=49]');?>
    </div>

</div>

<?php get_footer();?>