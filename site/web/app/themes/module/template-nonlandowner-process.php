<?php /*
/* Template Name: Non-Landowner Process
*/
get_header();

// initialize variables for legend colors
$build_color = "";
$construction_color = "";

?>

<style>
  
  .process-container {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-content: space-around;
    flex-wrap: wrap;
    padding-top: 2em;
    background-color: #F0F2F6;
  }
  
  .process-container + .process-container {
    margin-left: 1em;
  }
  
  .process-card {
    margin: 2em auto 2em;
    padding: 1em;
    width: 80%;
    text-align: center;
  }
  
  .process-card-build-ready {
    background-color: #FFFFFF;
    border-style: solid;
    border-width: 3px;
    border-color: #65B0CB;
  }
  
  .process-card-lot {
    background-color: #FFFFFF;
    border-style: solid;
    border-width: 3px;
    border-color: #F1897B;
  }
  
  .step-number {
    text-align: center;
    height: 3em;
    width: 8em;
    margin-top: -3em;
    margin-left: auto;
    margin-right: auto;
    padding: .75em;
  }
  
  .step-number-a {
    background-color: #65B0CB;
  }
  
  .step-number-b {
    background-color: #F1897B;
  }
  
  .step-title {
    font-size: x-large;
    font-weight: 700;
    margin-top: 1em;
    margin-bottom: .5em;
  }
  
  .step-blurb {
    line-height: 1.25em;
    font-weight: normal;
  }
  
  .non-landowner-options {
    display: flex;
    flex-wrap:nowrap;
    align-content: center;
    justify-content: space-around;
  }
  
  @media screen and (max-width: 767px) {
    .non-landowner-options {
      flex-wrap: wrap;
    }
  }
  
  .option-title{
    display: inline-block;
    margin: 0 auto !important;
    padding: 0 .25em;
    font-size: 60px;
    font-size: 2rem;
    color: #0A2240;
    width: auto;
  }
  
  .remove-bold {
    font-weight: normal;
  }
  
  .next-step a {
    color: #0A2240;
  }
  
  .next-step {
    text-align: center;
    background-color: white;
    border-width: thick;
    border-color: #0A2240;
    border-style: solid;
    width: 50%;
    height: auto;
    padding: 0;
  }
  
  @media screen and (max-width: 960px){
    .line-break {
      display: none;
    }
    .process-card {
      width: auto;
    }
  }
  
  
</style>

<main class="main" itemscope itemType="https://schema.org/WebPage">
<br /><br />
<div class='u-container'>
  
  <div class="double-header">
    <h1 class="title">No land? No problem.</h1>
    <h3 class="u-container title-blurb">Pick the path that works for you.</h3>
  </div>
  <div class="non-landowner-options">
  <?php if (have_rows('build-ready')) :
    $step_count = 1;
   while (have_rows('build-ready')) : the_row(); ?>
      <div class="process-container">
         <div class="double-header">
          <h2 class="option-title">Option A:<br /><span class="remove-bold">Select a Build-Ready Project</span></h2>
          <h3 class="u-container title-blurb">Build-Ready projects all have zoning approval - this gives you a head start</h3>
        </div>
        <a href="http://modulehousing.com/projects/">
          <div class="process-card process-card-build-ready next-step">
            <p class="step-title">View Projects</p>
          </div>
        </a>
        <? while (have_rows('steps')) : the_row(); ?>
        <div class="process-card process-card-build-ready">
          <div class="step-number step-number-a"><h3>Step <?= $step_count; ?></h3></div>
          <div>
            <p class="step-title"><?= get_sub_field('title'); ?></p>
            <p class="step-blurb"><?= get_sub_field('text'); ?></p>
          </div>
        </div>
        <? $step_count += 1; ?>
        <? 
        endwhile; ?>
        <a href="http://modulehousing.com/projects/">
          <div class="process-card process-card-build-ready next-step">
            <p class="step-title">View Projects</p>
          </div>
        </a>
      </div>
      
  <? endwhile;
    endif; 
  ?>
  <?
  if (have_rows('lot-selection')) :
  while (have_rows('lot-selection')) : the_row();
    $next_text = "";
    $next_link = "";
    while (have_rows('next')) : the_row();
      $next_text = get_sub_field('text');
      $link = get_sub_field('link');
      $next_link = $link['url'];
    endwhile;
  ?>
      <div class="process-container">
        <div class="double-header">
          <h2 class="option-title">Option B:<br /><span class="remove-bold">Find a Lot, Pick a Design</span></h2>
          <h3 class="u-container title-blurb">We've selected lots we think that you'll like and made them available to you</h3>
        </div>
        <a href="<?= $next_link; ?>">
          <div class="process-card process-card-lot next-step">
            <p class="step-title"><?= $next_text; ?></p>
          </div>
        </a>
        <? $step_count = 1; 
        while (have_rows('steps')) : the_row(); ?>
        <div class="process-card process-card-lot">
          <div class="step-number step-number-b"><h3>Step <?= $step_count; ?></h3></div>
          <div>
            <p class="step-title"><?= get_sub_field('title'); ?></p>
            <p class="step-blurb"><?= get_sub_field('text'); ?></p>
          </div>
        </div>
        <? $step_count += 1;
        endwhile; ?>
        
        <a href="<?= $next_link; ?>">
          <div class="process-card process-card-lot next-step">
            <p class="step-title"><?= $next_text; ?></p>
          </div>
        </a>
      </div>
      <?
      endwhile;
    endif; ?>
  </div>
</div>
  
</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
