<?php /*
/* Template Name: Projects
*/
get_header();

// initialize variables for legend colors
$build_color = "";
$build_background = "";
$construction_color = "";
$construction_background = "";
$completed_color = "";
$completed_background = "";

?>

<style>
  .projects-legend {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-content: center;
    margin-top: 3em;
    margin-bottom: 1em;
    margin-left: 2em;
  }
  
  .projects-legend-item {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-content: center;
    width: 33%;
  }
  
  .legend-title {
    font-size: 1em;
  }
  
  .legend-blurb {
    font-size: .85em;
  }

  .projects-legend-color {
    width: 15px;
    display: inline;
    margin-bottom: 1.5625rem;
  }

  .project-type-marker {
    display: table-cell;
    padding-right: 1em;
  }
  
  .projects-legend-text {
      width: 80%;
      margin-right: 1em;
  }
  
  .lot-card {
    display: table;
  }
  
  .ready-lot-image {
    padding-left: .3em;
    display: table-cell;
    margin-bottom: 0;
  }
  
  .legend-text {
    padding-left: .3em;
  }
  
  #completed-legend-text {
    margin: 0; 
    padding-bottom: 1.5625em; 
  }
  
  #construction-legend-text {
  }
  
  #build-legend-text {
  }
  
  @media screen and (max-width: 1045px){
    .legend-text {
      height: 100%;
    }
    
    .projects-legend-color {
      margin-bottom: 0;
    }
  }
  
  @media screen and (max-width: 769px) {
    .projects-legend {
      flex-direction: column;
      align-content: flex-start;
      padding-left: 1em;
      margin-left: 0;
      margin-bottom: 0;
    }
    
    .projects-legend-item {
      width: 100%;
      justify-content: flex-start;
      margin-bottom: .5em;
    }
    
    .projects-legend-color {
      width: 10px;
    }
    
    .project-type-marker {
      width: 25px;
      height: 25px;
    }
    
    .projects-legend-text {
      width: 100%;
    }
    
    .lots-container {
      flex-direction: column;
    }
    
    .ready-lot {
      max-width: none;
    }
  }
  
  
</style>

<main class="main" itemscope itemType="https://schema.org/WebPage">
<br /><br />
<div class='u-container'>
  <div class="double-header">
    <h1 class="title">Projects</h1>
    <h3 class="u-container title-blurb"><?= the_field('page_blurb'); ?></h3>
  </div>
 
  <?php if(have_rows('legend')): ?>
  <div class="u-container projects-legend">
    <? while(have_rows('legend')) : the_row();?>
    
    <div class="projects-legend-item">
        <? while(have_rows('completed_project_legend')): the_row(); 
            $completed_color = get_sub_field('color'); 
            $completed_background = get_sub_field('background_color'); ?>
          <div class="projects-legend-color" style="background-color: <?php echo $completed_color; ?>"></div>
          <div class="projects-legend-text">
            <p class="legend-text" id="completed-legend-text" style="background-color: <?php echo $completed_background; ?>; ">
              <span class="legend-title">Completed Project</span>
              <br />
              <span class="legend-blurb"><?= the_sub_field('blurb'); ?></span>
            </p>
          </div>
        <? endwhile; ?>
      </div>  
    
    <div class="projects-legend-item">
        <? while(have_rows('under_construction_legend')): the_row(); 
            $construction_color = get_sub_field('color'); 
            $construction_background = get_sub_field('background_color');?>
          <div class="projects-legend-color" style="background-color: <?php echo $construction_color; ?>"></div>
          <div class="projects-legend-text">
            <p class="legend-text" id="construction-legend-text" style="background-color: <?php echo $construction_background; ?>; ">
              <span class="legend-title">Projects Under Construction</span>
              <br />
              <span class="legend-blurb"><?= the_sub_field('blurb'); ?></span>
            </p>
          </div>
        <? endwhile; ?>
      </div>  
  
      <div class="projects-legend-item">
        <? while(have_rows('build-ready_legend')): the_row(); 
            $build_color = get_sub_field('color'); 
            $build_background = get_sub_field('background_color');?>
          <div class="projects-legend-color" style="background-color: <?php echo $build_color; ?>"></div>
          <div class="projects-legend-text">
            <p class="legend-text" id="build-legend-text" style="background-color: <?php echo $build_background; ?>; ">
              <span class="legend-title">Build-Ready Projects</span>
              <br />
              <span class="legend-blurb"><?= the_sub_field('blurb'); ?></span>
            </p>
          </div>
        <? endwhile; ?>
      </div>  
  
    <? endwhile; ?>
  </div>
  <? endif; ?>
  
  <div class="lots-container">
  <?
    while (have_rows('projects')) :
    the_row();
    if ($num_lots == 3):
      ?>
      <div class="line-break"></div>
      <?
      $num_lots = 0;
    endif;
      ?>
  <a href="<?= get_sub_field('link'); ?>" class="u-container ready-lot">
    <?php
    $image = get_sub_field('image');
    if(!empty($image)): ?>
      <div class="lot-card">
        <?php 
          $marker_color = '';
          $project_type = get_sub_field('project_type');
          if ($project_type == 'build_ready'):
            $marker_color = $build_color;
          endif;
          if ($project_type == 'under_construction'):
            $marker_color = $construction_color;
          endif;
          if ($project_type == 'complete'):
            $marker_color = $completed_color;
          endif;
        ?>
        <div class="project-type-marker" style="background-color: <?php echo $marker_color; ?>"></div>
        <img class="u-img-responsive u-center-block ready-lot-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
      </div>
    <? endif; ?>
      <div class="ready-lot-info">
        <div>
          <b>Address</b>
          <p><?= get_sub_field('address'); ?>
        </div>
        <div>
          <b>Neighborhood</b>
          <p><?= get_sub_field('neighborhood'); ?></p>
        </div>
      </div>
      <div class="ready-lot-learn-more">
        <div class="btn btn-outline-black">Learn More</div>
      </div>
    </a>
<?  
      $num_lots += 1;
    endwhile;
    ?>
    </div>

</div>
  
</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
