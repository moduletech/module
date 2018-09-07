<?php
/*
/* Template Name: Team
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
    <section class="team">
        <div class="double-header">
          <h2 class="title">Our Team</h2>
          <!--<h4 class="subtitle"><?=get_sub_field('subtitle')?></h4>-->
        </div>
        <?php
        if (have_rows('team')) :
            while (have_rows('team')) :
                the_row();?>
                <div class="team-member u-container">
                    <div class="team-member__image">
                        <?php
                        $image = get_sub_field('image');
                        if (!empty($image)) : ?>
                            <img class="u-img-responsive u-center-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php
                        endif; ?>
                    </div><!-- /image-->
                    <div class="team-member__content">
                        <div class="team-member__content-header">
                            <h2 class="team-member__name">
                                <?php the_sub_field('name');?>
                            </h2>
                            <p class="team-member__title">
                                <?php the_sub_field('title');?>
                            </p>
                            <div class="team-member__social">
                                <?php
                                $email = get_sub_field('email_address');
                                $linkedin = get_sub_field('linkedin_url');
                                if (!empty($linkedin)) { ?>
                                    <a class="team-member__social-link" href="<?php echo $linkedin;?>" target="_blank">
                                        <svg class="social-icon" viewBox="0 0 15 14" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.583V14h-3.215V8.946c0-1.27-.465-2.136-1.629-2.136-.888 0-1.417.584-1.65 1.149-.084.202-.106.483-.106.766V14H5.184s.043-8.56 0-9.446H8.4v1.339l-.021.03h.02v-.03c.428-.643 1.191-1.561 2.899-1.561 2.116 0 3.702 1.35 3.702 4.251zM1.82 0C.72 0 0 .705 0 1.632c0 .907.699 1.633 1.777 1.633H1.8c1.121 0 1.819-.726 1.819-1.633C3.596.705 2.92 0 1.82 0zM.19 14h3.215V4.554H.19V14z"/></svg>
                                    </a>
                                <?php
                                } if (!empty($email)) { ?>
                                <a class="team-member__social-link"href="mailto:<?php echo $email;?>" target="_blank">
                                    <svg class="social-icon" viewBox="0 0 20 14" xmlns="http://www.w3.org/2000/svg"><path d="M0 0v14h20V0H0zm1.25 1.25h17.5v.575L10 7.5 1.25 1.825V1.25zM10 9l1.5-.975 5.975 4.725H2.4l6.025-4.775L10 9zM7.325 7.25L1.25 12.075v-8.75L7.325 7.25zm11.425 4.9L12.625 7.3l6.125-4v8.85z"/></svg>
                                </a>
                                <?php
                                }
                            ?>
                        </div>
                        </div>

                        <?php the_sub_field('bio');?>
                    </div><!-- /image-->
                </div>
            <?php
            endwhile;
        endif;
        ?>
    </section>

    <section class="team">
      <div class="double-header">
        <h2 class="title">Our Advisors</h2>
        <!--<h4 class="subtitle"><?=get_sub_field('subtitle')?></h4>-->
      </div>
      <div class="advisors-wrapper">
            <?php
            if (have_rows('advisors')) :
                $count = 0;
                while (have_rows('advisors')) :
                    the_row();
                    $count++;
                    ?>

                    <div class="advisor">
                        <div class="advisor__image">
                            <?php
                            $image = get_sub_field('image');
                            if (!empty($image)) : ?>
                                <img class="u-img-responsive u-center-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php
                            endif; ?>
                        </div><!-- /image-->
                        <div class="advisor__content">
                            <div class="team-member__content-header">
                                <h2 class="team-member__name">
                                    <?php the_sub_field('name');?>
                                </h2>
                                <p class="team-member__title">
                                    <?php the_sub_field('title');?>
                                </p>
                                <div class="team-member__social">
                                    <?php
                                    $email = get_sub_field('email_address');
                                    $linkedin = get_sub_field('linkedin_url');
                                    if (!empty($linkedin)) { ?>
                                        <a class="team-member__social-link" href="<?php echo $linkedin;?>" target="_blank">
                                            <svg class="social-icon" viewBox="0 0 15 14" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.583V14h-3.215V8.946c0-1.27-.465-2.136-1.629-2.136-.888 0-1.417.584-1.65 1.149-.084.202-.106.483-.106.766V14H5.184s.043-8.56 0-9.446H8.4v1.339l-.021.03h.02v-.03c.428-.643 1.191-1.561 2.899-1.561 2.116 0 3.702 1.35 3.702 4.251zM1.82 0C.72 0 0 .705 0 1.632c0 .907.699 1.633 1.777 1.633H1.8c1.121 0 1.819-.726 1.819-1.633C3.596.705 2.92 0 1.82 0zM.19 14h3.215V4.554H.19V14z"/></svg>
                                        </a>
                                    <?php
                                    } if (!empty($email)) { ?>
                                    <a class="team-member__social-link"href="mailto:<?php echo $email;?>" target="_blank">
                                        <svg class="social-icon" viewBox="0 0 20 14" xmlns="http://www.w3.org/2000/svg"><path d="M0 0v14h20V0H0zm1.25 1.25h17.5v.575L10 7.5 1.25 1.825V1.25zM10 9l1.5-.975 5.975 4.725H2.4l6.025-4.775L10 9zM7.325 7.25L1.25 12.075v-8.75L7.325 7.25zm11.425 4.9L12.625 7.3l6.125-4v8.85z"/></svg>
                                    </a>
                                    <?php
                                    }
                                ?>
                                </div><!--/team-member__social-->
                            </div>
                        </div><!-- /image-->
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>

</div>

<?php get_footer();?>
