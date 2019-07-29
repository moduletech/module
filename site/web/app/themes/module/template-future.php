<?php /*
/* Template Name: Future of Housing
*/
get_header();
?>
<head>
  <link rel="stylesheet" href="https://use.typekit.net/cnc7avl.css">
</head>
<?php
// HERO LAYOUT
  if (have_rows('future_of_housing_hero')) :
    while (have_rows('future_of_housing_hero')): the_row();
    $hero_image = get_sub_field('hero_image')
      ? 'style="background-image: url('.get_sub_field('hero_image')['url'].')"'
      : '';
    $hero_image_mobile = get_sub_field('hero_image_mobile')
      ? get_sub_field('hero_image_mobile')['url']
      : '';
  ?>
<style>
  h1, .home-hero .home-hero__content h1 p, h2, h3, .price-tiers .tier .price, h4, h5, h6, .menu-item a, button, input[type="button"], input[type="reset"], input[type="submit"], .btn, div {
    font-family: "Neue Haas", sans-serif !important;
    text-transform: none !important;
    color: #0A2240;
  }
  
  @media screen and (max-width: 1100px){
    .home-hero {
      height: auto !important;
    }
  }
  
  @media screen and (max-width: 767px){
    .home-hero {
      background-image: url(<?php echo $hero_image_mobile; ?>) !important;
      background-position: center !important;
      background-size: 100%;
      position: relative !important;
      max-height: 35vh !important;
    }
    
    .future-highlight {
      width: 40vw;
    }
  }
  
  .text-center{
    text-align: center;
  }
  
  .line-break{
    width: 100%;
  }
  
  .flex-row-container {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-content: space-around;
    flex-wrap: wrap;
  }
  
  .flex-column-container {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-content: space-around;
    flex-wrap: wrap;
  }
  
  .flex-center-row-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-content: space-around;
    flex-wrap: wrap;
  }
  
  .future-of-icons-section {
    margin-top: 7%;
  }
  
  .future-icon {
    border-radius: 50%;
    min-width: 100px;
    max-width: 150px;
    margin-left: 1.5em;
    margin-right: 1.5em;
  }
  
  .future-icon-caption {
    padding-left: 2em;
    padding-right: 2em;
  }
  
  .future-blurb {
    margin: 7% 15%;
    text-align: center;
    line-height: 1.5em;
  }
  
  .future-speaker {
    margin-top: 2em;
    margin-left: 1em;
    margin-right: 1em;
    min-width: 340px;
  }
  
  .speaker-profile-pic {
    border-radius: 50%;
    max-width: 200px;
    margin-bottom: 1em;
  }
  
  @media screen and (max-width: 650px){
    .speaker-profile-pic {
      max-width: 100px;
    } 
    
    .future-speaker {
      max-width: 40vw;
      min-width: 10vw;
    }
    
    .future-blurb p{
      font-size: 1em;  
    }
    
    .line-break {
      display: none;
    }
  }
  
  .future-agenda-section {
    margin-top: 7%;
    margin-right: 10%;
    margin-left: 10%;
  }
  
  .future-agenda-items {
    margin-left: auto;
    margin-right: auto;
    width: 50%;
  }
  
  .future-agenda-time {
    margin-right: 2em;
  }
  
  .future-sponsors-section {
    margin-top: 7%;
    margin-left: 15%;
    margin-right: 15%;
  }
  
  .future-sponsor-logo {
    max-width: 360px;
    max-height: 360px;
  }
  
</style>

