<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Module Marcomm
 */

?>


<section class="ready_to_get_started">
  <div class="home-header">
    <h2 class="title"><?=get_field('rtgs_title','options')?></h2>
  </div>
  <div class="content">
		<? foreach(array('one','two','three') as $n) { ?>
      <div class="col">
        <? $col = get_field('rtgs_column_'.$n,'options'); ?>
        <h3 class="title"><?=$col['title']?></h3>
        <div class="buttons">
          <? foreach($col['buttons'] as $button) { ?>
          <a class="btn btn-outline-black" href="<?=$button['button_url']?>"><?=$button['button_text']?></a>
          <? } ?>
        </div>
      </div>
    <? } ?>
  </div>
</section>




<? if ( is_singular( 'models' ) ) { ?>
    <section class="model-other-models u-border-bottom">
        <div class="u-container">
            <h2 class="model-other-models__headline u-text-center">Explore Other Modules</h2>
            <?php
            $id = get_the_ID();
            $args = array(
                'post_type' => 'models',
                'posts_per_page' => 3,
                'post__not_in' => array($id),
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();?>
                    <div class="model-other-model u-col-four u-text-center">
                        <a href="<?php echo the_permalink(); ?>">
                            <img class="u-img-responsive u-center-block" src="<?php the_field('hero_image'); ?>">
                        </a>
                        <h3 class="model-other-model__headline">
                            <?php the_title();?>
                        </h3>
                        <a class="btn btn-outline-black" href="<?php echo the_permalink();?>">
                            Explore
                        </a>
                    </div><!-- u-col-six -->
                <?php endwhile;
            endif;?>
        </div><!-- /u-container-->
    </section>
<? } ?>




    <?php
    require('templates/_footer.php');
    wp_footer(); ?>

    <!-- Start of Intercom code -->
    <script>
      window.intercomSettings = {
        app_id: "dwr3xpcz"
      };
    </script>
    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/dwr3xpcz';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script><script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-93265332-1']); _gaq.push(['_trackPageview']); (function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })(); </script>

    <!-- End of Intercom code -->

    <!-- Start of HubSpot Embed Code -->
      <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/3833560.js"></script>
    <!-- End of HubSpot Embed Code -->

    </body>
</html>
