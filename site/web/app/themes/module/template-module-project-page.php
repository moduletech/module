<?php /*
/* Template Name: Project Page
*/
get_header();?>

<style>
  .floorplan-image {
    width: 100%
  }
  
  .spec-category {
    display: flex;
    flex-direction: column;
    width: 27%;
    margin-left: 1em;
    margin-right: 1em;
  }
  
  .spec-category .title {
    text-align: center;
    font-size: 1.75rem;
    margin-bottom: 0;
  }
  
  .spec-item p {
    margin: 1rem 0 0 .5rem;
  }
  .spec-item p strong {
    line-height: 1em;
  }
  
  .spec-item-text {
    font-size: 1.2rem;
    padding: .2em;
  }
  
  @media screen and (max-width: 767px) {
    .spec-category {
      width: 100%;
    }
  }
  
  .nearby-locations-map {
    width: 80vw;
    height: 80vh;
  }
  
  .model-features {
    max-width: none !important;
  }
  
  .model-features .model-feature {
    width: 25%;
  }
  
  @media screen and (max-width: 767px) {
    .model-features .model-feature {
      width: 100%;
    }
    .model-features .model-feature .model-feature__icon {
      max-width: none;
    }
  }
  
  .lot-blurb p {
    font-size: 1rem;
  }

</style>

<main class="main" itemscope itemType="https://schema.org/WebPage">
<div class="u-container">
  <?php
    $build_ready = '';
    $exclusive_lot = '';
    if( get_field('project_type') == 'build_ready'):
      $build_ready = 'btn-platform-selected';
    elseif( get_field('project_type') == 'exclusive'):
      $exclusive_lot = 'btn-platform-selected';
    endif;
  ?>
  
  <section class="lot-info">
    <div class="double-header">
      <h2 class="title"><?= the_title(); ?></h2>
      <h3><?= get_field('city_state'); ?></h3>
    </div>
    
    <div class="u-container">
      
      <? $images = get_field('gallery'); ?>
      <section>
        <div id="slider" class="flexslider">
          <ul class="slides">
            <?php foreach( $images as $image ): ?>
              <li>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>
      
      <div class="lot-info-section">
        <div class="lot-info-overall">
          <h3>Location</h3>
          <hr />
          <br />
          <div>
            <b>Neighborhood</b>
            <p><?= get_field('neighborhood'); ?></p>
          </div>
          <div>
            <b>Address</b>
            <p><?= get_field('street_address'); ?></p>
          </div>
          <?php if (get_field('price')): ?>
          <div>
            <b>Price</b>
            <p><?= get_field('price'); ?></p>
          </div>
          <? endif; ?>
        </div>
        <div class="lot-blurb">
          <h3>The Story</h3>
          <hr />
          <p><?= get_field('the_story'); ?></p>
        </div>
      </div>
      
      <section class="lot-info-section model-features">
        <?php if (get_field('bedrooms')): ?>
        <div class="model-feature u-text-center">
          <img  class="u-img-responsive u-center-block model-feature__icon" src="http://staging.modulehousing.com/wp-content/uploads/2017/11/icon-beds_Bed.svg" />
          <p class="model-feature__number"><?= get_field('bedrooms'); ?></p>
          <p class="model-feature__text">Bedrooms</p>
        </div>
        <? endif; 
        if (get_field('bathrooms')): ?>
        <div class="model-feature u-text-center">
          <img class="u-img-responsive u-center-block model-feature__icon" src="http://staging.modulehousing.com/wp-content/uploads/2017/11/icon-sq-ft_Bath.svg" /><br />
          <p class="model-feature__number"><?= get_field('bathrooms'); ?></p>
          <p class="model-feature__text">Bathrooms</p>
        </div>
        <? endif; 
        if (get_field('sq_footage')): ?>
        <div class="model-feature u-text-center">
          <img class="u-img-responsive u-center-block model-feature__icon" src="http://staging.modulehousing.com/wp-content/uploads/2017/11/icon-showers_Square-Foot.svg" /><br />
          <p class="model-feature__number"><?= get_field('sq_footage'); ?></p>
          <p class="model-feature__text">Sq. Ft</p>
        </div>
        <? endif; ?>
      </section>
      
      <?php if (have_rows('floorplan')): ?>
      <div class="lot-info-section">
        <h2>Floor Plan</h2>
        <div class="line-break"></div>
        <?php while (have_rows('floorplan')) : the_row(); ?>
          <img class="floorplan-image" src="<?php the_sub_field('floorplan_image'); ?>"/>
          <div class="line-break"></div>
        <? endwhile; ?>
      </div>
      <? endif; ?>
      
      <?php if (have_rows('spec_list')) : ?>
      <div class="lot-info-section">
        <h2>Specs</h2>
        <div class="line-break"></div>
        <?php while (have_rows('spec_list')) : the_row(); 
                while (have_rows('category')) : the_row(); ?>
            <div class="spec-category">
              <p><hr style="width: 100%;" /><h3 class="u-text-center title"><?= get_sub_field('category_name'); ?></h3><hr style="width: 100%;" /></p>
              <div class="line-break"></div>
              <?php while (have_rows('category_list')) : the_row(); ?>
                <div class="spec-item">
                  <p>
                    <strong><?= the_sub_field('spec_name'); ?></strong><br />
                    <ul>
                    <? while (have_rows('spec_items')) : the_row(); ?>
                      <li class="spec-item-text"><?= the_sub_field('spec_item'); ?></li>
                    <? endwhile; ?>
                    </ul>
                  </p>
                </div>
              <? endwhile; ?>
            </div>
          <? endwhile;
           endwhile; ?>
      </div>
      <? endif; ?>
    
      <?php if (get_field('amenities')) : ?>
      <div class="lot-info-section">
        <h2>Site Amenities</h2>
        <div class="line-break"></div>
        <img style="width: 100%;" src="<?= get_field('amenities'); ?>" />
      </div>
      <? endif; ?>
      
      <div class="lot-info-section">
        <h2>Location</h2>
        <div class="line-break"></div>
        <div class="line-break"></div>
        <?php
          if (get_field('iframe')): ?>
          <div>
            <div class="overlay" onclick="style.pointerEvents='none'"></div>
            <?= the_field('iframe'); ?>
          </div>
        <?php endif; ?>
      </div>
      
      <div class="lot-info-section">
        <?php
         if (have_rows('walkable_locations')) : ?>
          <div class="locations-nearby">
            <h3>10 minute walk<hr /></h3>
            <? while(have_rows('walkable_locations')): the_row(); ?>
              <p><span><?= the_sub_field('location_reference'); ?></span> | <?= the_sub_field('location_name'); ?></p>
            <? endwhile; ?>
          </div>
        <?
         endif;
         if (have_rows('mile_away_locations')) : ?>
          <div class="locations-nearby">
            <h3>Within a mile:<hr /></h3>
            <? while(have_rows('mile_away_locations')): the_row(); ?>
              <p><span><?= the_sub_field('location_reference'); ?></span> | <?= the_sub_field('location_name'); ?></p>
            <? endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
      
    <div class="lot-info-section">
      <div class="lot-form">
        <?php $formId = get_field('call_to_action_form');
          echo do_shortcode('[gravityform id=' . $formId . ' title=true description=true ajax=true]');?>
      </div>
    </div>
      

    </div>
  </section>
</div>
</main>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	var $f = jQuery.noConflict(true);
		$f(window).load(function() {
		  // The slider being synced must be initialized first
		  $f('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 75,
			itemMargin: 5,
			asNavFor: '#slider'
		  });
		   
		  $f('#slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel"
		  });
		});
</script>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
