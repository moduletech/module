<?php get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
    <header class="model-header u-text-center">
        <div class="u-container-sm">

            <?php if (array_key_exists('first_name',$_GET)) {?>
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

    <div class="double-header floorplan-header">
      <h2 class="title">Layout</h2>
      <h4 class="subtitle">View the base layout and explore the possibilities</h4>
    </div>

    <section class="model-floorplan">
      <div class="model-floorplan__floors u-container">
            <div class="model-floorplan__header">
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
                        </div>-->
                        <div class="model-floorplan__interior">
                            <?php
                            if (have_rows('interior_images')) :
                                while (have_rows('interior_images')) :
                                the_row();?>
                                <div class="interior_image u-col-six">
                                    <img src="<?php the_sub_field('interior_image') ;?>" class="u-img-responsive model-floorplan__floor-img">
                                    <p class="model-floorplan__label"><?php the_sub_field('interior_image_label') ?>:</p>
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

    <section class="model-options">
      <div class="double-header">
        <h2 class="title"><?php the_title();?> Options</h2>
        <!--<h4 class="subtitle">You're entitled to all of Module's essential services - consistent across all pricing tiers.</h4>-->
      </div>

      <div class="price-tiers">
        <? $n=0;
            $tiers = get_field('tiers','options')['tier'];
            $tier_costs = get_field('tiers');
            while($n < 3) {
          ?>
          <div class="tier">
          <h3 class="title"><?= $tiers[$n]['name'] ?></h3>
            <div class="price">
              <small>Starting at</small>
              <span>$<?= number_format($tier_costs[$n]['cost']) ?>*</span>
            </div>
            <?
            foreach($tiers[$n]['features'] as $feature) {
            ?>
              <div class="feature">
                <h3 class="name"><?= $feature['name'] ?></h3>
                <ul>
                  <?
                  foreach($feature['categories'] as $category) {
                  ?>
                  <li>

                    <div class="content">
                      <span><?= $category['item'] ?></span>
                      <small><?= $category['subtext'] ?></small>
                    </div>
                  </li>
                  <?
                  }
                  ?>
                </ul>
              </div>
            <?
            }
            ?>
          </div>
        <? $n++; } ?>
        </div>
        <p class="disclaimer"><? the_field('price_disclaimer','options') ?></p>
        <div class="site-cost">
          <?
          $site_costs = get_field('site_cost');
          ?>
          <h3 class="title">Estimated Site Cost</strong></h3>
          <div class="costs flex-columns">
            <div class="cost column">
              <h3 class="name">Sitework</h3>
              <strong>$<?=number_format($site_costs['sitework'])?></strong>
            </div>
            <div class="math column">+</div>
            <div class="cost column">
              <h3 class="name">Foundation</h3>
              <strong>$<?=number_format($site_costs['foundation'])?></strong>
            </div>
            <div class="math column">+</div>
            <div class="cost column">
              <h3 class="name">Permits &amp; Meter Fees</h3>
              <strong>$<?=number_format($site_costs['permits'])?></strong>
            </div>
            <div class="math column">=</div>
            <div class="cost column">
              <h3 class="name">Total Estimated Site Cost</h3>
              <strong>$<?=number_format($site_costs['foundation'])?></strong>
            </div>
       </div>

    </section>

</main>


<?get_footer();?>
