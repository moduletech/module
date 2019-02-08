<style>
  body {
    font-family: 'Work Sans', sans-serif;
  }
  
  .lot-info{
    padding: 20px 0 60px;
    padding: 1.25rem 0 3.75rem;
  }
  
  .lot-info .double-header {
    margin-bottom: 4em;
  }
  
  .lot-info-section {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: space-around;
    padding-bottom: 2em;
  }
  
  .lot-info-overview {
    max-width: 500px;
  }
  
  .ready-lot-images-container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: space-around;
  }
  
  .ready-lot-image {
    max-height: 70vh;
  }
  
  .line-break{
    width: 100%;
  }
  
</style>

<?php /*
/* Template Name: Lot Info
*/
get_header();?>


<main class="main" itemscope itemType="https://schema.org/WebPage">
  <section class="lot-info">
    <div class="double-header">
      <h2 class="title"><?= the_title(); ?></h2>
      <h3><?= get_field('city_state'); ?></h3>
    </div>
    
    <div class="u-container">
      <div class="lot-info-section">
        <div class="ready-lot-images-container">
          <img class="u-img-responsive ready-lot-image" src=<?= get_field('image'); ?>>
        </div>
      </div>
      <div class="lot-info-section">
        <?php
          if (get_field('overview')): ?>
          <div class="lot-info-overview">
            <h3>Overview</h3>
            <hr />
            <div>
              <p><?= the_field('overview'); ?></p>
            </div>
          </div>
        <?php endif; ?>
        <div class="lot-info-location">
          <h3>Location</h3>
          <hr />
          <br />
          <div>
            <b>Neighborhood</b>
            <p><?= get_field('neighborhood'); ?></p>
          </div>
          <div>
            <b>Address</b>
            <p><?= get_field('address'); ?></p>
          </div>
        </div>
        <?php if (get_field('why_we_like_it')): ?>
          <div class="lot-info-location">
            <h3>Why We Like It</h3>
            <hr />
            <p><?= get_field('why_we_like_it'); ?></p>
          </div>
          <? endif; ?>
      </div>
      <div class="lot-info-section">
        <h2>What's Closeby</h2>
        <div class="line-break"></div>
        <?php
          if (get_field('iframe')): ?>
          <div>
            <?= the_field('iframe'); ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="lot-info-section">
        <?php
         if (get_field('walkable')) : ?>
          <div>
            <h3>10 minute walk</h3>
            <hr />
            <p><?= get_field('walkable'); ?></p>
          </div>
        <?
         endif;
         if (get_field('driveable')) : ?>
          <div>
            <h3>5 min drive:</h3>
            <hr />
            <p><?= get_field('driveable'); ?></p>
          </div>
        <?php endif; ?>
      </div>
      <br />
      
    </section>
    </div>
  </section>
</main>

<?php
// include('templates/_mailing-list.php');
get_footer();?>
