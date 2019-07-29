<?php /*
/* Template Name: Build-Ready Projects
*/
get_header();?>


<main class="main" itemscope itemType="https://schema.org/WebPage">
  
<div class='u-container'>

  <div class="double-header">
    <h1 class="title">Build-Ready Projects</h1>
    <h3 class="u-container title-blurb"><?= the_field('page_blurb'); ?></h3>
  </div>
 
  <br />
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
  <div class="u-container ready-lot">
    <?php
    $image = get_sub_field('image');
    if(!empty($image)): ?>
      <div>
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
        <a class="btn btn-outline-black" href="<?= get_sub_field('link'); ?>">Learn More</a>
      </div>
    </div>
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
