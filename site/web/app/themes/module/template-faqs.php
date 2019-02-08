<?php /*
/* Template Name: FAQs
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">

<section class="faqs">

  <div class="double-header">
    <h2 class="title"><?= get_the_title() ?></h2>
    <!--<h4 class="subtitle">Subtext</h4>-->
  </div>

  <section class="details_accordion">
    <?
    if(have_rows('faqs')):
      while(have_rows('faqs')):
      the_row();
      ?>
      <div class="detail">
        <div class="intro">
          <h3><?= get_sub_field('question') ?></h3>
        </div>
        <div class="more">
          <div class="sub_detail">
            <div class="description"><?= get_sub_field('answer'); ?></div>
          </div>
        </div>
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
