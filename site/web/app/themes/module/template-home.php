<?php /*
/* Template Name: Home
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">
<?php
if (have_rows('home_content')) :
    while (have_rows('home_content')) :
    	the_row();

      // HERO LAYOUT
        if (get_row_layout() == 'hero') :
          $hero_image = get_sub_field('hero_image')
            ? 'style="background-image: url('.get_sub_field('hero_image')['url'].')"'
            : '';
        ?>
        <section class="home-hero u-text-center" <?=$hero_image?>>
          <div class="home-hero__content">
            <h1 class="home-hero__headline u-text-white" itemprop="headline">
              <?php the_sub_field('headline'); ?>
            </h1>
          </div>
        </section>
        <section class="home-hero__blurb">
          <?= get_sub_field('intro_blurb') ?>
        </section>

      <?
      // HIGHLIGHTS LAYOUT
        elseif (get_row_layout() == 'highlights') :?>
          <section class="home-highlights">
            <?
            if(have_rows('highlights')):
              while(have_rows('highlights')):
                the_row();
                ?>
                <div class="u-col-four">
                  <h3><?= get_sub_field('title') ?></h3>
                  <?= get_sub_field('description') ?>
                </div>
                <?
              endwhile;
            endif;
            ?>
          </section>

      <?
      // GRAPHIC PANE LAYOUT
        elseif (get_row_layout() == 'graphic_pane') :?>
          <section class="home-graphic_pane">
            <div class="home-header">
              <h2 class="title"><?=get_sub_field('title')?></h2>
              <h4 class="subtitle"><?=get_sub_field('subtitle')?></h4>
            </div>
            <div class="u-container">
            <?
            if(have_rows('panes')):
              while(have_rows('panes')):
                the_row();
                ?>
                <div
                  class="pane"
                  style="background-color:<?=get_sub_field('background_color')?>"
                >
                  <div
                    class="img"
                    style="background-image: url(<?=get_sub_field('graphic')?>)"
                  ></div>
                  <div class="content">
                    <h3 class="title"><?=get_sub_field('title')?></h3>
                    <div class="description"><?=get_sub_field('description')?></div>
                  </div>
                </div>
                <?
              endwhile;
            endif;
            ?>
            </div>
          </section>


     <?
      // HOMES LAYOUT
        elseif (get_row_layout() == 'homes') :?>
          <section class="home-models">
            <div class="home-header">
              <h2 class="title"><?=get_sub_field('title')?></h2>
              <h4 class="subtitle"><?=get_sub_field('subtitle')?></h4>
            </div>
            <div class="u-container">
              <?
              foreach (get_sub_field('models') as $model) {
                $model = $model->ID;
                $hero_image = get_field('hero_image',$model);
                $title = get_the_title($model);
                $hero_copy = get_field('hero_copy',$model);
                $hero_features = get_field('hero_features',$model);
                $permalink = get_the_permalink($model);
                ?>
                <div class="home">
                  <h3 class="mobile_title"><?=$title?></h3>
                  <a href="<?=$permalink?>" class="img" style="background-image:url(<?=$hero_image?>)"></a>
                  <div class="content">
                    <h3 class="title"><?=$title?></h3>
                    <div class="description"><?=$hero_copy?></div>
                  </div>
                  <div class="spec">
                    <div class="features">
                      <? foreach($hero_features as $feature) {
                        if(!strpos($feature['feature_text'],'tarter')) { ?>
                      <div class="feature">
                        <img src="<?=$feature['feature_icon']?>" />
                        <span><?=$feature['feature_number']?> <?=$feature['feature_text']?></span>
                      </div>
                      <? } } ?>
                    </div>
                    <a class="link btn btn-outline-black" href="<?=$permalink?>">View Design</a>
                  </div>
                </div>
                <?
              }
              ?>
            </div>
          </section>

      <?
      // DETAILS ACCORDION LAYOUT
        elseif (get_row_layout() == 'details_accordion') :?>
          <section class="home-details">
            <div class="home-header">
              <h2 class="title"><?=get_sub_field('title')?></h2>
              <h4 class="subtitle"><?=get_sub_field('subtitle')?></h4>
            </div>
            <div class="details_accordion">
              <h4 class="header">Click on each feature to learn more</h4>
              <?
              if(have_rows('details')):
                while(have_rows('details')):
                the_row();
                ?>
                <div class="detail">
                  <div class="intro">
                    <? if(get_sub_field('graphic')) { ?><img src="<?= get_sub_field('graphic') ?>" alt="" /><? } ?>
                    <h3><?= get_sub_field('title') ?></h3>
                    <div class="description"><?= get_sub_field('description') ?></div>
                  </div>
                  <div class="more">
                    <?
                    if(have_rows('sub_details')):
                      while(have_rows('sub_details')):
                      the_row();
                      ?>
                      <div class="sub_detail">
                        <span class="sub_title"><?= get_sub_field('sub_title'); ?></span>
                        <div class="description"><?= get_sub_field('sub_description'); ?></div>
                      </div>
                      <?
                      endwhile;
                    endif;
                    ?>
                   </div>
                </div>
                <?
                endwhile;
              endif;
              ?>
            </div>
            <script>
              jQuery('.details_accordion .detail').each( function() {
                jQuery(this).addClass('closed');
                jQuery(this).click(function() {
                  jQuery(this).toggleClass('closed');
                })
              });
            </script>
          </section>


    <? endif;
    endwhile;
  endif; ?>

</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
