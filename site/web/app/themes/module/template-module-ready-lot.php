<style>
  .module-ready-lots{
    padding: 20px 0 60px;
    padding: 1.25rem 0 3.75rem;
    font: Open Sans;
  }
  
  .lots-container{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: space-around;
  }
  
  .ready-lot{
    height: 500px;
    width: 370px;
  }
  
  .ready-lot-image{
    width: 370px;
    height: 370px;
    margin-bottom: 1em;
  }
  
  .ready-lot-info{
    padding-top: 15px;
    display: flex;
    flex-direction: row;
    align-content: space-between;
    justify-content: space-between;
  }
  
  .ready-lot-learn-more {
    display: flex;
    justify-content: center;
    align-content: center;
  }
  
  .line-break{
    width: 100%;
  }
  
</style>

<?php /*
/* Template Name: Module Ready Lot
*/
get_header();?>


<main class="main" itemscope itemType="https://schema.org/WebPage">
<?php
  if (have_rows('lots')) :
    $num_lots = 0;
  ?>
  <section class="module-ready-lots">
    <div class="double-header">
      <h2 class="title"><?= get_the_title(); ?></h2>
    </div>
    <div class="u-container">
      <h3 class="u-text-center">All the lots you see below are available exclusively to Module (and you!) We've done the grunt work of making sure the lots are good to build on and are in locations you'll want to live in.</h3>
    </div>
    <br />
    <div class="lots-container">
  <?
    while (have_rows('lots')) :
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
          <p><?= get_sub_field('address'); ?><br />
          <?= get_sub_field('city_state'); ?></p>
        </div>
        <div>
          <b>Neighborhood</b>
          <p><?= get_sub_field('neighborhood'); ?></p>
        </div>
      </div>
      <div class="ready-lot-learn-more">
        <a class="btn btn-outline-black" href="<?= get_sub_field('lot_link'); ?>">Learn More</a>
      </div>
    </div>
<?  
      $num_lots += 1;
    endwhile;
    ?>
    </div>
  </section>
  <?
  endif;
?>

</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
