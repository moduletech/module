<?php /*
/* Template Name: Partnerships
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">

<section class="faqs">

  <div class="double-header">
    <h2 class="title"><?= get_the_title() ?></h2>
    <!--<h4 class="subtitle">Subtext</h4>-->
  </div>

  <section class="partnerships u-container">
    <?
    if(have_rows('partnerships')):
      while(have_rows('partnerships')):
      the_row();
      $partners = get_sub_field('partners');
      ?>
        <h3><?=get_sub_field('category')?></h3>
        <div class="partners">
          <?
          foreach($partners as $partner) {
          ?>
            <a href="<?=$partner['url']?>" target="_blank">
              <img src="<?=$partner['logo']['sizes']['medium']?>" alt="<?=$partner['name']?>" />
            </a>
          <?
          }
          ?>
        </div>
      <?
      endwhile;
    endif;
    ?>
  <script>
    jQuery('.details_accordion .detail').each( function() {
      jQuery(this).addClass('closed');
      jQuery(this).click(function() {
        jQuery(this).toggleClass('closed');
      })
    });
  </script>
  </section>

</section>

</main>

<?php get_footer();?>
