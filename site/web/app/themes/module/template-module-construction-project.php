<?php /*
/* Template Name: Module Construction Project
*/
get_header();?>

<style>
  iframe {
    width: 100%;
    height: 80vh;
  }
  
  .lot-form {
    width: 50%;
    margin-left: auto;
    margin-right: auto;
  }
  
  .u-container .title-blurb {
    font-size: 1.4em;
    width: 80%;
  }
  
  @media screen and (max-width: 641px) {
    .lot-form {
      width: 100%;
    } 
    
    .u-container .title-blurb {
      font-size: 1em;
    }
    
  }
  
  @media screen and (max-width: 767px) {
    .double-header {
      margin: 1em auto 1em;
    }
  }
  
  .project-partners-section {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-content: center;
    justify-content: space-around;
    margin-bottom: 4em;
  }
  
  .project-partner {
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: space-around;
    margin-top: 2em;
  }
  
  .partner-image {
    width: 13em;
  }
  
</style>

<main class="main" itemscope itemType="https://schema.org/WebPage">

<div class='u-container'>

  <div class="double-header">
    <br />
    <h2 class="title"><?= the_field('project_name'); ?></h2>
    <h3 class="u-container title-blurb"><?= the_field('project_blurb'); ?></h3>
    <a href="#tour_signup" class="btn btn-outline-black">Sign up for a tour</a>
  </div>
  <br />
  
  <? if (get_field('gallery')) :
    $images = get_field('gallery'); ?>
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
  <? endif; ?>
  
  <? if (get_field('matterport_iframe_url')): ?>
    <section>
      <div>
        <iframe allowfullscreen src="<?= the_field('matterport_iframe_url'); ?>"></iframe>
      </div>
    </section>
    <br />
  <? endif; ?>
  
  <br />
  <section>
    <div class="double-header">
      <h2 class="title">Project Partners</h2>
      <h3 class="u-container title-blurb"><?= the_field('partners_blurb'); ?></h3>
    </div>
    <div class="project-partners-section">
      <?php while (have_rows('partners')) : the_row(); ?>
        <div class="project-partner"> 
          <?php $image = get_sub_field('logo'); ?>
          <a href="<?php get_sub_field('link'); ?>">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="partner-image"/>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
  
  <a name="tour_signup"></a>
  <section>
    <div class="double-header">
      <h2 class="title">Tour Latham House</h2>
    </div>
    <div class="lot-form">
      <?php echo do_shortcode('[gravityform id="22" title="false"]'); ?>
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
