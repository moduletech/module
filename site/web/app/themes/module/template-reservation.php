<?php /*
/* Template Name: Reservation
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">


<?php
if (have_rows('reservation_content')) :
    while (have_rows('reservation_content')) :
        the_row();
        if (get_row_layout() == 'intro') :?>
            <header class="page-header u-bg-light-blue u-text-center">
                <div class="u-container-sm">
                    <h1 class="page-header__title"><?php the_sub_field('headline');?></h1>
                    <p class="page-header__desc"><?php the_sub_field('copy');?></p>
                    <a href="#scroll" class="page-header__scroll-trigger" id="js-scroll">
                        <svg class="icon-scroll" width="28" height="15" viewBox="0 0 28 15" xmlns="http://www.w3.org/2000/svg"><path stroke="#1C496F" stroke-width="2" d="M1 1l12.552 12L27 1.41" fill="none" fill-rule="evenodd"/></svg>
                    </a>
                </div><!-- /u-container-sm-->
            </header>
            <?php elseif (get_row_layout() == 'reservation_options') :?>
                <section class="reservation-options u-container" id="scroll">
                <?php if( have_rows('reservation_option')) :
                    while (have_rows ('reservation_option')) :
                        the_row();?>
                        <!-- Plan Perks -->
                        <div class="u-col-four">
                            <div class="reservation-option">
                                <div class="reservation-option__header">
                                    <h2 class="reservation-option__header-title">
                                        <?php the_sub_field('plan_name');?>
                                    </h2>
                                </div>
                                <?php if( have_rows('plan_perks')) :?>
                                    <div class="reservation-option__plan-perks">
                                        <?php while (have_rows('plan_perks')) :
                                            the_row();?>
                                            <div class="plan-perk plan-perk__<?php the_sub_field('perk_availability');?>">
                                                <?php if (get_sub_field('perk_availability') == 'active') {?>
                                                    <img class="perk-icon u-center-block" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/icon-check.svg" alt="checkmark">
                                                <?php } else { ?>
                                                    <img class="perk-icon u-center-block" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/icon-x.svg" alt="x">
                                                <?php } ?>
                                                <p>
                                                    <?php the_sub_field('perk_label');?>
                                                </p>
                                            </div>
                                        <?php endwhile;?>
                                    </div>
                                <?endif;?>
                            </div><!-- /reservation-option-->
                        </div>
                    <?php endwhile;
                endif;
                ?>
            <?php endif;?>
        </section>
    <?php endwhile;
endif;
?>
    <section class="reservation-form u-container">
        <header class="reservation-form__header">
            <h2 class="reservation-form__header-title u-text-center">
                Place Your Reservation
            </h2>
        </header>
        <?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true tabindex=49]');?>
    </section>
</div>


<div class="modal terms-modal">
    <input class="modal-state" id="modal-terms" type="checkbox" />
    <div class="modal-fade-screen">
        <div class="modal-inner">
          <div class="modal-close" for="modal-1"></div>
          <h1>Module Design Reservation Agreement</h1>
            <?php the_field('reservation_terms_of_service');?>
        </div>
    </div>
</div>

<?php get_footer();?>