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