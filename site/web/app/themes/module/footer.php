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

<style>
  
  .process {
    margin: 0 4%;
    text-align: center;
  }
  
  .process .title {
    font-size: 2.5em;
  }
  
  .process .blurb {
    width: 60%;
    margin: auto;
  }
  
  .process-buttons-container {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-around;
    align-content: center;
    margin: 0 auto 8em;
    padding: 1em 0 0;
  }
  
  .process-item {
    width: 40%;
    padding-top: 1em;
    padding-bottom: 1em;
  }
  
  .process-item .title {
    font-size: 2em;
    white-space: nowrap;
  }
  
  .process-image-footer {
    max-width: 80%;
  }
  
  @media screen and (max-width: 641px){
    .process-buttons-container {
      flex-direction: column;
    }
    
    .process-item {
      width: 100%;
    }
    
  }
   
</style>

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

<?php if( is_front_page() ): ?>

<section class="process" id="process-branch">
  <div class="double-header">
    <h2 class="title">Build With Us </h3>
    <p class="blurb">No matter where you are in the process, we meet you there. Click below to learn more about our process.</p>
  </div>
  <br />
  <div class="process-buttons-container">
    <div class="process-item">
      <h3 class="title">I own land</h3>
      <div>
        <a class="btn" href="http://staging.modulehousing.com/projects/landowner-process/">
          <img class="u-img-responsive process-image-footer" src="/wp-content/themes/module/assets/img-src/OwnLand_Icon.png" />
          <br /><br />
          <div class="btn btn-outline-black">Learn More</div>
        </a>
      </div>
    </div>
    <div class="process-item">
      <h3 class="title">I don't own land</h3>
      <div>
        <a class="btn" href="http://staging.modulehousing.com/projects/non-landowner-process/">
          <img class="u-img-responsive process-image-footer" src="/wp-content/themes/module/assets/img-src/NoLand_Icon.png" />
          <br /><br />
          <div class="btn btn-outline-black">Learn More</div>
        </a>
      </div>
    </div>
  </div>
</section>
<? endif; ?>
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
    
    <!-- Scroll to anchor code -->
    <script type="text/javascript">
      function scrollToAnchor(aid){
        var anchorTag = $("a[name='" + aid + "']");
        $('html,body').animate({scrollTop: anchorTag.offset().top}, 'slow');
      }
    </script>
    <!-- End of Scroll to anchor code -->

    </body>
</html>
