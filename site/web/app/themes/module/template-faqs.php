<?php /*
/* Template Name: FAQs
*/
get_header();?>

<main class="main" itemscope itemType="https://schema.org/WebPage">

<header
  class="panel"
  style="background-image: url(<?=get_the_post_thumbnail_url()?>);"
>
  <h1><?= get_the_title() ?></h1>
</header>

<section class="faqs details_accordion">
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



</main>

<?php get_footer();?>
