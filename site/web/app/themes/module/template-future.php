<style>
  
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
  
  .future-of-icons-section {
    margin-top: 7%;
  }
  
  .future-icon {
    border-radius: 50%;
    min-width: 200px;
    max-width: 300px;
    border-color: navy;
    border-width: thin;
  }
  
  .future-blurb {
    margin: 7% 15%;
    text-align: center;
  }
  
  .future-speaker {
    margin-top: 2em;
  }
  
  .speaker-profile-pic {
    border-radius: 50%;
    max-width: 300px;
    margin-bottom: 1em;
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
  
  .future-agenda-line{
    display: flex;
    flex-direction: row;
    align-content: flex-start;
    justify-content: flex-start;
    flex-wrap: wrap;
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
    max-height: 
  }
  
</style>

<?php /*
/* Template Name: Future of Housing
*/
get_header();
?>


<main class="main" itemscope itemType="https://schema.org/WebPage">
<?php
// HERO LAYOUT
  if (have_rows('future_of_housing_hero')) :
    while (have_rows('future_of_housing_hero')): the_row();
    $hero_image = get_sub_field('hero_image')
      ? 'style="background-image: url('.get_sub_field('hero_image')['url'].')"'
      : '';
  ?>
  <section class="home-hero u-text-center" <?=$hero_image;?>>
    <div class="home-hero__content">
      <h1 class="home-hero__headline u-text-white" itemprop="headline">
        <p></p>
      </h1>
    </div>
  </section>
  <section class="home-hero__blurb">
    <a class="btn btn-outline-black" href="<?= get_sub_field('tickets_link'); ?>">Get Tickets</a>
  </section>
  <? endwhile; endif; ?>
  <? if (have_rows('future_highlights')): ?>
  <section class="flex-row-container future-of-icons-section">
    <? 
    while (have_rows('future_highlights')):
      the_row();
    ?>
    <div class="flex-column-container text-center">
      <h3><?= get_sub_field('future_title'); ?></h3>
      <img class="future-icon" alt="image here" src="<?= get_sub_field('future_icon'); ?>"/>
    </div>
    <? endwhile; ?>
  </section>
  <? endif; ?>
  
  <section class="future-blurb">
    <h3>
      <?= get_field('future_blurb') ?>
    </h3>
  </section>
  
 
  <section class="text-center">
    <h2>Speakers</h2>
    <div class="flex-row-container">
      <? 
        $num_speakers = 0;
        while (have_rows('speakers')):
          the_row();
          $num_speakers += 1;
      ?>
     <div class="flex-column-container future-speaker text-center">
      <img class="speaker-profile-pic" src="<?= get_sub_field('profile'); ?>"/>
       <h3><a href="<?= get_sub_field('linkedin'); ?>" target="_blank"><?= get_sub_field('name'); ?></a></h3>
     </div>
      <?  
      if ($num_speakers == 3) :
      ?>
      <div class="line-break"></div>
      <?
        $num_speakers = 0;
      endif;
      endwhile; ?>
    </div>
  </section>
  
  <section class="future-agenda-section">
    <div class="text-center">
      <h2>Agenda</h2>
    </div>
    <div class="flex-column-container future-agenda-items">
      <?
      while (have_rows('agenda')):
      the_row();
      ?>
      <div class="future-agenda-line">
        <h3 class="future-agenda-time">
          <?= get_sub_field('start_time'); ?> - <?= get_sub_field('end_time'); ?>
        </h3>
        <h3>
          <?= get_sub_field('session_title'); ?>
        </h3>
      </div>
      <hr />
      <? endwhile; ?>
    </div>
  </section>
  
  <section class="future-sponsors-section">
    <div class="text-center">
      <h2>Our Partners</h2>
    </div>
    
    <? if (have_rows('platinum_sponsors')): ?>
    <br />
    <hr />
    <h3>Platinum Sponsors</h3>
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
    <h3>Gold Sponsors</h3>
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
    <h3>Silver Sponsors</h3>
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