<main class="main" itemscope itemType="https://schema.org/WebPage">

  <section class="home-hero u-text-center" <?=$hero_image;?>>
    <div class="home-hero__content">
      <h1 class="home-hero__headline u-text-white" itemprop="headline">
        <p></p>
      </h1>
    </div>
  </section>
    <a href="<?= get_sub_field('tickets_link'); ?>" class="home-hero__blurb-future" style="font-size: 2em;">Click Here to Get Tickets</a>
  
  <? endwhile; endif; ?>
  <? if (have_rows('future_highlights')): ?>
  <section class="flex-center-row-container future-of-icons-section">
    <? 
    while (have_rows('future_highlights')):
      the_row();
    ?>
    <div class="flex-column-container text-center">
      <div class="future-highlight">
        <div class="text-center">
          <img class="future-icon" alt="image here" src="<?= get_sub_field('future_icon'); ?>"/>
        </div>
        <div class="text-center">
          <h3 class="future-icon-caption"><?= get_sub_field('future_title'); ?></h3>
        </div>
      </div>
    </div>
    <? endwhile; ?>
  </section>
  <? endif; ?>
  
  <section class="future-blurb">
    <p>
      <?= get_field('future_blurb') ?>
    </p>
  </section>
  
 
  <section class="text-center">
    <h2>Speakers</h2>
    <div class="flex-center-row-container">
      <? 
        $num_speakers = 0;
        while (have_rows('speakers')):
          the_row();
          $num_speakers += 1;
      ?>
     <div class="flex-column-container future-speaker text-center">
       <a href="<?= get_sub_field('linkedin'); ?>" target="_blank">
        <img class="speaker-profile-pic" src="<?= get_sub_field('profile'); ?>"/>
         <h3><b><?= get_sub_field('name'); ?></b></h3>
         <h4><?= get_sub_field('profile_title'); ?><br /><?= get_sub_field('profile_company'); ?></h4>
       </a>
     </div>
      <? endwhile; ?>
    </div>
  </section>
  
  <section class="flex-column-container future-agenda-section">
    <div class="text-center">
      <h2>Agenda</h2>
    </div>
    
    <div class="future-agenda-items">
      <?
      while (have_rows('agenda')):
      the_row();
      ?>
      <div class="future-agenda-line">
        <hr />
        <h4>
          <?= get_sub_field('start_time'); ?> - <?= get_sub_field('end_time'); ?>
        </h4>
        <h3>
          <?= get_sub_field('session_title'); ?>
        </h3>
      </div>
      <? endwhile; ?>
    </div>
  </section>
  
  <section class="future-sponsors-section">
    <div class="text-center">
      <h2>Our Sponsors</h2>
    </div>
    
    <? if (have_rows('platinum_sponsors')): ?>
    <br />
    <hr />
    <h3>Platinum</h3>
    <div class="flex-row-container">
      <?
      while (have_rows('platinum_sponsors')): 
        the_row(); 
      ?>
      <div class="flex-column-container">
        <?
        $company_logo = get_sub_field('logo');
        if (!empty($company_logo)): ?>
          <img class="future-sponsor-logo" src="<? echo $company_logo['url']; ?>"/>
        <? endif; ?>
      </div>
      <? endwhile; ?>
    </div>
    <? endif; ?>
    
    <? if (have_rows('gold_sponsors')): ?>
    <br />
    <hr />
    <h3>Gold</h3>
    <div class="flex-row-container">
      <?
      while (have_rows('gold_sponsors')): 
        the_row(); 
      ?>
      <div class="flex-column-container">
        <?
        $company_logo = get_sub_field('logo');
        if (!empty($company_logo)): ?>
          <img class="future-sponsor-logo" src="<? echo $company_logo['url']; ?>"/>
        <? endif; ?>
      </div>
      <? endwhile; ?>
    </div>
    <? endif; ?>
    
    <? if (have_rows('silver_sponsors')): ?>
    <br />
    <hr />
    <h3>Silver</h3>
    <div class="flex-row-container">
      <?
      while (have_rows('silver_sponsors')): 
        the_row(); 
      ?>
      <div class="flex-column-container">
        <?
        $company_logo = get_sub_field('logo');
        if (!empty($company_logo)): ?>
          <img class="future-sponsor-logo" src="<? echo $company_logo['url']; ?>"/>
        <? endif; ?>
      </div>
      <? endwhile; ?>
    </div>
    <? endif; ?>
    
    <? if (have_rows('module_sponsors')): ?>
    <br />
    <hr />
    <h3>Module Sponsors</h3>
    <div class="flex-row-container">
      <?
      while (have_rows('module_sponsors')): 
        the_row(); 
      ?>
      <div class="flex-column-container">
        <?
        $company_logo = get_sub_field('logo');
        if (!empty($company_logo)): ?>
          <img class="future-sponsor-logo" src="<? echo $company_logo['url']; ?>"/>
        <? endif; ?>
      </div>
      <? endwhile; ?>
    </div>
    <? endif; ?>
    
  </section>
  
  <br />
  <br />
  <br />

</main>


<?php
// include('templates/_mailing-list.php');
get_footer();?>