<?php /*
/* Template Name: Landowner Process
*/
get_header();

// initialize variables for legend colors
$build_color = "";
$construction_color = "";

?>

<style>
  
  .process-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-content: space-between;
    flex-wrap: wrap;
  }
  
  .process-card {
    background-color: #F0F2F6;
    margin: 2em 1em;
    padding: 1em;
    width: 30%;
    text-align: center; 
  }
  
  @media screen and (max-width: 700px){
    .process-card {
      width: 100%;
    }
  }
  
  .step-number {
    background-color: #B8BCC5;
    border-radius: 50%;
    text-align: center;
    height: 4em;
    width: 4em;
    margin-top: -3em;
    margin-left: auto;
    margin-right: auto;
    padding: .25em;
  }
  
  .step-title {
    font-size: x-large;
    font-weight: 700;
    margin-top: 1em;
    margin-bottom: .5em;
  }
  
  .step-blurb {
    line-height: 1.25em;
  }
  
</style>

<main class="main" itemscope itemType="https://schema.org/WebPage">
<br /><br />
<div class='u-container'>
  
  <?php if (have_rows('landowner')) :
   while (have_rows('landowner')) : the_row(); ?>
    <div>
      <div class="double-header">
        <h1 class="title"><img src="/wp-content/themes/module/assets/img-src/icons8-checked-checkbox-100.png" style="height: 1em;"> Own Land. What's next?</h1>
        <h3 class="u-container title-blurb">You crossed a big hurdle by acquiring land. Here’s what’s next.</h3>
      </div>
      <div class="process-container">
        <? $step_count = 0; ?>
        <? while (have_rows('steps')) : the_row(); 
          $step_count += 1;?>
        <div class="process-card">
          <div class="step-number"><h2><?= $step_count; ?></h2></div>
          <div>
            <p class="step-title"><?= get_sub_field('title'); ?></p>
            <p class="step-blurb"><?= get_sub_field('text'); ?></p>
          </div>
        </div>
        <? 
        endwhile; ?>
        <br />
        <div class="line-break"></div>
        <div>
          <a href="https://modulehousing.com/quiz/" class="btn btn-outline-black">Get Started</a>
        </div>
      </div>
      
    </div>
  <? endwhile;
    endif; 
  ?>
</div>
  <br /><br /><br />
  
</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
