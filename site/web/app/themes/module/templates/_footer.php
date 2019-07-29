<style>

  .footer-container{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-evenly;
    align-content: center;
    padding-left: 3em;
    padding-right: 3em;
  }
  
  .footer-links-container {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    min-width: 25%;
    align-items: baseline;
    align-content: center;
    justify-content: flex-start;
    padding-right: .5em;
  }
  
  .footer-form {
    margin-right: 1em;
  }
  
  .footer-form .gform_wrapper h3.gform_title, .footer-form .gform_wrapper .top_label .gfield_label{
    color: white !important;
  }
  
  .footer-form .gform_wrapper {
    padding: inherit;
  }
  
  .footer-form .gform_confirmation_message {
    color: white;
  }
  
  .line-break-column {
    height: 100%;
  }
</style>

<footer class="footer" itemscope itemtype="http://schema.org/WPFooter">
    <div class="footer-logo__wrapper">
        <img class="footer-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/logo-white.svg" alt="Module Logo">
    </div>
    
    <div class="footer-container">
      <div class="footer-form">
        <?php echo do_shortcode("[gravityform id='4' title='true' description=false ajax=true]"); ?>
      </div>
      
      <div class="footer-links-container footer-links u-text-center">
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/contact">Contact</a>
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/team">Team</a>
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/news">News</a>
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/blog">Blog</a>
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/projects">Projects</a>
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/jobs">Jobs</a>
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/terms-of-service">Terms of Service</a>
        <a class="footer-link u-link-white" href="<?php echo bloginfo('url')?>/privacy-policy">Privacy Policy</a>
        
        
      </div>
      
      <div class="footer-partners u-text-center">
          <div class="u-col-three">
              <a href="http://techstars.com" target="_blank">
                  <img class="footer-partners__logo u-img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/partners/techstars.png" alt="TechStars">
              </a>
          </div>
          <div class="u-col-three">
              <a href="http://alphalabgear.org" target="_blank">
                  <img class="footer-partners__logo u-img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/partners/alphalabgear.png" alt="Alphalab Gear">
              </a>
          </div>
          <div class="u-col-three">
              <a href="http://ideafoundry.org" target="_blank">
                  <img class="footer-partners__logo u-img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/partners/ideafoundry.png" alt="Idea Foundry">
              </a>
          </div>
          <div class="u-col-three">
              <a href="https://www.coalhillventures.com/robotics-hub.html" target="_blank">
                  <img class="footer-partners__logo u-img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/assets/img-dist/partners/roboticshub.png" alt="Robotics Hub">
              </a>
          </div>
      </div>
    </div>

   
    <p class="copyright u-text-white u-text-center">
        Copyright &copy; <?php echo Date('Y');?> Module Design, Inc.
    </p>
</footer>
